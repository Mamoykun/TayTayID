<?php

use App\Http\Controllers\FrontController;
use App\Http\Controllers\MobileController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PembayaranffController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TestingHelperController;
use Illuminate\Routing\RouteGroup;
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
    return view('halaman_awal');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('awal', [FrontController::class, 'index']);

Route::get('test', [TestingHelperController::class, 'index']);

Route::post('save',[TestingHelperController::class, 'save'])->name('Invoice.save');

Route::get('mobile', [MobileController::class, 'index']);

Route::get('diggie', [MobileController::class, 'Transaksi']);

Route::get('diggie_qris', [MobileController::class, 'Transaksi_qris']);

Route::get('diggie_qris_ff', [MobileController::class, 'Transaksi_qris_ff']);

Route::get('show', [MobileController::class, 'show']);

Route::get('template', function () {
    return view('template');
});

Route::get('qrcode', function () {
    return view('qrcode');
});




Route::get('userserver', [PembayaranController::class, 'userid']);

Route::get('Qris', [PembayaranController::class, 'Qris']);

Route::get('Qris_ff', [PembayaranController::class, 'Qris_ff']);

Route::get('checkQris', [PembayaranController::class, 'checkQris']);

Route::get('checkQris_ff', [PembayaranController::class, 'checkQris_ff']);

Route::get('callback', [PembayaranController::class, 'callback']);

Route::get('invoice', [PembayaranController::class, 'invoicesbs']);

Route::get('midtrans', [PembayaranController::class, 'index']);



Route::get('pembayaran', [PembayaranController::class, 'halaman_bayar']);

// Route::get('pembayaran_pubg', [PembayaranController::class, 'pembayaran_pubg']);


Route::get('duitku', [PembayaranController::class, 'duitku']);

Route::get('checkduitku', [PembayaranController::class, 'checkduitku']);

Route::get('gagal_midtrans', [MobileController::class, 'error_midtrans']);

Route::get('cek_diggie', [MobileController::class, 'cek_diggie']);

Route::get('cek_gopay', [PembayaranController::class, 'gopay']);



Route::get('ipaymu', [PembayaranController::class, 'ipaymu']);

Route::get('callback', [PembayaranController::class, 'callback']);

Route::get('apigames', [PembayaranController::class, 'rapidml']);

Route::get('pembayaran_genshin', [PembayaranController::class, 'pembayaran_gensin']);

// Route::get('pembayaran_codm', [PembayaranController::class, 'pembayaran_codm']);




Route::get('diggie_genshin', [MobileController::class, 'Transaksi_genshin']);


Route::get('pembayaran_ff', [PembayaranffController::class, 'index']);

Route::get('cekuseridff', [PembayaranController::class, 'useridff']);

Route::get('cekuseridpubg', [PembayaranController::class, 'useridpubg']);

Route::get('cekuseridcodm', [PembayaranController::class, 'useridcodm']);

Route::get('wa_notif', [PembayaranController::class, 'wa_notif']);

Route::get('diggie_ff', [MobileController::class, 'Transaksi_ff']);

Route::get('login', function () {
    return view('login');
})->name('login');

Route::post('postlogin', [LoginController::class, 'postlogin'])->name('postlogin');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');



Route::middleware(['auth'])->group(function () {
    Route::get('updatedigi', function () {
        return view('updatedigi');
    });
});



// Route::post('loginaksi', LoginController::class,'loginaksi')->name('loginaksi');
// Route::get('updatedigi', HomeControlle::class,'index')->name('updatedigi')->middleware('auth');
// Route::get('logoutaksi', LoginController::class, 'logoutaksi')->name('logoutaksi')->middleware('auth');
