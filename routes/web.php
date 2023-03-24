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

// Client
Route::prefix('/')->middleware('auth')->group(function () {

Route::get('/', function () {
    return view('home');
})->name("client");

Route::get('/curriculum', function () {
    return view('curriculum');
})->name("client.curriculum");

Route::get('/propose', function () {
    return view('propose');
})->name("client.propose");

Route::get('/update_info', function () {
    return view('update_info');
})->name("client.update_info");

Route::get('/result', function () {
    return view('result');
})->name("client.result");

Route::get('/calendar', function () {
    return view('calendar');
})->name("client.calendar");

Route::get('/publish', function () {
    return view('publish');
})->name("client.publish");
});
// Admin
    Route::prefix('manager')->middleware('admin')->group(function () {
Route::get ('/', function(){
    return view('admin.dashboard');
})->name("manager");

Route::get ('/dashboard', function(){
    return view('admin.dashboard');
})->name('manage.dashboard');

Route::get ('/user', function(){
    return view('admin.user');
})->name('manage.user');

Route::get ('/add_user', function(){
    return view('admin.add_user');
})->name('manage.add_user');

Route::get ('/detail_user', function(){
    return view('admin.detail_user');
})->name('manage.detail_user');

Route::get ('/edit_user', function(){
    return view('admin.edit_user');
})->name('manage.edit_user');

Route::get ('/registration_list', function(){
    return view('admin.registration_list');
})->name('manage.registration_list');

Route::get ('/registration_curriculum_list', function(){
    return view('admin.registration_curriculum_list');
})->name('manage.registration_curriculum_list');

Route::get ('/registration_document_list', function(){
    return view('admin.registration_document_list');
})->name('manage.registration_document_list');

Route::get ('/acceptance_list', function(){
    return view('admin.acceptance_list');
})->name('manage.acceptance_list');

Route::get ('/acceptance_curriculum_list', function(){
    return view('admin.acceptance_curriculum_list');
})->name('manage.acceptance_curriculum_list');

Route::get ('/acceptance_document_list', function(){
    return view('admin.acceptance_document_list');
})->name('manage.acceptance_document_list');

Route::get ('/publish_list', function(){
    return view('admin.publish_list');
})->name('manage.publish_list');

Route::get ('/publish_curriculum_list', function(){
    return view('admin.publish_curriculum_list');
})->name('manage.publish_curriculum_list');

Route::get ('/publish_document_list', function(){
    return view('admin.publish_document_list');
})->name('manage.publish_document_list');

Route::get ('/permission', function(){
    return view('admin.permission');
})->name('manage.permission');

Route::get ('/role', function(){
    return view('admin.role');
})->name('manage.role');
    });


// Backend

Route::get('/login', [AdminController::class, 'index'])->name("login");
Route::get('/logout', [AdminController::class, 'logout'])->name("logout");

Route::post('/handleLogin', [AdminController::class, 'handleLogin'])->name("handleLogin");
Route::get('/manager.dashboard', [AdminController::class, 'show_dashboard']);
