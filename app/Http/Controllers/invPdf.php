<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\account;
use Illuminate\Support\Carbon;
use Codedge\Fpdf\Fpdf\Fpdf;
use App\Models\inventory as ibentory;

class invPdf extends Controller
{
    //   protected $fpdf;

    public function __construct()
    {
        $this->fpdf = new Fpdf;
    }
    public function index(){
        $inventory = ibentory::join('materials','materials.materialId','=','inventory.materialId')
        ->orderBy('materialCode','ASc')->get();
        $data = json_decode($inventory,true);
        $dt = Carbon::now()->format('Y-m-d');   
        // return dd($data1);
        $index = count($data);
        $this->fpdf->AddPage("L", ['220','260']);
        $this->fpdf->Cell(20);
        $this->fpdf->Cell(50,10,"Date Issued".' '.'-'.' '.$dt,0,0);
        $this->fpdf->Cell(100,10,"Inventory Report",0,0,'C');
        $this->fpdf->ln();
        $this->fpdf->Cell(20);

        $this->fpdf->SetFont('Arial','',8);
        $this->fpdf->SetTextColor(255,255,255);
        $this->fpdf->SetFillColor(0,0,0);
        $this->fpdf->Cell(50,10,"Inventory No",1,0,'C',"true");
        $this->fpdf->Cell(50,10,"Date Updated",1,0,'C',"true");
        $this->fpdf->Cell(50,10,"Material Code",1,0,'C',"true");
        $this->fpdf->Cell(50,10,"Quantity",1,0,'C',"true");
        $this->fpdf->SetTextColor(0);
        $this->fpdf->SetDrawColor(0);
        $this->fpdf->ln();
          
        for($i=1;$i<=$index;$i++){
            $this->fpdf->Cell(20);
            $this->fpdf->Cell(50,10,'Inv#'.$data[$i-1]['inventoryId'],1,0,'C');
            $this->fpdf->Cell(50,10,$data[$i-1]['invUpdated'],1,0,'C');
            $this->fpdf->SetFillColor(	144, 238, 144);
            $this->fpdf->Cell(50,10,$data[$i-1]['materialCode'],1,0,'C','true');
            $this->fpdf->SetFillColor(255,255,0);
            $this->fpdf->Cell(50,10,$data[$i-1]['currentQtty'],1,0,'C','true');
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

        $this->fpdf->ln(20);




        $this->fpdf->Output();
        
        exit;
    }
}
