<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!F/
|
*/

Route::get('/','AdminController@login', function () {
    return view('welcome');
});

Route::get('/','IndexController@index');
Route::get('/search','IndexController@search');
Route::match(['get', 'post'],'/contact','ContactController@contact');

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
Route::match(['get', 'post'],'/verifyservice/{notification}','AdminController@verify')->name('verifyservice');

//CategoryController
Route::match(['get', 'post'], '/admin/add-category','CategoryController@addCategory');
Route::match(['get', 'post'], '/admin/view-users','UserController@User');
Route::match(['get', 'post'], '/admin/view-posts','BlogController@Posts');
Route::get('/admin/view-category','CategoryController@viewCategories');
Route::match(['get', 'post'], '/admin/edit-category/{id}','CategoryController@editCategory');
Route::match(['get', 'post'], '/admin/delete-category/{id}','CategoryController@deleteCategory');
Route::match(['get', 'post'], '/admin/delete-post/{id}','BlogController@deletePost');
Route::match(['get', 'post'], '/admin/delete-user/{id}','UserController@deleteUser');
//ServiceContoller
Route::match(['get', 'post'], '/admin/add-service','ServiceController@addservice');
Route::get('/admin/view-service','ServiceController@viewservices');
Route::match(['get', 'post'], '/admin/edit-service/{id}','ServiceController@editservice');
Route::get('admin/delete-image/{id}', 'ServiceController@deleteImage');
Route::get('admin/delete-service/{id}', 'ServiceController@deleteservice');

});
//User
Route::match(['get', 'post'], '/check-email', 'UserController@checkEmail');
Route::match(['get', 'post'], '/forget-password', 'UserController@forgetPassword');
Auth::routes();
Route::get('/login-register', 'UserController@userLoginRegister');
Route::get('/confirm/{code}', 'UserController@confirm')->name('confirm');
Route::post('/user-register','UserController@register');
Route::post('/user-login','UserController@login');
Route::get('/user-logout','UserController@logout');
Route::get('/user-logout','UserController@logout');

Route::group(['middleware' => ['acces']], function () {
    Route::match(['get', 'post'], '/account', 'UserController@account');
    Route::post('/check-pass','UserController@checkpass');
    Route::post('/update-pass','UserController@updatepass');
    Route::post('/update-pass','UserController@updatepass');
    Route::match(['get', 'post'], '/add-service','ServiceController@userService');
    Route::post('/postblog/{id}','BlogController@addPost');
    Route::post('/comment/{id}','CommentController@addComment');
    Route::post('/commentdetail/{id}','CommentController@addCommentdetail');

});
//forum
Route::get('/blog/{name}','BlogController@listBlog');
Route::get('/blog','BlogController@index');
Route::get('/postdetail/{id}','BlogController@postDetail');

Route::get('login/facebook', 'UserController@redirectToProvider');
Route::get('login/facebook/callback', 'UserController@handleProviderCallback');

