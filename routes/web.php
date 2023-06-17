<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\chkUserLogin;
//use App\Http\Controllers\TagController;

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



Route::get('/login', function () {return view('login');});
Route::post('/checkLog', 'App\Http\Controllers\AuthController@checkUserLogin')->name('checkLog');

Route::group(['middleware' => 'prevent-back-history'],function(){
    Route::middleware([chkUserLogin::class])->group(function () {

        //Route::get('/', function () {return view('index');});

        Route::get('/', 'App\Http\Controllers\HomeController@index')->name('homeIndex');
        Route::get('/getDreamTypeDetails', 'App\Http\Controllers\HomeController@getDreamTypeDetails')->name('getDreamTypeDetails');

        Route::get('/logOut', 'App\Http\Controllers\AuthController@userLogOut')->name('logOut');

        Route::get('/tags', 'App\Http\Controllers\TagController@index')->name('tagsIndex');
        Route::get('/add_new_tags', 'App\Http\Controllers\TagController@addNewIndex')->name('addtagsIndex');
        Route::post('/save_new_tags', 'App\Http\Controllers\TagController@saveNewTag')->name('tagSaveDetails');
        Route::get('/tag_edit/{id}', 'App\Http\Controllers\TagController@edit')->name('editTagIndex');
        Route::put('/tag_update', 'App\Http\Controllers\TagController@update')->name('updateTagDetails');
        Route::delete('/tag_delete', 'App\Http\Controllers\TagController@destroy')->name('deleteTagDetails');

        Route::get('/user_register', 'App\Http\Controllers\UserRegisterController@index')->name('userRegisterIndex');
        Route::get('/add_new_user', 'App\Http\Controllers\UserRegisterController@addNewUserIndex')->name('addNewUserIndex');
        Route::post('/save_new_user', 'App\Http\Controllers\UserRegisterController@saveNewUser')->name('userSaveDetails');
        Route::get('/user_view/{id}', 'App\Http\Controllers\UserRegisterController@view')->name('viewUser');
        Route::get('/user_edit/{id}', 'App\Http\Controllers\UserRegisterController@edit')->name('editUserIndex');
        Route::put('/user_update', 'App\Http\Controllers\UserRegisterController@update')->name('userUpdateDetails');
        Route::delete('/user_delete', 'App\Http\Controllers\UserRegisterController@destroy')->name('deleteUserDetails');

        Route::get('/user_role', 'App\Http\Controllers\UserRoleController@index')->name('userRoleIndex');
        Route::get('/add_new_user_role', 'App\Http\Controllers\UserRoleController@addNewuserRoleIndex')->name('addNewUserRoleIndex');
        Route::post('/save_new_user_role', 'App\Http\Controllers\UserRoleController@saveNewUserRole')->name('userRoleSaveDetails');
        Route::get('/user_role_view/{id}', 'App\Http\Controllers\UserRoleController@view')->name('viewUserRole');
        Route::get('/user_role_edit/{id}', 'App\Http\Controllers\UserRoleController@edit')->name('editUserRoleIndex');
        Route::put('/user_role_update', 'App\Http\Controllers\UserRoleController@update')->name('userRoleUpdateDetails');
        Route::delete('/user_role_delete', 'App\Http\Controllers\UserRoleController@destroy')->name('deleteUserRoleDetails');

        Route::get('/sys_dream', 'App\Http\Controllers\SystemDreamMeaningController@index')->name('userSysDreamIndex');
        Route::get('/add_new_sys_dream', 'App\Http\Controllers\SystemDreamMeaningController@addNewSysDreamMeaningIndex')->name('addNewSysDreamIndex');
        Route::post('/save_new_sys_dream', 'App\Http\Controllers\SystemDreamMeaningController@saveNewSysDreamMeaning')->name('sysDreamSaveDetails');
        Route::get('/sys_dream_view/{id}', 'App\Http\Controllers\SystemDreamMeaningController@view')->name('viewsysDream');
        Route::get('/sys_dream_edit/{id}', 'App\Http\Controllers\SystemDreamMeaningController@edit')->name('editsysDreamIndex');
        Route::put('/sys_dream_update', 'App\Http\Controllers\SystemDreamMeaningController@update')->name('sysDreamUpdateDetails');
        Route::delete('/sys_dream_delete', 'App\Http\Controllers\SystemDreamMeaningController@destroy')->name('deletesysDreamDetails');

        Route::get('/system_dream', 'App\Http\Controllers\SystemDreamController@index')->name('systemDreamIndex');
        Route::get('/add_system_dream', 'App\Http\Controllers\SystemDreamController@addSysDreamIndex')->name('addSystemDreamIndex');
        Route::post('/save_system_dream', 'App\Http\Controllers\SystemDreamController@saveSystemDream')->name('systemDreamSaveDetails');
        Route::get('/system_dream_view/{id}', 'App\Http\Controllers\SystemDreamController@view')->name('viewsystemDream');
        Route::get('/system_dream_edit/{id}', 'App\Http\Controllers\SystemDreamController@edit')->name('editsystemDreamIndex');
        Route::put('/system_dream_update', 'App\Http\Controllers\SystemDreamController@update')->name('systemDreamUpdateDetails');
        Route::delete('/system_dream_delete', 'App\Http\Controllers\SystemDreamController@destroy')->name('deletesystemDreamDetails');

        Route::get('/user_dream', 'App\Http\Controllers\UserDreamController@index')->name('userDreamIndex');
        Route::get('/add_user_dream', 'App\Http\Controllers\UserDreamController@addUserDreamIndex')->name('addUserDreamIndex');
        Route::post('/save_user_dream', 'App\Http\Controllers\UserDreamController@saveUserDream')->name('userDreamSaveDetails');
        Route::get('/user_dream_view/{id}', 'App\Http\Controllers\UserDreamController@view')->name('viewUserDreamIndex');
        Route::get('/user_dream_edit/{id}', 'App\Http\Controllers\UserDreamController@edit')->name('editUserDreamIndex');
        Route::put('/user_dream_update', 'App\Http\Controllers\UserDreamController@update')->name('userDreamUpdateDetails');
        Route::delete('/user_dream_delete', 'App\Http\Controllers\UserDreamController@destroy')->name('deleteUserDreamDetails');

    });
});