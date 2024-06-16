<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\NoteController;
use Illuminate\Support\Facades\Route;

Route::middleware(['guest'])->group(function () {
   Route::get('/login', [AuthController::class, 'loginPage'])->name('login');
   Route::get('/register', [AuthController::class, 'registerPage'])->name('register');
   Route::post('/login', [AuthController::class, 'login'])->name('login-post');
   Route::post('/register', [AuthController::class, 'register'])->name('register-post');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/', [UserController::class, 'dashboardPage'])->name('dashboard');

    Route::get('/categories', [CategoryController::class, 'list'])->name('category');
    Route::get('/categories/new', [CategoryController::class, 'createPage'])->name('create-category');
    Route::post('/categories/new', [CategoryController::class, 'create'])->name('create-post-category');
    Route::get('/categories/{category:slug}', [CategoryController::class, 'show'])->name('show-category');
    Route::get('/categories/{category:slug}/edit', [CategoryController::class, 'editPage'])->name('edit-category');
    Route::post('/categories/{category:slug}/edit', [CategoryController::class, 'edit'])->name('edit-post-category');
    Route::delete('/categories/{category:slug}/delete', [CategoryController::class, 'delete'])->name('delete-category');

    Route::get('/accounts', [AccountController::class, 'list'])->name('account');
    Route::get('/accounts/new', [AccountController::class, 'createPage'])->name('create-account');
    Route::post('/accounts/new', [AccountController::class, 'create'])->name('create-post-account');
    Route::get('/accounts/{account}', [AccountController::class, 'show'])->name('show-account');
    Route::get('/accounts/{account}/edit', [AccountController::class, 'editPage'])->name('edit-account');
    Route::post('/accounts/{account}/edit', [AccountController::class, 'edit'])->name('edit-post-account');
    Route::delete('/accounts/{account}/delete', [AccountController::class, 'delete'])->name('delete-account');

    Route::get('/sites', [SiteController::class, 'list'])->name('site');
    Route::get('/sites/new', [SiteController::class, 'createPage'])->name('create-site');
    Route::post('/sites/new', [SiteController::class, 'create'])->name('create-post-site');
    Route::get('/sites/{site:slug}', [SiteController::class, 'show'])->name('show-site');
    Route::get('/sites/{site:slug}/edit', [SiteController::class, 'editPage'])->name('edit-site');
    Route::post('/sites/{site:slug}/edit', [SiteController::class, 'edit'])->name('edit-post-site');
    Route::delete('/sites/{site:slug}/delete', [SiteController::class, 'delete'])->name('delete-site');

    Route::get('/notes', [NoteController::class, 'list'])->name('note');
    Route::get('/notes/new', [NoteController::class, 'createPage'])->name('create-note');
    Route::post('/notes/new', [NoteController::class, 'create'])->name('create-post-note');
    Route::get('/notes/{note:slug}', [NoteController::class, 'show'])->name('show-note');
    Route::get('/notes/{note:slug}/edit', [NoteController::class, 'editPage'])->name('edit-note');
    Route::post('/notes/{note:slug}/edit', [NoteController::class, 'edit'])->name('edit-post-note');
    Route::delete('/notes/{note:slug}/delete', [NoteController::class, 'delete'])->name('delete-note');

    Route::get('/profil', [UserController::class, 'profilPage'])->name('profil');
    Route::post('/profil/credentials', [UserController::class, 'editCredential'])->name('edit-credentials');
    Route::post('/profil/password', [UserController::class, 'editPassword'])->name('edit-password');
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
 });