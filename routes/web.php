<?php

use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RuleController;
use App\Http\Controllers\TipsController;
use App\Http\Controllers\TreatmentController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    if(Auth::user()->role=='admin'){
        return view('dashboard');
    }else{
        return redirect()->route('history');
    }
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    //Treatments
    Route::get('treatments',[TreatmentController::class,'index'])->name('treatments');
    Route::get('TambahTreatments',[TreatmentController::class,'add'])->name('add-treatments');
    Route::post('SimpanTreatments',[TreatmentController::class,'store'])->name('insert-treatments');
    Route::get('EditTreatment/{id}',[TreatmentController::class,'edit'])->name('edit-treatments');
    Route::post('SaveTreatment/{id}',[TreatmentController::class,'save'])->name('save-treatments');
    Route::post('deleteTreatment/{id}',[TreatmentController::class,'delete'])->name('delete');

    //Complaints
    Route::get('complaints',[ComplaintController::class,'index'])->name('complaints');
    Route::get('TambahComplaints',[ComplaintController::class,'add'])->name('add-complaints');
    Route::post('SimpanComplaint',[ComplaintController::class,'store'])->name('insert-complaints');
    Route::get('EditComplaint/{id}',[ComplaintController::class,'edit'])->name('edit-complaints');
    Route::post('SaveComplaint/{id}',[ComplaintController::class,'save'])->name('save-complaints');
    Route::post('deleteComplaint/{id}',[ComplaintController::class,'delete'])->name('delete-complaint');


    //Products
    Route::get('products',[ProductController::class,'index'])->name('products');
    Route::get('TambahProducts',[ProductController::class,'add'])->name('add-products');
    Route::get('EditProducts/{id}',[ProductController::class,'edit'])->name('edit-product');
    Route::post('UpdateProducts/{id}',[ProductController::class,'update'])->name('update-product');
    Route::post('SimpanProducts',[ProductController::class,'store'])->name('insert-products');
    Route::post('DeleteProducts/{id}',[ProductController::class,'delete'])->name('delete-products');

    //History
    Route::get('history',[HistoryController::class,'index'])->name('history');
    Route::get('lihatHistory/{id}',[HistoryController::class,'detail'])->name('history-detail');

    //Tips
    Route::get('tips',[TipsController::class,'index'])->name('tips');
    Route::get('Tambahtips',[TipsController::class,'create'])->name('add-tips');
    Route::post('Simpantips',[TipsController::class,'store'])->name('insert-tips');
    Route::get('Lihattips/{id}',[TipsController::class,'show'])->name('lihat-tips');

    //Contacts
    Route::get('contacts',[ContactController::class,'index'])->name('contacts');
    Route::get('Tambahcontacts',[ContactController::class,'create'])->name('add-contacts');
    Route::post('Simpancontacts',[ContactController::class,'store'])->name('insert-contacts');
    Route::get('Lihatcontacts/{id}',[ContactController::class,'show'])->name('lihat-contacts');

    //Contacts
    Route::get('rules',[RuleController::class,'index'])->name('rules');
    Route::get('Tambahrules',[RuleController::class,'create'])->name('add-rules');
    Route::post('Simpanrules',[RuleController::class,'store'])->name('insert-rules');
    Route::get('Lihatrules/{id}',[RuleController::class,'show'])->name('lihat-rules');
    Route::post('Deleterules/{id}',[RuleController::class,'destroy'])->name('delete-rules');
    
    Route::get('hasilKonsul',[RuleController::class,'hasil'])->name('hasil-konsul');
    Route::post('allcomplaints',[RuleController::class,'allKulit'])->name('all-konsul');

});
