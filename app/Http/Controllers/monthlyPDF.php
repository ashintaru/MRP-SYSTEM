<?php

namespace App\Http\Controllers;
use App\Models\orderList;
use App\Models\orders;
use App\Models\account;
use Illuminate\Support\Carbon;
use Codedge\Fpdf\Fpdf\Fpdf;
class monthlyPDF extends Controller
{
    //
    protected $fpdf;

    function Header()
    {
        // Logo
        // $this->Image('logo.png',10,6,30);
        // Arial bold 15
        $this->SetFont('Arial','',8);
        // Move to the right
        $this->Cell(80);
        // Title
        $this->Cell(30,10,'Title',1,0,'C');
        // Line break
        $this->Ln(20);
    }
    public function __construct()
    {
        $this->fpdf = new Fpdf;
    }
    public function index($key1){

        $List = orderList::findOrFail($key1);
        $data1 = json_decode($List,true);
        $orders = orders::where('ordListId',$key1)->join('materials','materials.materialId','=','orders.materialCode')->join('origin','origin.vendorId','=','materials.vendorId')->get();
        $data = json_decode($orders,true);
        // return dd($data1);

        $index = count($data);
        $this->fpdf->SetFont('Arial','',8);
        $this->fpdf->AddPage("L", ['220','260']);
        $this->fpdf->Cell(10);
        $dt = Carbon::now()->format('Y-m-d');   
        $this->fpdf->Cell(72,5,"Date Issued".' '.'-'.' '.$dt,0,0);
        $this->fpdf->Cell(72,5,$data1['orderListTitle'],0,0,'C');
        $this->fpdf->ln();
        $this->fpdf->Cell(10);

        $this->fpdf->SetTextColor(255,255,255);
        $this->fpdf->SetFillColor(0,0,0);
        $this->fpdf->Cell(36,10,"Order No",1,0,'C','True');
        $this->fpdf->Cell(36,10,"Date Created",1,0,'C','True');
        $this->fpdf->Cell(36,10,"Date Recieve",1,0,'C','True');
        $this->fpdf->Cell(36,10,"Origin",1,0,'C','True');
        $this->fpdf->Cell(36,10,"Material Code",1,0,'C','True');
        $this->fpdf->Cell(36,10,"Units",1,0,'C','True');
        $this->fpdf->SetTextColor(0);
        $this->fpdf->SetDrawColor(0);
        $this->fpdf->ln();               
        for($i=1;$i<=$index;$i++){
        $this->fpdf->Cell(10);

            $this->fpdf->Cell(36,10,$data[$i-1]['orderNo'],1,0,'C');
            $this->fpdf->Cell(36,10,$data[$i-1]['orderUpdate'],1,0,'C');
            $this->fpdf->SetFillColor(255, 213, 128);
            $this->fpdf->Cell(36,10,$data[$i-1]['orderDate'],1,0,'C','True');
            $this->fpdf->SetFillColor(135,206,235);
            $this->fpdf->Cell(36,10,$data[$i-1]['vendorName'],1,0,'C','True');
            $this->fpdf->SetFillColor(	144, 238, 144);
            $this->fpdf->Cell(36,10,$data[$i-1]['materialCode'],1,0,'C','True');
            $this->fpdf->SetFillColor(255,255,0);
            $this->fpdf->Cell(36,10,$data[$i-1]['orderQtty'],1,0,'C','True');
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
