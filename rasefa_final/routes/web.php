<?php

use App\Http\Controllers\FactPembeli3;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

use App\Http\Controllers\KatalogController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\RegistrasiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LogisticController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\TokoController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\RegistrasiTokoController;
use App\Http\Controllers\RegistrasiLogistikController;
use App\Http\Controllers\MyorderController;
use App\Http\Controllers\CobaController;
use App\Http\Controllers\FactPembeli2;
use App\Http\Controllers\FactPembeli4;
use App\Http\Controllers\LineChartController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\PenjualantokoController;
use App\Http\Controllers\jumlahprodukController;
use App\Http\Controllers\jumlahtokoController;
use App\Http\Controllers\totalkategoriController;
use App\Http\Controllers\jumlahkategoriController;
use App\Http\Controllers\ChartlogistikController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\BelumDikirimController;
use App\Http\Controllers\SudahDikirimController;
use App\Http\Controllers\SudahSampaiController;
use App\Http\Controllers\SudahDikonfirmasiController;
use App\Models\LoginAdmin;



//home buyer
Route::middleware(['auth:pembeli'])->group(function () {
    Route::get('/home', [KatalogController::class, 'index'])->name('home')->middleware('auth:pembeli');
    Route::get('/keranjang', function () {
        return view('keranjang');
    });
    //keranjang
    Route::post('/tambah-ke-keranjang', [KeranjangController::class, 'tambahKeKeranjang'])->name('addKeranjang');
    Route::get('/keranjang', [KeranjangController::class,'index']);
    Route::post('/checkout', [KeranjangController::class,'checkout'])->name('checkout');
    // akun pembeli
    Route::get('/akun-myorders', [MyorderController::class, 'process'])->name('akun-myorders');
    Route::get('/shipped', [MyorderController::class, 'shipped'])->name('shipped');
    Route::get('/received', [MyorderController::class, 'received'])->name('received');
    Route::post('/pesanan-batal', [MyorderController::class, 'pesananBatal'])->name('pesanan-batal');
    Route::post('/konfirmasi-barang', [MyorderController::class, 'konfirmasiBarang'])->name('konfirmasi-barang');
    Route::get('/completed', [MyorderController::class, 'completed'])->name('completed');
});

Route::middleware(['auth:admin'])->group(function () {
    Route::get('/pilihfact', function() {
        return view('pilihfact');
    })->middleware('auth:admin');
    //Chart fact pembeli
    Route::get('/factpembeli1', function () {
        return view('chart_fact_pembeli1');
    });
    Route::get('/factpembeli1', [CobaController::class, 'index'])->name('factpembeli1');
    
    Route::get('/factpembeli2', function () {
        return view('chart_fact_pembeli2');
    });
    Route::get('/factpembeli2', [FactPembeli2::class, 'index'])->name('factpembeli2');
    
    Route::get('/factpembeli3', function () {
        return view('chart_fact_pembeli3');
    });
    Route::get('/factpembeli3', [FactPembeli3::class, 'index'])->name('factpembeli3');
    
    Route::get('/factpembeli4', function () {
        return view('chart_fact_pembeli4');
    });
    Route::get('/factpembeli4', [FactPembeli4::class, 'index'])->name('factpembeli4');
   
    //Chart penjualan
    Route::get('/rasefa-chart', [ChartController::class, 'chart'])->name('rasefa-chart');
    Route::get('/penjualantoko-chart', [PenjualantokoController::class, 'chart'])->name('penjualantoko-chart');
    Route::get('/jumlah-produk', [jumlahprodukController::class, 'chart'])->name('jumlah-produk');
    Route::get('/jumlah-toko', [jumlahtokoController::class, 'chart'])->name('jumlah-toko');
    Route::get('/total-kategori', [totalkategoriController::class, 'chart'])->name('total-kategori');
    Route::get('/jumlah-kategori', [jumlahkategoriController::class, 'chart'])->name('jumlah-kategori');
    
    //chart logistik
    $faktaPengiriman = \DB::connection('mysql2')->table('fakta_pengiriman')->get();
    Route::get('/chartlogistik', [ChartlogistikController::class, 'index'])->name('chartlogistik.index');
    Route::get('/statuslog', [StatusController::class, 'index'])->name('statuslog.index');
    Route::get('/belumdikirim', [BelumDikirimController::class, 'index'])->name('belumdikirim.index');
    Route::get('/sudahdikirim', [SudahDikirimController::class, 'index'])->name('sudahdikirim.index');
    Route::get('/sudahsampai', [SudahSampaiController::class, 'index'])->name('sudahsampai.index');
    Route::get('/sudahdikonfirmasi', [SudahDikonfirmasiController::class, 'index'])->name('sudahdikonfirmasi.index');
});



//login
Route::get('/login', function () {
    return view('login');
})->middleware('guest');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



// Pilih role registrasi
Route::get('/role', function() {
    return view('role');
})->middleware('guest');

// Show the registration form
Route::get('/registrasi', [RegistrasiController::class, 'showRegistrationForm'])->name('register');
// Handle the registration form submission
Route::post('/registrasi', [RegistrasiController::class, 'store']);

// Show the registration form
Route::get('/registrasi-logistik', [RegistrasiLogistikController::class, 'showRegistrationForm'])->name('logistic.register');
// Handle the registration form submission
Route::post('/registrasi-logistik', [RegistrasiLogistikController::class, 'store']);

// Show the registration form
Route::get('/registrasi-toko', [RegistrasiTokoController::class, 'showRegistrationForm'])->name('toko.register');
// Handle the registration form submission
Route::post('/registrasi-toko', [RegistrasiTokoController::class, 'store']);


//akun dan profile
Route::get('/account', function () {
    return view('account');
});

Route::get('/profile', function () {
    return view('profile');
});

Route::get('/profile', [ProfileController::class, 'index']);

//logistik
Route::middleware(['auth:logistik'])->group(function () {
Route::get('/', function () {
    return view('welcome');
})->name('welcome')->middleware('auth:logistik');
Route::get('/perlu-dikirim', [LogisticController::class, 'perluDikirim'])->name('perlu-dikirim')->middleware('auth:logistik');
Route::get('/sudah-dikirim', [LogisticController::class, 'sudahDikirim'])->name('sudah-dikirim');
Route::post('/kirim-barang', [LogisticController::class, 'kirimBarang'])->name('kirim-barang');
Route::post('/barang-sampai', [LogisticController::class, 'barangSampai'])->name('barang-sampai');
Route::get('/sudah-sampai', [LogisticController::class, 'sudahSampai'])->name('sudah-sampai');
Route::get('/nomor-resi', [LogisticController::class, 'nomorResi'])->name('nomor-resi');
Route::post('/konfirmasi-barang', [LogisticController::class, 'konfirmasiBarang'])->name('konfirmasi-barang');
Route::get('/sudah-selesai', [LogisticController::class, 'sudahSelesai'])->name('sudah-selesai');
Route::post('/pesanan-batal', [LogisticController::class, 'pesananBatal'])->name('pesanan-batal');
});
Route::post('/edit-nomor-resi', [LogisticController::class, 'editNomorResi'])->name('edit-nomor-resi');

//seller
Route::get('/seller', [SellerController::class, 'index'])->name('seller');
Route::get('/count', [SellerController::class, 'index'])->name('count');

// Toko
Route::resource('toko', TokoController::class)->except(['show']);
Route::get('/toko', [TokoController::class, 'index'])->name('toko.index');
Route::get('/toko/{id}/edit', [TokoController::class, 'edit'])->name('toko.edit');
Route::put('/toko/{id}', [TokoController::class, 'update'])->name('toko.update');
Route::delete('/toko/{id}', [TokoController::class, 'destroy'])->name('toko.destroy');

// Produk
Route::middleware(['auth:toko'])->group(function () {
    Route::get('/produk', function () {
        return view('produk.index');
    })->middleware('auth:toko');
    Route::resource('produk', ProdukController::class)->except(['show']);
    Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');
    Route::get('/produk/create', [ProdukController::class, 'create'])->name('produk.create');
    Route::post('/produk', [ProdukController::class, 'store'])->name('produk.store');
    Route::get('/produk/{id}/edit', [ProdukController::class, 'edit'])->name('produk.edit');
    Route::put('/produk/{id}', [ProdukController::class, 'update'])->name('produk.update');
    Route::delete('/produk/{id}', [ProdukController::class, 'destroy'])->name('produk.destroy');
});

