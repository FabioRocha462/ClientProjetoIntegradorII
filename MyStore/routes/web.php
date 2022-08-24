<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Request_ProductController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\ShippingValueController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\TrackingController;
use App\Http\Controllers\TokenController;
use App\Http\Controllers\ReportController;

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
    return view('welcome');
});



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

Route :: resource ( 'address' , AddressController ::class)-> middleware ( 'auth' );
Route :: resource ( 'client' , ClientController ::class)-> middleware ( 'auth' );
Route :: resource ( 'delivery' , DeliveryController ::class)-> middleware ( 'auth' );
Route :: resource ( 'product' , ProductController ::class)-> middleware ( 'auth' );
Route :: resource ( 'request_product' , Request_ProductController ::class)-> middleware ( 'auth' );
Route :: resource ( 'store' , StoreController ::class)-> middleware ( 'auth' );
Route :: resource ( 'shippingvalue' , ShippingValueController ::class)-> middleware ( 'auth' );
Route :: resource ( 'tracking' , TrackingController ::class)-> middleware ( 'auth' );
Route :: resource ( 'report' , ReportController ::class)-> middleware ( 'auth' );

Route ::get('/add_address/{id}',[AddressController::class, 'addAddress'])->middleware('auth');
Route ::post('/salve_address/{id}',[AddressController::class, 'SalveAddress'])->middleware( 'auth' );
Route ::get('/create_request/{id}',[RequestController::class, 'addRequest'])-> middleware( 'auth' );
Route::get('/salve_request/{id}',[RequestController::class, 'createRequest'])->middleware( 'auth');
Route ::get('/search_product/{id}',[ProductController::class, 'searchProdutc'])-> middleware('auth');
Route ::get('/salverequest_product/{id1}/{id2}',[Request_ProductController::class, 'createRequest_product'])->middleware( 'auth');
Route ::get('/client_request/{id}',[ClientController::class,'client_request'])->middleware( 'auth');
Route ::get('/create_token',[TokenController::class,'token_login'])->middleware( 'auth');
Route ::post('/salve_token',[TokenController::class,'token_create'])->middleware( 'auth');
Route ::post('/update_product/{id}',[ProductController::class,'updateProduct'])->middleware( 'auth' );
Route ::get('/delete_product/{id}',[ProductController::class,'destroyProduct'])-> middleware( 'auth' );
Route ::post('/update_client/{id}',[ClientController::class, 'updateClient'])->middleware( 'auth' );
Route ::get('/delete_client/{id}',[ClientController::class, 'destroyClient'])-> middleware( 'auth' );
Route ::get('/address_client/{id}',[AddressController::class, 'addressClient'])-> middleware( 'auth' );
Route ::post('/update_address/{id}',[AddressController::class, 'updateAddress'])-> middleware( 'auth' );
Route ::get('/delete_address/{id}',[AddressController::class, 'destroyAddress'])-> middleware( 'auth' );
Route ::get('/index_request_client/{id}',[RequestController::class, 'indexRequestClient'])-> middleware( 'auth' );
Route ::get('/show_request/{id}',[RequestController::class, 'showRequest'])-> middleware( 'auth' );
Route ::get('/getrequest/{id}',[RequestController::class, 'Request_product'])-> middleware( 'auth' );

Route ::get('/delivery_create/{id}',[DeliveryController::class, 'DeliveryCreated'])-> middleware( 'auth' );
Route ::get('/delivery_address/{id1}/{id2}',[DeliveryController::class, 'DeliveryAddress'])-> middleware( 'auth' );
Route ::get('delivery_salve/{id1}/{id2}',[DeliveryController::class, 'SalveDelvery'])-> middleware( 'auth' );
