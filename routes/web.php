<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BioProfileController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PortoProfileController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SocialMediaController;
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



Route::get('/', [PortoProfileController::class, 'index'])->name('root');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix('/admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('index');
    Route::get('/bio', [BioProfileController::class, 'index'])->name('bio');
    Route::get('/contact', [ContactController::class, 'index'])->name('contact');
    Route::get('/social-media', [SocialMediaController::class, 'index'])->name('social.media');
    Route::get('/about', [AboutController::class, 'index'])->name('about');


    // operation
    // bio
    Route::post('/updatebio', [BioProfileController::class, 'update'])->name('bio.update');

    // contact
    Route::post('/addcontact', [ContactController::class, 'store'])->name('contact.store');
    Route::post('/updatecontact', [ContactController::class, 'update'])->name('contact.update');
    Route::post('/deletecontact/{id}', [ContactController::class, 'destroy'])->name('contact.destroy');

    // social media
    Route::post('/addsocialmedia', [SocialMediaController::class, 'store'])->name('social.media.store');
    Route::post('/updatesocialmedia', [SocialMediaController::class, 'update'])->name('social.media.update');
    Route::post('/deletesocialmedia/{id}', [SocialMediaController::class, 'destroy'])->name('social.media.destroy');

    // about
    Route::post('/updateabout/{id}', [AboutController::class, 'update'])->name('about.update');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
