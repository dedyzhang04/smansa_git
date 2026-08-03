<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PpdbController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/profile/{tab?}', [HomeController::class, 'profile'])->name('profile');
Route::get('/academics', [HomeController::class, 'academics'])->name('academics');
Route::get('/facilities', [HomeController::class, 'facilities'])->name('facilities');
Route::get('/news', [HomeController::class, 'news'])->name('news');
Route::get('/gallery', [HomeController::class, 'gallery'])->name('gallery');
Route::post('/contact', [HomeController::class, 'storeContact'])->name('contact.store');

// Public SPMB (New Student Document Submission) Routes
Route::get('/spmb', [PpdbController::class, 'showSearch'])->name('spmb.search');
Route::post('/spmb/search', [PpdbController::class, 'doSearch'])->name('spmb.search.submit');
Route::get('/spmb/upload/{nisn}', [PpdbController::class, 'showUpload'])->name('spmb.upload');
Route::post('/spmb/upload/{nisn}', [PpdbController::class, 'storeUpload'])->name('spmb.upload.submit');
Route::post('/spmb/biodata/{nisn}', [PpdbController::class, 'storeBiodata'])->name('spmb.biodata.submit');
Route::post('/spmb/upload/{nisn}/lock', [PpdbController::class, 'lockBiodata'])->name('spmb.upload.lock');
Route::get('/spmb/print/{nisn}', [PpdbController::class, 'printStudent'])->name('spmb.print');

// Admin Authentication Routes
Route::get('/admin/login', [AdminController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'authenticate'])->name('admin.authenticate');
Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

// Admin Protected Routes (using controller validation)
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    
    // School Profile & Stats
    Route::get('/profile', [AdminController::class, 'manageProfile'])->name('profile');
    Route::post('/profile/update', [AdminController::class, 'updateProfileStats'])->name('profile.update');

    // Users Management (Admin Only)
    Route::get('/users', [AdminController::class, 'manageUsers'])->name('users');
    Route::get('/users/create', [AdminController::class, 'createUser'])->name('users.create');
    Route::post('/users/store', [AdminController::class, 'storeUser'])->name('users.store');
    Route::get('/users/{id}/edit', [AdminController::class, 'editUser'])->name('users.edit');
    Route::post('/users/{id}/update', [AdminController::class, 'updateUser'])->name('users.update');
    Route::post('/users/{id}/delete', [AdminController::class, 'deleteUser'])->name('users.delete');

    // Articles CRUD
    Route::get('/articles', [AdminController::class, 'manageArticles'])->name('articles');
    Route::get('/articles/create', [AdminController::class, 'createArticle'])->name('articles.create');
    Route::post('/articles/store', [AdminController::class, 'storeArticle'])->name('articles.store');
    Route::get('/articles/{id}/edit', [AdminController::class, 'editArticle'])->name('articles.edit');
    Route::post('/articles/{id}/update', [AdminController::class, 'updateArticle'])->name('articles.update');
    Route::post('/articles/{id}/delete', [AdminController::class, 'deleteArticle'])->name('articles.delete'); // using POST for easy form deletion without JS
    Route::post('/articles/{id}/toggle-featured', [AdminController::class, 'toggleFeaturedArticle'])->name('articles.toggle-featured');

    // Galleries CRUD
    Route::get('/galleries', [AdminController::class, 'manageGalleries'])->name('galleries');
    Route::post('/galleries/store', [AdminController::class, 'storeGallery'])->name('galleries.store');
    Route::post('/galleries/{id}/delete', [AdminController::class, 'deleteGallery'])->name('galleries.delete'); // using POST
    
    // Message Inbox
    Route::get('/messages', [AdminController::class, 'manageMessages'])->name('messages');
    Route::post('/messages/{id}/read', [AdminController::class, 'readMessage'])->name('messages.read');
    Route::post('/messages/{id}/delete', [AdminController::class, 'deleteMessage'])->name('messages.delete'); // using POST
    
    // PPDB (New Student) Management
    Route::get('/ppdb', [AdminController::class, 'managePpdb'])->name('ppdb');
    Route::post('/ppdb/import', [AdminController::class, 'importPpdb'])->name('ppdb.import');
    Route::post('/ppdb/upload-template', [AdminController::class, 'uploadTemplate'])->name('ppdb.upload-template');
    Route::post('/ppdb/student/{id}/delete', [AdminController::class, 'deleteStudent'])->name('ppdb.delete-student');
    Route::post('/ppdb/student/{id}/reset', [AdminController::class, 'resetStudent'])->name('ppdb.reset-student');
    Route::post('/ppdb/student/{id}/toggle-edit', [AdminController::class, 'toggleEditStudent'])->name('ppdb.toggle-edit');
    Route::post('/ppdb/student/{id}/verify', [AdminController::class, 'verifyStudent'])->name('ppdb.verify-student');
    Route::post('/ppdb/schedules', [AdminController::class, 'storeSchedule'])->name('ppdb.store-schedule');
    Route::post('/ppdb/schedules/{id}/delete', [AdminController::class, 'deleteSchedule'])->name('ppdb.delete-schedule');
    Route::get('/ppdb/student/{id}/print', [AdminController::class, 'printStudent'])->name('ppdb.print-student');
    Route::get('/ppdb/student/{id}/download-zip', [AdminController::class, 'downloadStudentZip'])->name('ppdb.download-zip');
    Route::get('/ppdb/export-xlsx', [AdminController::class, 'exportPpdbXlsx'])->name('ppdb.export-xlsx');

    // System Settings (Admin Only)
    Route::get('/settings', [AdminController::class, 'manageSettings'])->name('settings');
    Route::post('/settings/update', [AdminController::class, 'updateSettings'])->name('settings.update');
});
