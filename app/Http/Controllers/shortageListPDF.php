<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\account;
use Codedge\Fpdf\Fpdf\Fpdf;
use App\Models\shortageMats;
use Illuminate\Support\Carbon;

class shortageListPDF extends Controller
{
    //
    protected $fpdf;

    public function __construct()
    {
        $this->fpdf = new Fpdf;
    }
    public function index($key1){

        $dt = Carbon::now()->format('F d Y ');
        $list = shortageMats::where('shortagelistId',$key1)->get();
        $data = json_decode($list,true);
        // return dd($prList);

        $index = count($data);
        $this->fpdf->SetFont('Arial','',8);
        $this->fpdf->AddPage("L", ['220','260']);
        // $this->fpdf->Cell(0, 10, "Title" . ' '.$prList->Title, 0, 1,);
        // $this->fpdf->Cell(0, 10, "Memo" . ' '. $prList->memo, 0, 1,);
        // $this->fpdf->ln();
        $this->fpdf->Cell(20);
        $this->fpdf->Cell(50,10,"Date Issued".' '.'-'.' '.$dt,0,0);
        $this->fpdf->Cell(100,10,"Inventory Report",0,0,'C');
        $this->fpdf->ln();
        $this->fpdf->Cell(85);        
        $this->fpdf->SetTextColor(255,255,255);
        $this->fpdf->SetFillColor(0,0,0);
        $this->fpdf->Cell(40,10,"Material Code",1,0,'C','True');
        $this->fpdf->Cell(40,10,"Quantity Needed",1,0,'C','True'); 
        $this->fpdf->SetTextColor(0);
        $this->fpdf->SetDrawColor(0);
        $this->fpdf->ln();                
        
        for($i=1;$i<=$index;$i++){
        $this->fpdf->Cell(85);        
            $this->fpdf->Cell(40,10,$data[$i-1]['materialCode'],1,0,'C');
            $this->fpdf->SetFillColor(255,255,0);
            $this->fpdf->Cell(40,10,$data[$i-1]['materialqtty'],1,0,'C','True');
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

        $this->fpdf->ln(20);


        $this->fpdf->Output();
        exit;
    }
}
