<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Codedge\Fpdf\Fpdf\Fpdf as file;

use App\Models\production;
use App\Models\masterList;
use App\Models\componets;

class fpdf extends Controller
{
    protected $fpdf;

    public function __construct()
    {
        $this->fpdf = new file;
    }

    public function index() 
    {
        $prList = production::where('masterlist.modelCode',18)->join('masterlist','masterlist.modelCode','=','production.modelCode')
        ->get();
        $data = json_decode($prList,true);
        $newArray = array();
        $total=0;
        foreach($data as $d){
            array_push($newArray,$d['productQtty']);
            $total += $d['productQtty'];
        }
        // return dd($total);
        // return dd($data);

        $dv = $this->std_deviation($newArray);

        $masterlist = masterList::where('modelCode',18)->first();
        // return dd($masterlist['listId']);

        $components = componets::where('listId',$masterlist['listId'])->join('materials','materials.materialId','component.materialId')->join('origin','origin.vendorId','=','materials.vendorId')->get();
        $data2 = json_decode($components,true);
        // return dd($data2);

        $newArray1 = array();
        foreach($data2 as $d)
        {
            $array = array();        
            $leadTimeDays = $d['vendorLeadTime'] * 30;
            $ZSCORE = 1.64;
            $aveDailyDemenads = $total / 90;
            $demandDLT = $aveDailyDemenads * $leadTimeDays;
            $SAFETYSTOCK = $ZSCORE*$dv*sqrt($leadTimeDays);
            $ROP = $demandDLT + $SAFETYSTOCK;
            array_push($array,$demandDLT);
            array_push($array,$SAFETYSTOCK);
            array_push($array,$ROP);
            array_push($newArray1,$array);

        }

        return dd($newArray1);


        // $this->fpdf->SetFont('Arial', 'B', 15);
        // $this->fpdf->AddPage("L", ['100', '100']);
        // $this->fpdf->Text(10, 10, "Hello World!");       

        // $this->fpdf->Output();

        // exit;
    }
    public function std_deviation($arr){
        $arr_size=count($arr);
        $mu=array_sum($arr)/$arr_size;
        $ans=0;
        foreach($arr as $elem){
            $ans+=pow(($elem-$mu),2);
        }
        return sqrt($ans/$arr_size);
    }
    
}
