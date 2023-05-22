<?php

namespace App\Http\Livewire;
use App\Models\masterList;
use Livewire\Component;
use App\Models\production;
use Livewire\WithPagination;
use Carbon\Carbon;
use App\Models\inventory;
use App\Models\shortageList;
use App\Models\shortageMats;
use App\Models\productionList;
use Illuminate\Http\Request;

class Products extends Component
{
    public $ids,$show,$action,$orderId,$search2,$filter3='productionNo',$filter1 ="ASC", $filter2 = "5";
    use WithPagination;
    public $title;
    public $memo;
    public $finalDate,$leadTime;
    public $selectModel;
    public $num;
    public $shortageListIds=0;
    public $status=0;
    public $mats;
    public $production;
    public $notes;
    public $objects = array();
    public $listId;

    public function mount($ids){
        $this->ids = $ids;
    }
    public function render()
    {   
        $search3 = '%'.$this->search2.'%';
        $list = productionList::findOrFail($this->ids);
        // return dd($list);
        if($list->isActive==0 && session('type')=='user'){
            $modelList=[];
            $list1=[];
        }else{
            $this->notes = $list->memo;
            $modelList = masterList::where('masterlist.isActive',1)->join('model','model.modelId','=','masterlist.modelCode')
            ->select(['modelId','modelName','listId'])->orderBy('modelId','ASC')->get();
            $list1 = production::where('listId',$this->ids)->join('model','model.modelId','=','production.modelCode')
            ->where('modelName','LIKE',$search3)->orderBy($this->filter3,$this->filter1)->get();
        }
        if(session()->has('accId'))
            return view('livewire.products',['lists'=>$list1,'list1'=>$modelList,'index'=>1,'prList'=>$list]);
        else
            return  view('livewire.defender');
     }
    public function resetField(){
        // return dd('HI');
        $this->selectModel = '';
        $this->num = '';
        $this->leadTime = '';
        $this->show = 0;

    }
    public function edit($id){
        $list = production::where('productionNo',$id)->first();
        // return dd($id);
        $this->num = $list->productQtty;
        $this->selectModel = $list->modelCode;
        $this->finalDate = $list->productionLeadTime;
        $this->production = $list;
        $this->show =1;
        $this->action = 'edit';
        $this->orderId = $id;
    }

    public function select($id){
        $list = production::where('productionNo',$id)->first();
        // return dd($id);
        $this->production = $list;

        $this->show =1;
        $this->action = 'delete';
        $this->orderId = $id;
    }

    public function delete(){
        // return dd('hi');
        $production = production::find($this->production->productionNo);
        $shortageList = shortageList::find($this->production->shortageList);
        $list1 = shortageMats::where('shortagelistId',$this->production->shortageList)->pluck('idshortagematerials');
        shortageMats::destroy($list1);
        $shortageList->delete();
        $production->delete();
        $this->show ='';
        $this->action = '';
        $this->production = '';
        session()->flash('delete','Model Have Benn Removed In this Production List');
    }

    public function store(){
        // return dd('click');
        $this->validate([
            'selectModel'=>'required',
            'num'=>'required|numeric|min:1|max:99999',
            ]);
        $pids = 'PR#'.uniqid();
        if($this->chechComponents() == 0)
            session()->flash('info','The model You want to Produced have no Components');
        else{
            if($this->haveFound()==1)
            session()->flash('message','Model Have Benn Produced In this Production List');
            else{
                count($this->checkNegativeList()) == null ? $this->chechInventory() : $this->storeShortageList($this->checkNegativeList(),$pids);
                $dt = Carbon::now()->format('Y-m-d');
                $this->finalDate = Carbon::now()->addWeeks(2);
                do{
                    $this->finalDate->addDay(1);
                }while($this->finalDate->isWeekend()==true);

                $this->leadTime =10;
                $createdAt = Carbon::parse($this->finalDate );
                production::create([
                    'productionNo'=>$pids,
                    'listId'=>$this->ids,
                    'modelCode'=>$this->selectModel,
                    'productQtty'=>$this->num,
                    'leadTime'=>$this->leadTime,
                    'productionLeadTime'=> $createdAt->format('Y-m-d'),
                    'productionStatus'=>$this->status,
                    'shortageList'=>$this->shortageListIds,
                    'productionCreated'=>$dt,
                    'productionUpdate'=>$dt,
                    'Person'=>session('accId')
                ]);    
                $this->resetField();
                // return dd($this->objects);
            }
        }
        //  return dd($emptyArray);
    }
    public function update(){
        $this->validate([
            'selectModel'=>'required',
            'num'=>'required|numeric|min:1|max:99999',
            'finalDate'=>'required'
            ]);
        $dt = Carbon::now()->format('Y-m-d');
        if($this->chechComponents() == 0)
            session()->flash('info','The model You want to Produced have no Components');
        else{
            count($this->checkNegativeList()) == 0 ? $this->chechInventory() : $this->storeShortageList($this->checkNegativeList(),$this->production->productionNo);          
            $production = production::find($this->production->productionNo);
            $production->productionStatus = $this->status;  
            $production->productionUpdate = $dt;
            $production->productQtty =$this->num;
            $production->productionLeadTime = $this->finalDate;
            $production->update();    
            session()->flash('message','Model Have Benn Update Succesfully');
            $this->show = 0;
        }
        // return dd($this->production);
    }
    public function add(){
        if($this->num < 9999)
            $this->num++;
        else 
            return 0;
    }
    public function minus(){
        if($this->num > 0)
            $this->num--;
        else 
            return 0;
    }
    
    public function checkNegativeList(){
        $list = masterList::where('modelCode', $this->selectModel)->join('component','component.listId','=','masterlist.listId')->join('inventory','inventory.materialId','=','component.materialId')->join('materials','materials.materialId','=','component.materialId')->select(['component.fixedQtty','component.materialId','inventory.inventoryId','inventory.currentQtty','materials.materialCode'])->get();
        $arrayList = json_decode($list,true);
        $emptyArray=array();
        $qtty = $this->num;
        $newNum = 0;
        foreach ($arrayList as $data){
           $newNum = $qtty*$data['fixedQtty'];
            if($newNum>$data['currentQtty']){
               $data['currentQtty'] = $data['currentQtty'] -  $newNum;
                array_push($emptyArray,$data);
            }
        }
        return $emptyArray;
    }
    public function removeShortageLis(){
    }
    public function chechInventory(){
            $list = masterList::where('modelCode', $this->selectModel)->join('component','component.listId','=','masterlist.listId')->join('inventory','inventory.materialId','=','component.materialId')->join('materials','materials.materialId','=','component.materialId')->select(['component.fixedQtty','component.materialId','inventory.inventoryId','inventory.currentQtty','materials.materialCode'])->get();
        $arrayList = json_decode($list,true);
        $qtty = $this->num;
        $newNum = 0;
        $this->status = 1;
        foreach ($arrayList as $data){
            $newNum = $qtty*$data['fixedQtty'];
            $data['currentQtty'] = $data['currentQtty']-$newNum;
             $inv = inventory::find($data['inventoryId']);
             $inv->currentQtty=$data['currentQtty'];
             $inv->update();
         }
         
    }
    public function storeShortageList(Array $array, $pids ){
        $dt = Carbon::now()->format('Y-m-d');
        $this->status = 0;

        if($this->production != null){
            $list1 = shortageMats::where('shortagelistId',$this->production->shortageList)->pluck('idshortagematerials');
            shortageMats::destroy($list1);
            // return dd($list1);
            foreach ($array as $data){
                $inv = shortageMats::Create([
                   'shortagelistId'=>$this->production->shortageList,
                   'materialCode'=>$data['materialCode'],
                   'materialqtty'=>$data['currentQtty']
                ]);
            }
        }   
        else
            {

            $list1 = shortageList::firstOrCreate([
                'productionId'=>$pids,
                'dateCreated'=>$dt,
                'dateUpdated'=>$dt
            ]);
    
            $this->shortageListIds = $list1->idshortagelist ;
            foreach ($array as $data){
                 $inv = shortageMats::firstOrCreate([
                    'shortagelistId'=>$this->shortageListIds,
                    'materialCode'=>$data['materialCode'],
                    'materialqtty'=>$data['currentQtty']
                 ]);
             }
    
        }
    }

    public function viewShortageMats($ids){
        $list = shortageMats::where('shortagelistId',$ids)->get();
        $array = json_decode($list,true);
        $this->mats = $array;
        // return dd($array);
    }
    public function haveFound(){
        $list = production::where('listId',$this->ids)->join('model','model.modelId','=','production.modelCode')->select([
            'productionNo','modelCode','productQtty','productionLeadTime','productionStatus','productionCreated'
            ,'productionUpdate','Person','modelName','shortageList'
        ])->get();
        $isExsist = '';
        if($list->contains('modelCode',$this->selectModel))
            $isExsist = 1;
        else
            $isExsist = 0;
       return $isExsist;
    }
    public function chechComponents(){
        $list = masterList::where('modelCode',$this->selectModel)->join('component','component.listId','=','masterlist.listId')->get();
        $array = json_decode($list,true);
        return count($array);
    }
    public function closed(Request $req){
        $req->session()->put('failed',null);
        $req->session()->put('message',null);
        $req->session()->put('delete',null);
    }
    public function hide(){
        $this->show =0;
    }
}
