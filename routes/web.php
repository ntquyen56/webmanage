<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\LevelController;

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

// Admin
Route::get ('/manage', function(){
    return view('admin.dashboard');
})->name("manager");

Route::get ('/manage/dashboard', function(){
    return view('admin.dashboard');
})->name('manage.dashboard');

Route::get ('/manage/user', function(){
    return view('admin.user');
})->name('manage.user');

Route::get ('/manage/add_user', function(){
    return view('admin.add_user');
})->name('manage.add_user');

Route::get ('/manage/detail_user', function(){
    return view('admin.detail_user');
})->name('manage.detail_user');

Route::get ('/manage/edit_user', function(){
    return view('admin.edit_user');
})->name('manage.edit_user');

Route::get ('/manage/registration_list', function(){
    return view('admin.registration_list');
})->name('manage.registration_list');

Route::get ('/manage/add_curriculum', function(){
    return view('admin.add_curriculum');
})->name('manage.add_curriculum');

Route::get ('/manage/acceptance_list', function(){
    return view('admin.acceptance_list');
})->name('manage.acceptance_list');

Route::get ('/manage/publish_list', function(){
    return view('admin.publish_list');
})->name('manage.publish_list');

Route::get ('/manage/permission', function(){
    return view('admin.permission');
})->name('manage.permission');

Route::get ('/manage/role', function(){
    return view('admin.role');
})->name('manage.role');

Route::get('/manage/add_faculty', function(){
    return view('admin.add_faculty');
})->name('manage.add_faculty');

// Route::get ('/manage/faculty_list', function(){
//     return view('admin.faculty_list')
//     ;
// })->name('manage.faculty_list');

Route::get ('/manage/faculty_list', [FacultyController::class, 'faculty_list'])->name('manage.faculty_list');

// Route::get ('/manage/level_list', function(){
//     return view('admin.level_list');
// })->name('manage.level_list');

Route::get ('/manage/add_level', function(){
    return view('admin.add_level');
})->name('manage.add_level');

// Backend
Route::get('/login', [AdminController::class, 'index'])->name("login");
Route::post('/handleLogin', [AdminController::class, 'handleLogin'])->name("handleLogin");
Route::get('/manage.dashboard', [AdminController::class, 'show_dashboard']);

Route::post('/add_faculty', [FacultyController::class, 'add_khoa']);
Route::get('/manage/edit_faculty/{id_khoa}', [FacultyController::class, 'edit_khoa']);
Route::post('/update_faculty/{id_khoa}', [FacultyController::class, 'update_khoa']);
Route::get('/manage/delete_faculty/{id_khoa}', [FacultyController::class, 'delete_khoa']);

Route::get('/manage/level_list', [LevelController::class, 'level_list'])->name('manage.level_list');;
Route::post('/add_level', [LevelController::class, 'add_trinhdo']);
Route::get('/manage/edit_level/{id_trinhdo}', [LevelController::class, 'edit_trinhdo']);
Route::post('/update_level/{id_trinhdo}', [LevelController::class, 'update_trinhdo']);
Route::get('/manage/delete_level/{id_trinhdo}', [LevelController::class, 'delete_trinhdo']);

