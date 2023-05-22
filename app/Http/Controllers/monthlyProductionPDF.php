<?php

namespace App\Http\Controllers;
use Codedge\Fpdf\Fpdf\Fpdf;
use App\Models\production;
use App\Models\account;
use App\Models\productionList;
use Illuminate\Support\Carbon;

class monthlyProductionPDF extends Controller
{
    protected $fpdf;

    public function __construct()
    {
        $this->fpdf = new Fpdf;
    }
    public function index($key1){

        $dt = Carbon::now()->format('F d Y ');
        $prList = productionList::find($key1);
        // $List = orderList::findOrFail($key1);
        $list = production::where('listId',$key1)->join('model','model.modelId','=','production.modelCode')->get();
        $data = json_decode($list,true);
        // return dd($prList);

        $index = count($data);
        $this->fpdf->SetFont('Arial','',8);
        $this->fpdf->AddPage("L", ['220','260']);
        $this->fpdf->Cell(7);
        $this->fpdf->Cell(46, 5, "Date Issued".' '.'-'.' '.$dt, 0, 0,);
        $this->fpdf->Cell(138, 5, $prList->Title, 0, 0,'C');
        $this->fpdf->ln();

        $this->fpdf->SetTextColor(255,255,255);
        $this->fpdf->SetFillColor(0,0,0);
        $this->fpdf->Cell(7);
        $this->fpdf->Cell(46,10,"production No",1,0,'C',"true");
        //productionNo
        $this->fpdf->Cell(46,10,"Date Created",1,0,'C',"true"); 
        //productionCreated
        $this->fpdf->Cell(46,10,"Date Production",1,0,'C',"true");
        //productionLeadTime
        $this->fpdf->Cell(46,10,"Model Name",1,0,'C',"true");
        // modelName

        $this->fpdf->Cell(46,10,"Units",1,0,'C',"true");
                //productQtty
        $this->fpdf->SetTextColor(0);
        $this->fpdf->SetDrawColor(0);
        $this->fpdf->ln();



                
        for($i=1;$i<=$index;$i++){
            $this->fpdf->Cell(7);
            $this->fpdf->Cell(46,10,$data[$i-1]['productionNo'],1,0,'C');
            $this->fpdf->Cell(46,10,$data[$i-1]['productionUpdate'],1,0,'C');
            $this->fpdf->SetFillColor(255, 213, 128);
            $this->fpdf->Cell(46,10,$data[$i-1]['productionLeadTime'],1,0,'C',"true");
            $this->fpdf->SetFillColor(190,194,203);
            $this->fpdf->Cell(46,10,$data[$i-1]['modelName'],1,0,'C',"true");
            $this->fpdf->SetFillColor(255,255,0);
            $this->fpdf->Cell(46,10,$data[$i-1]['productQtty'],1,0,'C',"true");
            $this->fpdf->ln();
        }

        
        $account = account::findorFail(session('accId'));
        // return dd($account);
        $this->fpdf->ln(20);
        $this->fpdf->Cell(20);
        $fullName = $account->lName.' '.$account->fName.' '.','.$account->mName;
        $this->fpdf->Cell(50,4,$fullName,0,0,'C');
        $this->fpdf->ln();
        $this->fpdf->Cell(20);
        $this->fpdf->Cell(50,0,'--------------------------------------------',0,0,'C');
        $this->fpdf->ln();
        $this->fpdf->Cell(20);
        $this->fpdf->Cell(50,4,'Signature Over Printed Name',0,0,'C');
        $this->fpdf->ln();
        $this->fpdf->Cell(20);
        if(session('type')=='admin'){
            $this->fpdf->SetTextColor(128,0,0);
            $this->fpdf->Cell(50,4,'Local Head of IEPG & IXO',0,0,'C');
        }elseif(session('type')=='user'){
            $this->fpdf->SetTextColor(128,0,0);
            $this->fpdf->Cell(50,4,'Staff of IEPG & IXO',0,0,'C');
        }
        $this->fpdf->SetTextColor(0,0,0);

        $this->fpdf->Output();
        exit;
    }
}
