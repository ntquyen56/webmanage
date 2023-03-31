<?php

use App\Http\Controllers\Admin\CurriculumController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Client\Curr;
use App\Http\Controllers\Client\HomeController;
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
Route::prefix('/')->middleware('auth')->group(function () {

    Route::get('/home', [HomeController::class,'pageHome'])->name("client");
    Route::get('/', [HomeController::class,'pageHome'])->name("client");


    Route::get('/curriculum', [CurriculumController::class,'listCurriculum'])->name("client.curriculum");

    // Route::get('/curriculum', function () {
    //     return view('curriculum');
    // })->name("client.curriculum");

    Route::get('/propose', function () {
        return view('propose');
    })->name("client.propose");


    //update info
    Route::get('/update_info', [HomeController::class,'showFromUpdate'])->name("client.update_info");

    Route::post('/handle_update_info', [HomeController::class,'handle_update_info'])->name("client.handle_update_info");


    //end update info
    Route::get('/result', function () {
        return view('result');
    })->name("client.result");

    Route::get('/calendar', function () {
        return view('calendar');
    })->name("client.calendar");

    Route::get('/publish', function () {
        return view('publish');
    })->name("client.publish");

    Route::get('/register',[Curr::class,'showFromRegister'])->name("client.register");

    Route::get('/compilation', function () {
        return view('compilation');
    })->name("client.compilation");



    Route::prefix('currClient')->name('currClient.')->group(function () {
            route::post('handle_register_curr',[Curr::class,'registerCurr'])->name('handle_register_curr');
    });
});
// Admin
    Route::prefix('manager')->middleware('admin')->name('manage.')->group(function () {

            //curr
            Route::prefix('/curriculum')->group(function () {

                    Route::get('/add_curriculum', function(){
                        return view('admin.add_curriculum');
                    })->name('add_curriculum');
                    Route::post('/handle_add_curriculum',[CurriculumController::class,'createaCurriculum'])->name('handle_add_curriculum');

                    Route::post('/handle_update_status_curriculum',[CurriculumController::class,'handle_update_status_curriculum'])->name('handle_update_curriculum');

                    Route::get ('/registration_list',[CurriculumController::class,'getPagination']
                    )->name('registration_list');
            });



            Route::get ('/', function(){
                return view('admin.dashboard');
            })->name("manager");

            Route::get ('/dashboard', function(){
                return view('admin.dashboard');
            })->name('dashboard');


            //user
            Route::get ('/user', [UserController::class,'listUser'])->name('user');
            Route::get ('/add_user',[UserController::class,'showFrom'])->name('add_user');
            Route::post ('/handle_add_user',[UserController::class,'createAccountUser'])->name('handle_add_user');
            Route::get('/edit_user/{id}', [UserController::class, 'edit_user'])->name('edit_user');

            Route::post('/handle_edit_user/{id}', [UserController::class, 'handle_edit_user'])->name('handle_edit_user');


            Route::get('/delete_user/{id}', [UserController::class, 'delete_user'])->name('delete_user');
            //end user

            Route::get ('/detail_user', function(){
                return view('admin.detail_user');
            })->name('detail_user');

            // Route::get ('/edit_user', function(){
            //     return view('admin.edit_user');
            // })->name('edit_user');


            Route::get ('/registration_document_list', function(){
                return view('admin.registration_document_list');
            })->name('registration_document_list');

            Route::get ('/acceptance_list', function(){
                return view('admin.acceptance_list');
            })->name('acceptance_list');

            Route::get ('/acceptance_curriculum_list', function(){
                return view('admin.acceptance_curriculum_list');
            })->name('acceptance_curriculum_list');

            Route::get ('/acceptance_document_list', function(){
                return view('admin.acceptance_document_list');
            })->name('acceptance_document_list');

            Route::get ('/publish_list', function(){
                return view('admin.publish_list');
            })->name('publish_list');

            Route::get ('/publish_curriculum_list', function(){
                return view('admin.publish_curriculum_list');
            })->name('publish_curriculum_list');

            Route::get ('/publish_document_list', function(){
                return view('admin.publish_document_list');
            })->name('publish_document_list');


            //permisssion
            Route::get ('/permission',[PermissionController::class,'listUser'] )->name('permission');
            Route::post ('/handle_permission',[PermissionController::class,'handle_permission'] )->name('handle_permission');


            Route::get ('/role', [PermissionController::class,'showListRole'])->name('role');
            Route::post ('/handleGrantPossition', [PermissionController::class,'handleGrantPossition'])->name('handleGrantPossition');

            //end permission


            //truong khoa
            Route::get ('/browser_one', function(){
                return view('admin.browser_one');
            })->name('browser_one');

            //HD truong
            Route::get ('/browser_two', function(){
                return view('admin.browser_two');
            })->name('browser_two');

            //HD nghiem thu
            Route::get ('/acceptance', function(){
                return view('admin.acceptance');
            })->name('acceptance');
    });





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
Route::get('/logout', [AdminController::class, 'logout'])->name("logout");

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

