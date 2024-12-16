<?php

use App\Http\Controllers\BomController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ManufactureController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\AccountingController;
use App\Http\Controllers\SalesController;

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

Route::get('/', function () {
    return view('manufacture.dashboard');
});

Route::get('/product', [ManufactureController::class,'allProduct']);
Route::get('/material', [ManufactureController::class,'allMaterial']);
Route::get('/product/pdf', [ManufactureController::class,'printPdf']);
Route::post('/input-product/upload', [ManufactureController::class,'upload']);
Route::get('/edit-product/{id_product}', [ManufactureController::class,'edit']);
Route::put('/edit-product/update/{id_product}', [ManufactureController::class,'update']);
Route::delete('/delete-product/{id_product}', [ManufactureController::class,'delete']);
Route::get('/product/input-product', [ManufactureController::class,'input']);
Route::get('/material/input-material', [ManufactureController::class,'inputMaterial']);
Route::get('/product/bom', [BomController::class,'material']);
Route::get('/product/bom-input', [BomController::class,'materialInput']);
Route::post('/product/bom-input', [BomController::class,'upload']);
Route::get('/product/bom-input-item/{kode_bom}', [BomController::class,'materialInputItems']);
Route::post('/product/bom-input-item', [BomController::class,'uploadList']);
Route::get('/product/bom-delete-item/{kode_bom_list}', [BomController::class,'deleteList']);
Route::get('/product/mo', [ManufactureController::class,'manufactureOrder']);
Route::post('/product/mo', [ManufactureController::class,'moUpload']);
Route::post('/product/mo-produce/{kode_mo}', [ManufactureController::class,'moProduce']);
Route::post('/product/done/{kode_mo}', [ManufactureController::class,'moProsesProduce']);
Route::put('/product/mo/update/{kode_mo}', [ManufactureController::class,'moUpdate']);
Route::get('/sales/rfq', [VendorController::class,'rfq']);
Route::get('/sales/all-rfq', [VendorController::class,'allRfq']);
Route::post('/sales/rfq', [VendorController::class,'uploadRfq']);
Route::get('/sales/rfq/{kode_rfq}', [VendorController::class,'rfqInputItems']);
Route::post('/sales/rfq/list', [VendorController::class,'rfqUploadItems']);
Route::post('/sales/rfq/save', [VendorController::class,'rfqSaveItems']);
Route::post('/sales/rfq/create-bill', [VendorController::class,'rfqCreateBill']);
Route::post('/sales/rfq/confirm-bill', [VendorController::class,'rfqConfirmBill']);
Route::get('/sales/vendor-input', [VendorController::class,'vendor']);
Route::get('/sales/vendor-list', [VendorController::class,'vendor']);
Route::post('/sales/vendor-input', [VendorController::class,'uploadVendor']);
Route::get('/sales/po', [VendorController::class,'po']);
Route::get('/sales/input',[SalesController::class,'inputSale']);
Route::get('/sales/input/{kode_sales}',[SalesController::class,'inputItems']);
Route::post('/sales/upload', [SalesController::class,'upload']);
Route::post('/sales/list', [SalesController::class,'uploadItems']);
Route::post('/sales/create-bill', [SalesController::class,'salesCreateBill']);
Route::get('/sales/save/{kode_sales}', [SalesController::class,'saveItems']);
Route::get('/sales/all', [SalesController::class,'allSales']);
Route::get('/sales/ca-item/{kode_sales}', [SalesController::class,'caItems']);
Route::post('/sales/confirm-bill', [SalesController::class,'confirmBill']);
Route::get('/product/ca-item/{kode_bom}', [ManufactureController::class,'caItems']);
Route::get('/inventory/inventory', [InventoryController::class,'inventory']);
Route::get('/accounting/accounting', [AccountingController::class,'accounting']);
Route::get('/accounting/rfq', [AccountingController::class,'accountingRfq']);
Route::get('/accounting/vendor', [AccountingController::class,'accountingVendor']);
