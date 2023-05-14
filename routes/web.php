<?php

use App\Http\Controllers\Admin\BrowserController;
use App\Http\Controllers\Admin\CurriculumController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Client\Curr;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\TermController;
use App\Http\Controllers\TypeController;
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

    Route::get('/bienban/{id}', [BrowserController::class,'show_bbhdnt'])->name("manage.acceptance1");
    Route::get ('/detail_secretary/{id}', [BrowserController::class,'detail_secretary_client'])->name('client.detail_secretary');


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

    Route::get('/regis_calender', [HomeController::class,'showDD'])->name("client.regis_calendar");


    Route::get('/result', [Curr::class,'showDKBS_THUKI'])->name("client.result");

    Route::get('/calendar', [Curr::class,'showCalendar'])->name("client.calendar");




    Route::get('/publish', function () {
        return view('publish');
    })->name("client.publish");

    Route::get('/register',[Curr::class,'showFromRegister'])->name("client.register");

    Route::get('/compilation',[BrowserController::class,'showListCurrRegisterClient'])->name("client.compilation");

    Route::post('/upload_document',[BrowserController::class,'upload_document'])->name("client.upload_document");
    Route::post('/registerHDNTAndDateSubmit',[BrowserController::class,'registerHDNTAndDateSubmit'])->name("client.registerHDNTAndDateSubmit");



    Route::prefix('currClient')->name('currClient.')->group(function () {
            route::post('handle_register_curr',[Curr::class,'registerCurr'])->name('handle_register_curr');
    });
});
// Admin
    Route::prefix('manager')->middleware('admin')->name('manage.')->group(function () {


            //begin danh gia nt
            Route::post('/danhgianghiemthu',[BrowserController::class,'danhgianghiemthu'])->name("danhgianghiemthu");
        //thu ky
            Route::post('/danhgianghiemthu_thuky',[BrowserController::class,'danhgianghiemthu_thuky'])->name("danhgianghiemthu_thuky");

            //end danh gia nghiem thu

            //curr
            Route::prefix('/curriculum')->group(function () {

                    Route::get('/add_curriculum', function(){
                        return view('admin.add_curriculum');
                    })->name('add_curriculum');
                    Route::post('/handle_add_curriculum',[CurriculumController::class,'createaCurriculum'])->name('handle_add_curriculum');

                    Route::post('/handle_update_status_curriculum',[CurriculumController::class,'handle_update_status_curriculum'])->name('handle_update_curriculum');

                    Route::get ('/registration_list',[CurriculumController::class,'getPagination']
                    )->name('registration_list');
                    // Route::get('/delete_curr/{id}', [CurriculumController::class, 'delete_gt'])
                    // ->name('delete_curr');
            });
            Route::post('handle_edit_curr', [CurriculumController::class, 'handleEditCur'])->name('handleEditCur');

            Route::get('edit_curr/{id}', [CurriculumController::class, 'edit_curr'])->name('edit_curr');

            Route::get('delete_curr/{id}', [CurriculumController::class, 'delete_gt'])->name('delete_gt');
        
            Route::post('/handle_update_status_dkbs',[CurriculumController::class,'handle_update_status_dkbs'])->name('handle_update_status_dkbs');



            Route::get ('/', [AdminController::class, 'show_dashboard'])->name("manager");

            Route::get ('/dashboard',[AdminController::class, 'show_dashboard'] )->name('dashboard');


            //user
            Route::get ('/user', [UserController::class,'listUser'])->name('user');
            Route::get ('/add_user',[UserController::class,'showFrom'])->name('add_user');
            Route::post ('/handle_add_user',[UserController::class,'createAccountUser'])->name('handle_add_user');
            Route::get('/edit_user/{id}', [UserController::class, 'edit_user'])->name('edit_user');

            Route::post('/handle_edit_user/{id}', [UserController::class, 'handle_edit_user'])->name('handle_edit_user');

            Route::get('/detail_user/{id}', [UserController::class, 'detail_user'])->name('admin.detail_user');
           

            Route::get('/delete_user/{id}', [UserController::class, 'delete_user'])->name('delete_user');
            //end user

            // Route::get ('/detail_user/{id}', function(){
            //     return view('admin.detail_user');
            // })->name('detail_user');

            // Route::get ('/edit_user', function(){
            //     return view('admin.edit_user');
            // })->name('edit_user');


            Route::get ('/registration_document_list', function(){
                return view('admin.registration_document_list');
            })->name('registration_document_list');

            Route::get ('/acceptance_list', function(){
                return view('admin.acceptance_list');
            })->name('acceptance_list');

            //test
            Route::get ('/acceptance', function(){
                return view('admin.acceptance');
            })->name('acceptance');
            //

            Route::get ('/acceptance_curriculum_list', function(){
                return view('admin.acceptance_curriculum_list');
            })->name('acceptance_curriculum_list');

            Route::get ('/acceptance_document_list', function(){
                return view('admin.acceptance_document_list');
            })->name('acceptance_document_list');

            Route::get ('/publish_list', [BrowserController::class,'show_publish_list'])->name('publish_list');

            Route::get ('/publish_curriculum_list', function(){
                return view('admin.publish_curriculum_list');
            })->name('publish_curriculum_list');

            Route::get ('/publish_document_list', function(){
                return view('admin.publish_document_list');
            })->name('publish_document_list');


            Route::get ('/add_term', function(){
                return view('admin.add_term');
            })->name('add_term');

            Route::get ('/edit_curriculum', function(){
                return view('admin.edit_curriculum');
            })->name('edit_curriculum');


            //permisssion
            Route::get ('/permission',[PermissionController::class,'listUser'] )->name('permission');
            Route::post ('/handle_permission',[PermissionController::class,'handle_permission'] )->name('handle_permission');


            Route::get ('/role', [PermissionController::class,'showListRole'])->name('role');
            Route::post ('/handleGrantPossition', [PermissionController::class,'handleGrantPossition'])->name('handleGrantPossition');

            //end permission


            //truong khoa
            Route::get ('/browser_one',[BrowserController::class,'showListBrowserOne'] )->name('browser_one');
            Route::post ('/hanle_browser_one',[BrowserController::class,'hanle_browser_one'] )->name('hanle_browser_one');

            //HD truong
            Route::get ('/browser_two',[BrowserController::class,'showListBrowserTwo']  )->name('browser_two');
            Route::post ('/hanle_browser_two',[BrowserController::class,'hanle_browser_two'] )->name('hanle_browser_two');
            Route::get ('/date', [BrowserController::class,'listNT'])->name('date');
            Route::post ('/admin_brow_date', [BrowserController::class,'admin_brow_date'])->name('admin_brow_date');
            Route::post ('/show_list_nt', [BrowserController::class,'show_list_nt'])->name('show_list_nt');


            //HD nghiem thu
            Route::get ('/acceptance', [BrowserController::class,'show_list_nt'])->name('acceptance');
            Route::get ('/secretary', [BrowserController::class,'show_list_nt_thuky'])->name('secretary');
            Route::get ('/detail_secretary/{id}', [BrowserController::class,'detail_secretary'])->name('detail_secretary');
            
            
            
            //download docx
            Route::get ('/download_docx/{id}', [BrowserController::class,'download_docx'])->name('download_docx');



    });







Route::get('/manage/add_faculty', function(){
    return view('admin.add_faculty');
})->name('manage.add_faculty');

Route::get('/manage/add_term', function(){
    return view('admin.add_term');
})->name('manage.add_term');

Route::get('/manage/add_typecurr', function(){
    return view('admin.add_typecurr');
})->name('manage.add_typecurr');

// Route::get ('/manage/faculty_list', function(){
//     return view('admin.faculty_list')
//     ;
// })->name('manage.faculty_list');

Route::get ('/manage/faculty_list', [FacultyController::class, 'faculty_list'])->name('manage.faculty_list');


Route::get ('/manage/add_level', function(){
    return view('admin.add_level');
})->name('manage.add_level');

Route::get ('/manage/add_location', function(){
    return view('admin.add_location');
})->name('manage.add_location');



// Backend
Route::get('/login', [AdminController::class, 'index'])->name("login");
Route::get('/logout', [AdminController::class, 'logout'])->name("logout");

Route::post('/handleLogin', [AdminController::class, 'handleLogin'])->name("handleLogin");

Route::get('/manage.dashboard', [AdminController::class, 'show_dashboard']);

Route::post('/add_faculty', [FacultyController::class, 'add_khoa']);
Route::get('/manage/edit_faculty/{id_khoa}', [FacultyController::class, 'edit_khoa']);
Route::post('/update_faculty/{id_khoa}', [FacultyController::class, 'update_khoa']);
Route::get('/manage/delete_faculty/{id_khoa}', [FacultyController::class, 'delete_khoa']);

Route::get ('/manage/type_curr', [TypeController::class, 'typecurr'])->name('manage.type_curr');
Route::post('/add_typecurr', [TypeController::class, 'add_loai']);
Route::get('/manage/edit_typecurr/{id_loai}', [TypeController::class, 'edit_loai']);
Route::post('/update_typecurr/{id_loai}', [TypeController::class, 'update_loai']);
Route::get('/manage/delete_typecurr/{id_loai}', [TypeController::class, 'delete_loai']);

Route::get('/manage/level_list', [LevelController::class, 'level_list'])->name('manage.level_list');
Route::post('/add_level', [LevelController::class, 'add_trinhdo']);
Route::get('/manage/edit_level/{id_trinhdo}', [LevelController::class, 'edit_trinhdo']);
Route::post('/update_level/{id_trinhdo}', [LevelController::class, 'update_trinhdo']);
Route::get('/manage/delete_level/{id_trinhdo}', [LevelController::class, 'delete_trinhdo']);


Route::get ('/manage/term', [TermController::class, 'term'])->name('manage.term');
Route::post('/add_term', [TermController::class, 'add_hp']);
Route::get('/manage/edit_term/{id_hp}', [TermController::class, 'edit_hp']);
Route::post('/update_term/{id_hp}', [TermController::class, 'update_hp']);
Route::get('/manage/delete_term/{id_hp}', [TermController::class, 'delete_term']);

Route::get('/manage/location', [LocationController::class, 'location_list'])->name('manage.location');
Route::post('/add_location', [LocationController::class, 'add_diadiem']);
Route::get('/manage/edit_location/{id_dd}', [LocationController::class, 'edit_diadiem']);
Route::post('/update_location/{id_dd}', [LocationController::class, 'update_diadiem']);
Route::get('/manage/delete_location/{id_dd}', [LocationController::class, 'delete_diadiem']);