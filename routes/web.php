<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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
})->name("client");

Route::get('/curriculum', function () {
    return view('curriculum');
})->name("client.curriculum");

// Admin
Route::get ('/manage', function(){
    return view('admin.dashboard');
})->name("manager");

Route::get ('/manage/dashboard', function(){
    return view('admin.dashboard');
})->name('manage.dashboard');

Route::get ('/manage/user', function(){
    return view('admin.user');
})->name('manage.user');//lay cai name gan vaof route laf no chay toi day

Route::get ('/manage/add_user', function(){
    return view('admin.add_user');
})->name('manage.add_user');

Route::get ('/manage/registration_list', function(){
    return view('admin.registration_list');
})->name('manage.registration_list');

Route::get ('/manage/registration_curriculum_list', function(){
    return view('admin.registration_curriculum_list');
})->name('manage.registration_curriculum_list');

Route::get ('/manage/registration_document_list', function(){
    return view('admin.registration_document_list');
})->name('manage.registration_document_list');

Route::get ('/manage/acceptance_list', function(){
    return view('admin.acceptance_list');
})->name('manage.acceptance_list');

Route::get ('/manage/acceptance_curriculum_list', function(){
    return view('admin.acceptance_curriculum_list');
})->name('manage.acceptance_curriculum_list');

Route::get ('/manage/acceptance_document_list', function(){
    return view('admin.acceptance_document_list');
})->name('manage.acceptance_document_list');

Route::get ('/manage/publish_list', function(){
    return view('admin.publish_list');
})->name('manage.publish_list');

Route::get ('/manage/publish_curriculum_list', function(){
    return view('admin.publish_curriculum_list');
})->name('manage.publish_curriculum_list');

Route::get ('/manage/publish_document_list', function(){
    return view('admin.publish_document_list');
})->name('manage.publish_document_list');

Route::get ('/manage/permission', function(){
    return view('admin.permission');
})->name('manage.permission');

Route::get ('/manage/role', function(){
    return view('admin.role');
})->name('manage.role');

// Backend

Route::get('/login', [AdminController::class, 'index'])->name("login");
Route::post('/handleLogin', [AdminController::class, 'handleLogin'])->name("handleLogin");
Route::get('/manage.dashboard', [AdminController::class, 'show_dashboard']);