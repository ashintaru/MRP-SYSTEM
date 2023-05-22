<?php

namespace App\Http\Controllers;

use Livewire\Component;
use App\Models\material;
use App\Models\account;
use App\Models\orders;
use Illuminate\Support\Carbon;
use Codedge\Fpdf\Fpdf\Fpdf;



class fpdfController extends Controller
{
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
    
    public function index($key1,$key2) 
    {
        $dt = Carbon::now()->format('Y-m-d');
        $newDate = Carbon::now()->subMonth($key2)->format('Y-m-d');
        

        if($key1==0){
            $orders = orders::join('materials','materials.materialId','=','orders.materialCode')->whereBetween('orderCreated',[$newDate,$dt])->orderby('orderCreated','ASC')->get();
            $data1 = json_decode($orders,true);
            // return dd($data1);
            $title = 'Orders From'. ' '.Carbon::parse($newDate)->format('F d Y').' - '.Carbon::parse($dt)->format('F d Y');
            $array = array();
            foreach($data1 as $key){
                $createdAt = Carbon::parse($key['orderUpdate']);
                $key['orderUpdate'] = $createdAt->format('F d Y');
                $receiveAt = Carbon::parse($key['orderDate']);
                $key['orderDate'] = $receiveAt->format('F d Y');
                array_push($array,$key);
            }  
            
            $title1='All Materials';
        }else{
            $orders = orders::where(['orders.materialCode'=>$key1])->join('materials','materials.materialId','=','orders.materialCode')->whereBetween('orderCreated',[$newDate,$dt])->orderby('orderCreated','ASC')->get();
            $data1 = json_decode($orders,true);
            // return dd($data1);
            $title = 'Orders From'. ' '.Carbon::parse($newDate)->format('F d Y').' - '.Carbon::parse($dt)->format('F d Y');
            $array = array();
            foreach($data1 as $key){
                $createdAt = Carbon::parse($key['orderUpdate']);
                $key['orderUpdate'] = $createdAt->format('F d Y');
                $receiveAt = Carbon::parse($key['orderDate']);
                $key['orderDate'] = $receiveAt->format('F d Y');
                array_push($array,$key);
            }      
            $title1=$orders[0]->materialCode;
        }
        $index = count($array);
        $this->fpdf->SetFont('Arial','',8);
        $this->fpdf->AddPage("L", ['200', '260']);
        $this->fpdf->Cell(10);
        $this->fpdf->Cell(44,5,"Date Issued".' '.'-'.' '.$dt,0,0);
        $this->fpdf->Cell(132,4,$title1.' '.$title, 0, 1,'C ');
        $this->fpdf->Cell(10);
        $this->fpdf->SetTextColor(255,255,255);
        $this->fpdf->SetFillColor(0,0,0);
        $this->fpdf->Cell(44,10,"Order No",1,0,'C','True');
        $this->fpdf->Cell(44,10,"Date Created",1,0,'C','True');
        $this->fpdf->Cell(44,10,"Date Recieve",1,0,'C','True');
        $this->fpdf->Cell(44,10,"Material Code",1,0,'C','True');
        $this->fpdf->Cell(44,10,"Units",1,0,'C','True');
        $this->fpdf->SetTextColor(0);
        $this->fpdf->SetDrawColor(0);
        $this->fpdf->ln();

        
        for($i=1;$i<=$index;$i++){
        $this->fpdf->Cell(10);

            $this->fpdf->Cell(44,10,$array[$i-1]['orderNo'],1,0,'C');
            $this->fpdf->Cell(44,10,$array[$i-1]['orderUpdate'],1,0,'C');
            $this->fpdf->SetFillColor(255, 213, 128);
            $this->fpdf->Cell(44,10,$array[$i-1]['orderDate'],1,0,'C','True');
            $this->fpdf->SetFillColor(	144, 238, 144);
            $this->fpdf->Cell(44,10,$array[$i-1]['materialCode'],1,0,'C','True');
            $this->fpdf->SetFillColor(255,255,0);
            $this->fpdf->Cell(44,10,$array[$i-1]['orderQtty'],1,0,'C','True');
            $this->fpdf->ln();
            // $this->fpdf->Cell(0,10, $i .').' .' ' . ' '. 'Order #' . ' ' . $array[$i-1]['orderNo']. ' ' . 'Created on:'. ' '. $array[$i-1]['orderCreated'] . ' ' . 'Material Code:'. '' . $array[$i-1]['materialCode'] . ' ' . 'recieve'. ' '. $array[$i-1]['orderTrans'] .'-'. 'Unit/pcs'.' ' . 'on'. ' '.$array[$i-1]['orderDate'],0,1,);
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
        $this->fpdf->SetTextColor(0,0,0);


       $this->fpdf->Output();
        exit;
    }
 
}

