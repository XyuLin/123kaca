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

// index
Route::get('/', 'Kaca\IndexController@index' );
Route::get('/index', 'Kaca\IndexController@index' );
// 登录
Route::get('login', 'Auth\LoginController@loginShow')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login');
// 登录退出
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
// 美食图库// 图库
Route::get('type', 'Kaca\IndexController@type')->name('type');
Route::get('works/{type?}', 'Kaca\IndexController@works');
// 图片素材
Route::get('gallerys/{type?}', 'Kaca\IndexController@gallery')->name('gallery');
// 下载信息
Route::get('gallery/{gallery}','Kaca\IndexController@gallerInfo');
// 作品
Route::get('work/{work}', 'Kaca\IndexController@workInfo');

Route::get('food/{type}', 'Kaca\IndexController@food');


Route::get('likes/{id}', 'Kaca\IndexController@likes');
 // 后台
Route::middleware(['web','auth'])->group(function() {
	// 用户列表
	Route::get('/user', 'Admin\UserController@index' )->name('user');
	// 注册用户
	Route::post('insert', 'Admin\UserController@add')->name('insert');
	Route::get('insert', 'Admin\UserController@insert')->name('insert');

	// 作品上传
	Route::get('upload','Admin\WorkController@upShow')->name('upload');
	Route::post('upload','Admin\WorkController@upload')->name('upload');
	// 修改作品
	Route::get('editW/{id}', 'Admin\WorkController@editShow');
	Route::post('editWork/{id}', 'Admin\WorkController@editWork');
	Route::get('delImg/{id}/work/{work}', 'Admin\WorkController@delImg');
	
	// 图库上传
	Route::get('galleryUp','Admin\GalleryController@galleryShow')->name('galleryUp');
	Route::post('galleryUp','Admin\GalleryController@galleryUp');
	Route::get('editG/{id}','Admin\GalleryController@editShow');
	Route::post('editGallery/{id}', 'Admin\GalleryController@editGallery');
	Route::get('delimage/{id}','Admin\GalleryController@delImage');
	// 删除作品
	Route::get('destroy/{work}', 'Admin\WorkController@destroyWork')->name('destroyWork');

	// 作品提交
	Route::get('work','Admin\WorkController@workList')->name('work');
	Route::post('sendWork','Admin\WorkController@sendWork')->name('sendWork');

	// 图库填充
	Route::get('galleryList','Admin\GalleryController@galleryList')->name('galleryList');
	Route::post('sendInfo','Admin\GalleryController@sendInfo')->name('sendInfo');
	// 删除图库
	Route::get('destroyG/{gallery}', 'Admin\GalleryController@destroyGallery')->name('destroyGallery');

});
