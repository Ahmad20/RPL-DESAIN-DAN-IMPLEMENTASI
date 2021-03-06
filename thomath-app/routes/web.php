<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\PengajarController;
use App\Http\Controllers\WaliMuridController;
use App\Http\Controllers\KonsultasiController;
use App\Http\Controllers\LihatNilaiController;
use App\Http\Controllers\TeacherTestController;
use App\Http\Controllers\CourseMaterialController;
use App\Http\Controllers\AiController;

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
Route::get('/', function(){
    return view('landing');
})->middleware(['guest:walimurid', 'guest:siswa', 'guest:pengajar']);
Route::prefix('walimurid')->name('walimurid.')->group(function(){
    Route::middleware(['guest:walimurid'])->group(function(){   
        Route::get('/register', [WaliMuridController::class, 'registerWaliView']);
        Route::get('/login', [WaliMuridController::class, 'loginWaliView']);
    });
    Route::middleware(['auth:walimurid'])->group(function(){
        Route::get('/dashboard', [WaliMuridController::class, 'dashboard']);
        Route::get('/logout', [WaliMuridController::class, 'logout']);
        Route::get('/konsultasi', [KonsultasiController::class, 'view']);
        Route::get('/lihat-nilai', [LihatNilaiController::class, 'scoreView']);
        Route::get('/profile', [WaliMuridController::class, 'profile']);
        
    });
});

Route::prefix('pengajar')->name('pengajar.')->group(function(){
    Route::middleware(['guest:pengajar'])->group(function(){   
        Route::get('/register', [PengajarController::class, 'registerPengajarView']);
        Route::get('/login', [PengajarController::class, 'loginPengajarView']);
    });
    Route::middleware(['auth:pengajar'])->group(function(){
        // Route::get('/dashboard', [PengajarController::class, 'dashboard']);
        //Route::get('/course', [PengajarController::class, 'dashboard']);
        Route::get('/dashboard', [PengajarController::class, 'dashboard']);
        Route::get('pengajar/course-material', [CourseMaterialController::class, 'index']);
        Route::get('/course-material', [CourseMaterialController::class, 'index']);
        Route::get('/test', [TeacherTestController::class, 'index']);
        Route::get('/course', [CourseController::class, 'index']);
        Route::get('/logout', [PengajarController::class, 'logout']);
        Route::get('/konsultasi', [KonsultasiController::class, 'show']);   
        Route::get('/singlecourse/{id_course}', [PengajarController::class, 'singleCourseView']);
        Route::get('/course/delete/{id_course}', [CourseController::class, 'destroy']);
        Route::get('/course/edit/{id_course}', [CourseController::class, 'edit']);
        Route::get('/singletest/{id_test}', [PengajarController::class, 'singleTestView']);
        Route::get('/singletest/{id_test}/{id_siswa}', [PengajarController::class, 'siswaTaskView']);

        //Route::get('konsultasi', [KonsultasiController::class, 'view']);
    });
});

Route::prefix('siswa')->name('siswa.')->group(function(){
    Route::middleware(['guest:siswa'])->group(function(){   
        Route::get('/register', [SiswaController::class, 'registerSiswaView']);
        Route::get('/login', [SiswaController::class, 'loginSiswaView']);
    });
    Route::middleware(['auth:siswa'])->group(function(){
        Route::get('/dashboard', [SiswaController::class, 'dashboard']);
        Route::get('/logout', [SiswaController::class, 'logout']);
        Route::get('/singlecourse/{id_course}', [SiswaController::class, 'singleCourseView']);
        Route::get('/course', [SiswaController::class, 'courseView']);
        Route::get('/course/assign/{id_course}', [SiswaController::class, 'assignCourse']);
        Route::get('/singletest/{id_test}', [SiswaController::class, 'singleTestView']);
        Route::get('/lihat-nilai', [LihatNilaiController::class, 'scoreView']);

        
    
        
        //Route::get('konsultasi', [KonsultasiController::class, 'view']);
    });
});

// Route::group(['middleware'=> ['guest:walimurid,siswa,pengajar']], function(){ //hati-hati sama spasi setelah koma
//     Route::get('/', [LandingController::class, 'index']);
//     Route::get('/register/wali', [LandingController::class, 'registerWaliView']);
//     Route::get('/login/wali', [LandingController::class, 'loginWaliView']);
// });

Route::get('/ai', [AiController::class, 'searchVideoView']);
Route::post('/search', [AiController::class, 'searchVideo']);
Route::post('walimurid/register', [WaliMuridController::class, 'registerWali']);
Route::post('walimurid/login', [WaliMuridController::class, 'loginWali']);
Route::post('walimurid/konsultasi/{id_wali}', [KonsultasiController::class, 'store']);
Route::post('walimurid/profile/{id_wali}', [WaliMuridController::class, 'updateProfile']);

Route::post('pengajar/course/tambah/{id_pengajar}', [CourseController::class, 'store']);
Route::post('pengajar/course-material/tambah', [CourseMaterialController::class, 'store']);
Route::post('pengajar/test/tambah', [TeacherTestController::class, 'store']);
Route::post('pengajar/course/update/{id_course}', [CourseController::class, 'update']);
Route::post('/singletest/{id_test}/{id_siswa}', [PengajarController::class, 'giveScore']);

Route::post('pengajar/register', [PengajarController::class, 'registerPengajar']);
Route::post('pengajar/login', [PengajarController::class, 'loginPengajar']);
Route::post('/konsultasi/assign/{id_konsultasi}', [KonsultasiController::class, 'assign']);

Route::post('siswa/register', [SiswaController::class, 'registerSiswa']);
Route::post('siswa/login', [SiswaController::class, 'loginSiswa']);
Route::post('/singletest/{id_test}', [SiswaController::class, 'answerTest']);

