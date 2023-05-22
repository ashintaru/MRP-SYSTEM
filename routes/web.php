<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\invPdf;
use App\Http\Livewire\Orderlist;
use App\Http\Livewire\Products;
use App\Http\Livewire\Components;
use App\Http\Livewire\Origin;
use App\Http\Livewire\ProdList;
use App\Http\Livewire\Inventory;
use App\Http\Livewire\MasterList;
use App\Http\Livewire\Models;
use App\Http\Livewire\Materials;
use App\Http\Livewire\Index;
use App\Http\Livewire\Account;
use App\Http\Livewire\Order;
use App\Http\Livewire\OrderReport;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\OrderReportTab;
use App\Http\Controllers\fpdfController;
use App\Http\Controllers\monthlyPDF;
use App\Http\Livewire\ProductionReport;
use App\Http\Controllers\monthlyProductionPDF;
use App\Http\Controllers\shortageListPDF;
use App\Http\Livewire\ProdGenReport;
use App\Http\Livewire\InvReport;
use App\Http\Controllers\prodModelPdf;
use App\Http\Livewire\InvLogs;


// use App\Http\Controllers\fpdf;
use App\Http\Livewire\Forecasting;
use App\Http\Livewire\Profile;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/product',Products::class);
// // Route::get('Roasa',Orders::class);
// Route::get('/', function () {
//     return redirect('/');
// })->name('login');
//     Route::post('/',[pageController::class,'logIn']);
//     Route::view('/','livewire.index')->name('login');
//     Route::get('logOut',[pageController::class,'logout']);        
//     Route::get('admindb',[pageController::class,'index']);
//     Route::get('userdb',[pageController::class,'index'])->name('userdb');

    Route::get('/',Index::class);
    Route::get('logOut',[Index::class,'logout']);
    Route::get('dashboard',Dashboard::class);
    Route::get('list',Orderlist::class);
    Route::get('account',Account::class);
    Route::get('master-list',MasterList::class);
    Route::get('origin',Origin::class); 
    Route::get('production',ProdList::class);
    Route::get('inventory',Inventory::class);
    Route::get('model',Models::class);
    Route::get('material',Materials::class);    
    Route::get('inventory-PDF',[invPdf::class,'index']);
    Route::get('inventory-report',InvReport::class);
    Route::get('inventory-logs',InvLogs::class);
    Route::get('profile',Profile::class);
    
    

    Route::get('monthly-order-report/{orderList}',[monthlyPDF::class,'index']);
    Route::get('pdf/{key1}/{key2}', [fpdfController::class, 'index']);
    Route::get('production-report/{listId}',[monthlyProductionPDF::class,'index']);
    Route::get('production-report-model/{key1}/{key2}',[prodModelPdf::class,'index']);
    Route::get('shortageList/{key1}',[shortageListPDF::class,'index']);


    Route::get('orders/{id}',Order::class);
    Route::get('components/{id}',Components::class);
    Route::get('product/{ids}',Products::class);
    Route::get('product-report/{key1}',ProductionReport::class);
    Route::get('order-report/{id}',OrderReport::class);
    Route::get('order-report/{material}/{month}',OrderReportTab::class);
    Route::get('forecast/{key1}/{key2}/{key3}',Forecasting::class);
    Route::get('prod-report/{key1}/{key2}/',ProdGenReport::class);
    
    // Route::group(['namespace'=>'Admin'], function() {
// Route::get('origin',[vendorControler::class,'index']);
// });
    
//     Route::group(['namespace'=>'Admin'], function() {
//     Route::get('account',[accountController::class,'index']);
//     Route::get('createNewAcc',[accountController::class,'create']);
//     Route::post('saveNewAcc',[accountController::class,'store']);
//     Route::get('modify/{key1}/{key2}',[accountController::class,'edit'])->name('modify');
//     Route::put('modify-acc/{key1}/{key2}',[accountController::class,'update']);
    
    // Route::get('production',function(){
    //     if(session('type')!=null){
    //         return view('production');
    //     }else{
    //         return redirect('/');

    //     }
    // });

//     Route::get('inventory',function(){
//         if(session('type')!=null){
//             return view('inventory');
//         }else{
//             return redirect('/');

//         }
//     });

//     Route::get('master-list',function(){
//         if(session('type')!=null){
//             return view('bom');
//         }else{
//             return redirect('/');

//         }
//     });
//   
//     Route::get('product/{id}',function($id){
//         if(session('type')!=null){
//             return view('product',['id'=>$id]);
//         }else{
//             return redirect('/');

//         }
//     });

//     Route::get('components/{id}',function($id){
//         if(session('type')!=null){
//             return view('components',['id'=>$id]);
//         }else{
//             return redirect('/');

//         }
//     });


    
    
//     Route::get('createNewAccType',[typeController::class,'index']);


//     Route::post('master-list',[bomController::class,'store']);
//     Route::get('master-list',[bomController::class,'index']);
//     Route::get('modifyMasterList/{key1}',[bomController::class,'edit'])->name('modify-master-list');
//     Route::get('showMasterList/{key1}',[bomController::class,'show'])->name('show-master-list');
//     Route::put('modifyMasterList/{key1}',[bomController::class,'update']);

//     Route::post('showMasterList/{key1}',[componentsController::class,'store']);
//     Route::get('deleteComponent/{key1}/{key2}',[componentsController::class,'destroy']);
//     Route::get('modifyComponent/{key1}',[componentsController::class,'edit']);
//     Route::put('modifyComponent/{key1}',[componentsController::class,'update']);


//     Route::put('modify-vendor/{key1}',[vendorControler::class,'update']);
//     Route::post('saveNewVen',[vendorControler::class,'store']);
//     Route::get('modify-vendor/{key1}',[vendorControler::class,'edit'])->name('modify-vendor');
    
    
//     Route::get('material',[materialController::class,'index']);
//     Route::post('saveNewMat',[materialController::class,'store']);
//     Route::get('modify-material/{key1}',[materialController::class,'edit'])->name('modify-material');
//     Route::put('modify-material/{key1}',[materialController::class,'update']);


//     Route::get('model',[modelController::class,'index']);
//     Route::post('model',[modelController::class,'store']);
//     Route::get('modify-model/{key1}',[modelController::class,'edit'])->name('modify-model');
//     Route::put('modify-model/{key1}',[modelController::class,'update']);

    // Route::get('showOrderList/{key1}',[adminorderController::class,'show'])->name('show-master-list');
//     Route::post('showOrderList/{key1}',[orderController::class,'store']);
//     Route::get('approveOrder/{key1}',[orderController::class,'aprove']);
//     Route::get('modifyOrder/{key1}',[orderController::class,'edit']);
//     Route::put('modifyOrder/{key1}',[orderController::class,'update']);

//     // Route::post('showOrderList/{key1}',[adminorderController::class,'show'])->name('show-master-list');

    // Route::get('orderList',[adminorderController::class,'index']);
//     Route::post('orderList',[adminorderController::class,'store']);
//     Route::get('closedOrderList/{key1}',[adminorderController::class,'closed']);
//     Route::get('openOrderList/{key1}',[adminorderController::class,'open']);
//     Route::get('modifyOrderList/{key1}',[adminorderController::class,'edit'])->name('modify-Order');
//     Route::put('modifyOrderList/{key1}',[adminorderController::class,'update']);

//     // Route::get('inventory',[inventoryController::class,'index']);
//     Route::get('modifyinventory/{key1}',[inventoryController::class,'edit1']);
//     Route::put('modifyinventory/{key1}',[inventoryController::class,'update']);
//     Route::get('addinventory/{key1}',[inventoryController::class,'edit2']);   
//     Route::put('addinventory/{key1}',[inventoryController::class,'add']);

    
// });



// Route::group(['namespace'=>'Admin'],function(){
//     Route::view('login','login');

//     Route::post('loginAcc',[pageController::class,'login']);
// });
