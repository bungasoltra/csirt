<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\PhotosController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\RFCController;
use GuzzleHttp\Middleware;

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

Route::get('/', function () {
    return view('web/loading');
});

Route::get('/beranda', function () {
    $publishPosts = \App\Models\Posts::where('status', 'publish')->get();
    $publishPhotos = \App\Models\Photo::where('status', 'publish')->get();
    $publishRfc = \App\Models\Rfc::where('status', 'publish')->get();
    return view('web/beranda', [
        "title" => "Beranda",
        "publishPosts" => $publishPosts,
        "publishPhotos" => $publishPhotos,
        "publishRfc" => $publishRfc,
    ]);
});
Route::get('/ambil-teks-penuh/{id}', [PostsController::class, 'ambilTeksPenuh']);

Route::get('/reaktif', function () {
    return view('web/reaktif', [
        "title" => "Layanan Reaktif"
    ]);
});

Route::get('/proaktif', function () {
    return view('web/proaktif', [
        "title" => "Layanan Proaktif"
    ]);
});

Route::get('/manajemen_kualitas_keamanan', function () {
    return view('web/manajemen_kualitas_keamanan', [
        "title" => "Layanan Manajemen Kualitas Keamanan"
    ]);
});

Route::get('/literasi_keamanan_informasi', function () {
    return view('web/literasi_keamanan_informasi', [
        "title" => "Literasi keamanan Informasi"
    ]);
});

Route::get('/formulir_pengaduan', [PengaduanController::class, 'index'])->name('formulir_pengaduan');
Route::get('/pengaduan', [PengaduanController::class, 'viewPengaduan'])->name('pengaduan')->middleware('auth');
Route::post(
    '/formulir_pengaduan',
    [PengaduanController::class, 'submit']
)->name('submit');
Route::get('/update-status/{id}/{status}', [PengaduanController::class, 'updateStatus'])->name('updateStatus');
Route::get('/cari_pengaduan', [PengaduanController::class, 'cariPengaduan',])->name('cariPengaduan');

Route::get('/kontak', function () {
    return view('web/kontak', [
        "title" => "Kontak"
    ]);
});

Route::get('/auth', [LoginController::class, 'index'])->name('login');
Route::post(
    '/auth',
    [LoginController::class, 'login']
)->middleware('throttle:login');

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post(
    '/register',
    [RegisterController::class, 'register']
);

Route::post(
    '/logout',
    [LoginController::class, 'logout']
);

Route::get('/dashboard', function () {
    return view('dashboard/index', [
        "title" => "Dashboard"
    ]);
})->middleware('auth');

Route::get('/profile', [LoginController::class, 'profile'])->name('profile')->middleware('auth');
Route::post(
    '/profile',
    [LoginController::class, 'store']
);

Route::get('/posts', [PostsController::class, 'index'])->name('posts')->middleware('auth');
Route::post(
    '/posts',
    [PostsController::class, 'store']
);
Route::get('/posts/{post}/view', [PostsController::class, 'view'])->name('posts.view');
Route::get('/posts/{post}/edit', [PostsController::class, 'edit'])->name('posts.edit');
Route::delete('/posts/{post}', [PostsController::class, 'destroy'])->name('posts.destroy');
Route::patch('/posts/{post}', [PostsController::class, 'update'])->name('posts.update');
Route::post('/posts/publish/{id}', [PostsController::class, 'publish'])->name('posts.publish');

Route::get('/photos', [PhotosController::class, 'index'])->name('photos')->middleware('auth');
Route::post(
    '/photos',
    [PhotosController::class, 'store']
);
Route::post('/photos/{id}/publish', [PhotosController::class, 'publish'])->name('photos.publish');
Route::delete('/photos/{photo}', [PhotosController::class, 'destroy'])->name('photos.destroy');

Route::get('/rfc', [RfcController::class, 'index'])->name('rfc')->middleware('auth');
Route::post('/rfc', [RfcController::class, 'store']);
Route::get('/rfc/{rfc}/edit', [RfcController::class, 'edit'])->name('rfc.edit');
Route::put('/rfc/{rfc}', [RfcController::class, 'update'])->name('rfc.update');
Route::post('/rfc/{id}/publish', [RfcController::class, 'publish'])->name('rfc.publish');
Route::delete('/rfc/{rfc}', [RfcController::class, 'destroy'])->name('rfc.destroy');
