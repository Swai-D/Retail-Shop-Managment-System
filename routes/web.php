<?php

use Illuminate\Support\Facades\Route;

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

//**************************HomeBladeController*********************************
Route::get('/', [App\Http\Controllers\HomeBladeController::class, 'indexPage']);
Route::get('/Maswai-Shop-Management-System/Home-Blade-Files/index-page', [App\Http\Controllers\HomeBladeController::class, 'indexPage']);

//**************************end*************************************************

//**************************StockBladeController*********************************
Route::get('/Maswai-Shop-Management-System/Stock-Blade-Files/stock_register_form', [App\Http\Controllers\StockController::class, 'stock_register_form']);
Route::post('/Maswai-Shop-Management-System/Stock-Blade-Files/stock_register_form_store_data', [App\Http\Controllers\StockController::class, 'stock_register_form_store_data']);
Route::get('/Maswai-Shop-Management-System/Stock-Blade-Files/stock_status_page', [App\Http\Controllers\StockController::class, 'stock_status_page']);
Route::get('/Maswai-Shop-Management-System/Stock-Blade-Files/stock_table_list', [App\Http\Controllers\StockController::class, 'stock_table_list']);
Route::get('/Maswai-Shop-Management-System/Stock-Blade-Files/category_table_list', [App\Http\Controllers\StockController::class, 'category_table_list']);
Route::get('/Maswai-Shop-Management-System/Stock-Blade-Files/daily_sells_sheet', [App\Http\Controllers\StockController::class, 'daily_sells_sheet']);
Route::get('/Maswai-Shop-Management-System/Stock-Blade-Files/daily_sells_list', [App\Http\Controllers\StockController::class, 'daily_sells_list']);
Route::get('/Maswai-Shop-Management-System/Stock-Blade-Files/daily_sells_delete_item/{item_id}', [App\Http\Controllers\StockController::class, 'daily_sells_delete_item']);
Route::get('/Maswai-Shop-Management-System/Stock-Blade-Files/sells_list', [App\Http\Controllers\StockController::class, 'sells_list']);
Route::get('/Maswai-Shop-Management-System/Stock-Blade-Files/update_stock/{item_id}', [App\Http\Controllers\StockController::class, 'update_stock']);
Route::post('/Maswai-Shop-Management-System/Stock-Blade-Files/update_stock_form/{item_id}', [App\Http\Controllers\StockController::class, 'update_stock_form']);
Route::get('/Maswai-Shop-Management-System/Stock-Blade-Files/credit_sells_sheet', [App\Http\Controllers\StockController::class, 'credit_sells_sheet']);
Route::post('/Maswai-Shop-Management-System/Stock-Blade-Files/credit_store_name', [App\Http\Controllers\StockController::class, 'credit_store_name']);
Route::post('/Maswai-Shop-Management-System/Stock-Blade-Files/variation_form', [App\Http\Controllers\StockController::class, 'variation']);
Route::post('/Maswai-Shop-Management-System/Stock-Blade-Files/credit_item_info', [App\Http\Controllers\StockController::class, 'credit_item_info']);
Route::get('/Maswai-Shop-Management-System/Stock-Blade-Files/creditor_table', [App\Http\Controllers\StockController::class, 'creditor_table']);
Route::post('/Maswai-Shop-Management-System/Stock-Blade-Files/balance_paid/{creditor_info_id}', [App\Http\Controllers\StockController::class, 'clear_credit']);
Route::post('/Maswai-Shop-Management-System/Stock-Blade-Files/item_sold/{item_id}', [App\Http\Controllers\StockController::class, 'item_sold']);
Route::get('/Maswai-Shop-Management-System/Stock-Blade-Files/sales_over_view', [App\Http\Controllers\StockController::class, 'sales_over_view']);

//**************************end*************************************************


//**************************WakalaController*********************************
Route::get('/Maswai-Shop-Management-System/Wakala-Blade-Files/wakala_form', [App\Http\Controllers\WakalaController::class, 'wakala_form']);
Route::post('/Maswai-Shop-Management-System/Wakala-Blade-Files/get_mobile_money_data', [App\Http\Controllers\WakalaController::class, 'get_mobile_money_data']);

//**************************end*************************************************
