<?php

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
/*
 * Website
 */
Route::get('/','BlogController@index' );
Route::get('/about-us','BlogController@aboutUs' );
Route::get('/blog-details/{id}','BlogController@blogDetails' );
Route::get('/cat-details/{id}','BlogController@categoryDetails' );
Route::post('/save-comments','BlogController@comments' );
/*
 * Admin Panel
 */
Route::get('/admin','AdminController@index' );
Route::post('/admin-login-check','AdminController@adminLoginCheck' );
Route::get('/dashboard','SuperAdminController@index' );
Route::get('/add-category','SuperAdminController@addCategory' );
Route::post('/save-category','SuperAdminController@saveCategory' );
Route::get('/manage-category','SuperAdminController@manageCategory' );
Route::get('/unpublish-category/{id}','SuperAdminController@unpublishCategory' );
Route::get('/publish-category/{id}','SuperAdminController@publishCategory' );
Route::get('/delete-category/{id}','SuperAdminController@deleteCategory' );
Route::get('/edit-category/{id}','SuperAdminController@editCategory' );
Route::post('/update-category/{id}','SuperAdminController@updateCategory' );
Route::get('/add-blog','SuperAdminController@addBlog' );
Route::get('/manage-blog','SuperAdminController@manageBlog' );
Route::get('/unpublish-blog/{id}','SuperAdminController@unpublishBlog' );
Route::get('/publish-blog/{id}','SuperAdminController@publishBlog' );
Route::get('/edit-blog/{id}','SuperAdminController@editBlog' );
Route::post('/update-blog','SuperAdminController@updateBlog' );
Route::get('/delete-blog/{id}','SuperAdminController@deleteBlog' );
Route::post('/save-blog','SuperAdminController@saveBlog' );
Route::get('/logout/{id}','SuperAdminController@logout' );
Route::get('/manage-comment','SuperAdminController@manageComment' );
Route::get('/publish-comment/{id}','SuperAdminController@publishComment' );
Route::get('/unpublish-comment/{id}','SuperAdminController@unpublishComment' );
Route::get('/delete-comment/{id}','SuperAdminController@deleteComment' );

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
