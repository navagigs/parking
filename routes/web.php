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


Route::get('/', 'WebsiteController@index')->name('website.home');
// Route::get('/panel', 'PanelController@index')->name('admin.login');
// Route::get('/panel/home', 'PanelController@home')->name('admin.home');

Route::get('location', 'WebsiteController@location')->name('website.location');
Route::get('location/category/{id}/{name}', 'WebsiteController@location')->name('website.location.category');
Route::get('location/detail/{id}-{title}', 'WebsiteController@location_detail')->name('website.location.detail');
Route::post('/booking','WebsiteController@booking')->name('website.booking');
Route::get('news', 'WebsiteController@news')->name('website.news');
Route::get('news/d/{id}-{title}', 'WebsiteController@news_detail')->name('website.news.detail');
// Route::get('get-curl', 'CurlController@getCURL');
// Route::get('get-login', 'CurlController@view_login');
// Route::post('cek-login', 'CurlController@cek_login');
// Route::get('ocr', 'CurlController@ocr');


/* PAGE ADMINISTRATOR  */	
Route::get('/internal', 'Auth\AdminLoginController@showLoginForm')->name('internal.login');
Route::post('/internal', 'Auth\AdminLoginController@login')->name('internal.login.submit');
Route::get('/internal/logout', 'Auth\AdminLoginController@logout')->name('internal.logout');
Route::group(['middleware' => 'auth:admin', 'disablepreventback'], function() {	
	Route::get('/internal/dashboard','InternalController@index')->name('internal.dashboard');
	Route::get('/internal/partner','PartnerController@index')->name('internal.partner');
	Route::get('/internal/partner/create','PartnerController@create')->name('internal.partner.create');
	Route::post('/internal/partner/create_submit','PartnerController@create_submit')->name('internal.partner.create_submit');
	Route::get('/internal/partner/{id}/update','PartnerController@update')->name('internal.partner.update');
	Route::post('/internal/partner/{id}/update_submit','PartnerController@update_submit')->name('internal.partner.update_submit');
	Route::get('/internal/partner/{id}/status','PartnerController@status')->name('internal.partner.status');
	Route::get('/internal/partner/{id}/verified','PartnerController@verified')->name('internal.partner.verified');
	Route::get('/internal/partner/{id}/delete','PartnerController@delete')->name('internal.partner.delete');
	
	Route::get('/internal/category','CategoryController@index')->name('internal.category');
	Route::get('/internal/category/create','CategoryController@create')->name('internal.category.create');
	Route::post('/internal/category/create_submit','CategoryController@create_submit')->name('internal.category.create_submit');
	Route::get('/internal/category/{id}/update','CategoryController@update')->name('internal.category.update');
	Route::post('/internal/category/{id}/update_submit','CategoryController@update_submit')->name('internal.category.update_submit');
	Route::get('/internal/category/{id}/status','CategoryController@status')->name('internal.category.status');
	Route::get('/internal/category/{id}/delete','CategoryController@delete')->name('internal.category.delete');

	Route::get('/internal/news','NewsController@index')->name('internal.news');
	Route::get('/internal/news/create','NewsController@create')->name('internal.news.create');
	Route::post('/internal/news/create_submit','NewsController@create_submit')->name('internal.news.create_submit');
	Route::get('/internal/news/{id}/update','NewsController@update')->name('internal.news.update');
	Route::post('/internal/news/{id}/update_submit','NewsController@update_submit')->name('internal.news.update_submit');
	Route::get('/internal/news/{id}/status','NewsController@status')->name('internal.news.status');
	Route::get('/internal/news/{id}/delete','NewsController@delete')->name('internal.news.delete');
	
	Route::get('/internal/floor/{id}/view','FloorController@index')->name('internal.floor');
	Route::get('/internal/floor/create','FloorController@create')->name('internal.floor.create');
	Route::post('/internal/floor/{id}/create_submit','FloorController@create_submit')->name('internal.floor.create_submit');
	Route::get('/internal/floor/{id}/update','FloorController@update')->name('internal.floor.update');
	Route::post('/internal/floor/{id}/update_submit','FloorController@update_submit')->name('internal.floor.update_submit');
	Route::get('/internal/floor/{id}/status','FloorController@status')->name('internal.floor.status');
	Route::get('/internal/floor/{id}/delete','FloorController@delete')->name('internal.floor.delete');

	Route::get('/internal/block/{id}/view','BlockController@index')->name('internal.block');
	Route::get('/internal/block/create','BlockController@create')->name('internal.block.create');
	Route::post('/internal/block/{id}/create_submit','BlockController@create_submit')->name('internal.block.create_submit');
	Route::get('/internal/block/{id}/update','BlockController@update')->name('internal.block.update');
	Route::post('/internal/block/{id}/update_submit','BlockController@update_submit')->name('internal.block.update_submit');
	Route::get('/internal/block/{id}/status','BlockController@status')->name('internal.block.status');
	Route::get('/internal/block/{id}/delete','BlockController@delete')->name('internal.block.delete');

	Route::get('/internal/media','MediaController@index')->name('internal.media');
	Route::get('/internal/media/create','MediaController@create')->name('internal.media.create');
	Route::post('/internal/media/create_submit','MediaController@create_submit')->name('internal.media.create_submit');
	Route::get('/internal/media/{id}/update','MediaController@update')->name('internal.media.update');
	Route::post('/internal/media/{id}/update_submit','MediaController@update_submit')->name('internal.media.update_submit');
	Route::get('/internal/media/{id}/status','MediaController@status')->name('internal.media.status');
	Route::get('/internal/media/{id}/delete','MediaController@delete')->name('internal.media.delete');

	// Route::get('/internal/category/push','CategoryController@push_data')->name('internal.category');


	Route::get('/internal/setting','SettingController@index')->name('internal.setting');
	Route::post('/internal/setting/{id}/update_identitas','SettingController@update_identitas')->name('internal.setting.update_identitas');

	Route::get('/internal/setting/profile','SettingController@profile')->name('internal.setting.profile');
	Route::post('/internal/setting/profile/{id}/update_profile','SettingController@update_profile')->name('internal.setting.update_profile');


});


/* PAGE MEMBER */	
Route::post('/member', 'Auth\MemberLoginController@login')->name('member.login.submit');
Route::get('/member/logout', 'Auth\MemberLoginController@logout')->name('member.logout');
Route::group(['middleware' => 'auth:member', 'NoCacheMiddleware'], function() {	
	Route::get('/member/dashboard','MemberController@index')->name('member.dashboard');
	Route::get('floor/{id}',array('as'=>'myform.ajax','uses'=>'MemberController@floor'));
	Route::get('/member/account','MemberController@index')->name('member.account');
	Route::get('/member/location','MemberController@index')->name('member.location');
	Route::get('/member/booking/history','MemberController@booking_history')->name('member.booking.history');
	Route::get('/member/booking/in/{partner_id}-{booking_code}','MemberController@booking_in')->name('member.booking.in');
	Route::get('/member/booking/in/{partner_id}-{booking_code}/dijkstra','MemberController@booking_search')->name('member.booking.search');
	Route::get('/member/booking/in/{partner_id}-{booking_code}/block/{end}','MemberController@booking_block')->name('member.booking.block');
	Route::get('/member/booking/in/{partner_id}-{booking_code}/rent/{block_id}-{size}-{user_id}','MemberController@booking_rent')->name('member.booking.rent');
	Route::get('/member/booking/in/{partner_id}-{booking_code}/stay/{block_id}-{size}-{user_id}','MemberController@booking_stay')->name('member.booking.stay');
});
Auth::routes();
