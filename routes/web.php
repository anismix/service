<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/','AdminController@login', function () {
    return view('welcome');
});
Route::get('/','IndexController@index');
//listing service
Route::match(['get', 'post'], '/admin', 'AdminController@login');
Route::get('/services/{url}', 'ServiceController@services');
Route::get('/service/{id}', 'ServiceController@service');
Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => ['auth']], function () {

Route::get('/admin/setting','AdminController@setting');
Route::get('/admin/chek_pwd','AdminController@checkpwd');
Route::match(['get', 'post'], '/admin/update_pwd', 'AdminController@updatePwd');
Route::get('/admin/dashbord','AdminController@dashbord');
Route::get('/logout','AdminController@logout');
//CategoryController
Route::match(['get', 'post'], '/admin/add-category','CategoryController@addCategory');
Route::get('/admin/view-category','CategoryController@viewCategories');
Route::match(['get', 'post'], '/admin/edit-category/{id}','CategoryController@editCategory');
Route::match(['get', 'post'], '/admin/delete-category/{id}','CategoryController@deleteCategory');
//ServiceContoller
Route::match(['get', 'post'], '/admin/add-service','ServiceController@addservice');
Route::get('/admin/view-service','ServiceController@viewservices');
Route::match(['get', 'post'], '/admin/edit-service/{id}','ServiceController@editservice');
Route::get('admin/delete-image/{id}', 'ServiceController@deleteImage');
Route::get('admin/delete-service/{id}', 'ServiceController@deleteservice');

});
//User
Route::match(['get', 'post'], '/check-email', 'UserController@checkEmail');
Auth::routes();
Route::get('/login-register', 'UserController@userLoginRegister');
Route::post('/user-register','UserController@register');
Route::post('/user-login','UserController@login');
Route::get('/user-logout','UserController@logout');

Route::group(['middleware' => ['acces']], function () {
    Route::match(['get', 'post'], '/account', 'UserController@account');
    Route::post('/check-pass','UserController@checkpass');
    Route::post('/update-pass','UserController@updatepass');
    Route::post('/update-pass','UserController@updatepass');
    Route::match(['get', 'post'], '/add-service','ServiceController@userService');
    Route::post('/postblog/{id}','BlogController@addPost');
    Route::post('/comment/{id}','CommentController@addComment');


});
//forum
Route::get('/blog','BlogController@index');


