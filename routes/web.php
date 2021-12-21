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

Route::get('/','FrontController@index')->name('home');

Route::get('/about-us','FrontController@aboutUs')->name('about');
Route::get('/contact-us','FrontController@contactUs')->name('contact');
Route::get('/videos','FrontController@videos')->name('videos');
Route::get('/galleries','FrontController@gallery')->name('gallery');
Route::get('/gallerie/{id}','FrontController@galleryDetail')->name('gallery.detail');
Route::post('/message','FrontController@message')->name('message');

Route::get('/downloads','FrontController@downloads')->name('download');

Route::get('/page/{id}','FrontController@dynamicPage')->name('page');


Route::prefix('news')->name('news.')->group(function () {
     Route::get('/','NewsEventController@newsList')->name('list');
     Route::get('/{id}/','NewsEventController@singleNews')->name('single');
});

Route::prefix('event')->name('event.')->group(function () {
    Route::get('/','NewsEventController@eventList')->name('list');
    Route::get('/{id}/','NewsEventController@singleEvent')->name('single');
});

Route::prefix('members')->name('member.')->group(function () {
    Route::get('/','MemberController@memberList')->name('list');
    Route::get('/board','MemberController@boardMember')->name('board');
    Route::get('/detail/{id}','MemberController@singleMember')->name('single');
});


Route::match(['get', 'post'], 'login', 'AuthController@login')->name('login');
Route::match(['get', 'post'], 'logout', 'AuthController@logout')->name('logout');

Route::prefix('admin')->name('admin.')->middleware('role:admin')->group(function () {
    Route::get('/','AuthController@dashboard')->name('dashboard');
    Route::get('/config','ConfigController@index')->name('config');
    Route::post('/config/store','ConfigController@store')->name('configs.store');
    Route::post('/change-pass','AuthController@changePass')->name('password.change');
    Route::get('/client-message','AuthController@message')->name('client.message');


    Route::prefix('news')->name('news.')->group(function () {
        Route::get('/','Admin\NewsController@index')->name('index');
        Route::get('/add/','Admin\NewsController@create')->name('create');
        Route::post('/store','Admin\NewsController@store')->name('store');
        Route::get('/edit/{id}/','Admin\NewsController@edit')->name('edit');
        Route::post('/update/{id}','Admin\NewsController@update')->name('update');
        Route::get('/del/{id}/','Admin\NewsController@delete')->name('delete');
    });

    Route::prefix('notice')->name('notice.')->group(function () {
        Route::get('/','Admin\NoticeController@index')->name('index');
        Route::get('/add/','Admin\NoticeController@create')->name('create');
        Route::post('/store','Admin\NoticeController@store')->name('store');
        Route::get('/edit/{id}/','Admin\NoticeController@edit')->name('edit');
        Route::post('/update/{id}','Admin\NoticeController@update')->name('update');
        Route::get('/del/{id}/','Admin\NoticeController@delete')->name('delete');
    });

    Route::prefix('event')->name('event.')->group(function () {
        Route::get('/','Admin\EventController@index')->name('index');
        Route::get('/add/','Admin\EventController@create')->name('create');
        Route::post('/store','Admin\EventController@store')->name('store');
        Route::get('/edit/{id}/','Admin\EventController@edit')->name('edit');
        Route::post('/update/{id}','Admin\EventController@update')->name('update');
        Route::get('/del/{id}/','Admin\EventController@delete')->name('delete');
    });

    Route::prefix('member')->name('member.')->group(function () {
        Route::get('/','Admin\MemberController@index')->name('index');
        Route::get('/add/','Admin\MemberController@create')->name('create');
        Route::post('/store','Admin\MemberController@store')->name('store');
        Route::get('/edit/{id}/','Admin\MemberController@edit')->name('edit');
        Route::post('/update/{id}','Admin\MemberController@update')->name('update');
        Route::get('/del/{id}/','Admin\MemberController@delete')->name('delete');
    });

    Route::prefix('other-member')->name('other.member.')->group(function () {
        Route::get('/','Admin\OtherMemberController@index')->name('index');
        Route::get('/add/','Admin\OtherMemberController@create')->name('create');
        Route::post('/store','Admin\OtherMemberController@store')->name('store');
        Route::get('/edit/{id}/','Admin\OtherMemberController@edit')->name('edit');
        Route::post('/update/{id}','Admin\OtherMemberController@update')->name('update');
        Route::get('/del/{id}/','Admin\OtherMemberController@delete')->name('delete');
    });

    Route::prefix('board')->name('board.')->group(function () {
        Route::get('/','Admin\BoardMemberController@index')->name('index');
        Route::get('/add/','Admin\BoardMemberController@create')->name('create');
        Route::post('/store','Admin\BoardMemberController@store')->name('store');
        Route::get('/edit/{id}/','Admin\BoardMemberController@edit')->name('edit');
        Route::post('/update/{id}','Admin\BoardMemberController@update')->name('update');
        Route::get('/del/{id}/','Admin\BoardMemberController@delete')->name('delete');
        Route::get('/manage/{id}/','Admin\BoardMemberController@manage')->name('manage');
        Route::post('/manage/member/add/','Admin\BoardMemberController@manageMember')->name('manage.member');
        Route::post('/manage/member/edit/','Admin\BoardMemberController@manageMemberedit')->name('manage.member.edit');
        Route::post('/manage/member/del/','Admin\BoardMemberController@manageMemberDel')->name('manage.member.del');
    });

    Route::prefix('menu')->name('menu.')->group(function () {
        Route::get('/','Admin\MenuController@index')->name('index');
        Route::get('/add/','Admin\MenuController@create')->name('create');
        Route::post('/store','Admin\MenuController@store')->name('store');
        Route::get('/del/{id}/','Admin\MenuController@delete')->name('delete');
        Route::get('/manage/{id}/','Admin\MenuController@manage')->name('manage');
        Route::post('/manage/update/{id}','Admin\MenuController@manageUpdate')->name('manage.update');
    });

    Route::prefix('gallery')->name('gallery.')->group(function () {
        Route::get('/','Admin\GalleryController@index')->name('index');
        Route::post('/store','Admin\GalleryController@store')->name('store');
        Route::post('/update/','Admin\GalleryController@update')->name('update');
        Route::post('/del/','Admin\GalleryController@delete')->name('delete');
        Route::get('/manage/{id}/','Admin\GalleryController@manage')->name('manage');
        Route::post('/image/','Admin\GalleryController@imageStore')->name('img.store');
        Route::post('/image/del/','Admin\GalleryController@imageDelete')->name('img.delete');

    });

    Route::prefix('advertise')->name('advertise.')->group(function () {
        Route::get('/','Admin\AdvController@index')->name('index');
        Route::get('/add/','Admin\AdvController@create')->name('create');
        Route::post('/store','Admin\AdvController@store')->name('store');
        Route::get('/edit/{id}/','Admin\AdvController@edit')->name('edit');
        Route::post('/update/{id}','Admin\AdvController@update')->name('update');
        Route::get('/del/{id}/','Admin\AdvController@delete')->name('delete');
    });

    Route::prefix('patner')->name('patner.')->group(function () {
        Route::get('/','Admin\PatnerController@index')->name('index');
        Route::get('/add/','Admin\PatnerController@create')->name('create');
        Route::post('/store','Admin\PatnerController@store')->name('store');
        Route::get('/edit/{id}/','Admin\PatnerController@edit')->name('edit');
        Route::post('/update/{id}','Admin\PatnerController@update')->name('update');
        Route::get('/del/{id}/','Admin\PatnerController@delete')->name('delete');
    });


    Route::prefix('video')->name('video.')->group(function () {
        Route::get('/','Admin\VideoController@index')->name('index');
        Route::get('/add/','Admin\VideoController@create')->name('create');
        Route::post('/store','Admin\VideoController@store')->name('store');
        Route::get('/edit/{id}/','Admin\VideoController@edit')->name('edit');
        Route::post('/update/{id}','Admin\VideoController@update')->name('update');
        Route::get('/del/{id}/','Admin\VideoController@delete')->name('delete');
    });


    Route::prefix('download')->name('download.')->group(function () {
        Route::get('/','Admin\DownloadController@index')->name('index');
        Route::get('/add/','Admin\DownloadController@create')->name('create');
        Route::post('/store','Admin\DownloadController@store')->name('store');
        Route::get('/edit/{id}/','Admin\DownloadController@edit')->name('edit');
        Route::post('/update/{id}','Admin\DownloadController@update')->name('update');
        Route::get('/del/{id}/','Admin\DownloadController@delete')->name('delete');
    });

    Route::prefix('activity')->name('activity.')->group(function () {
        Route::get('/','Admin\ActivityController@index')->name('index');
        Route::get('/add/','Admin\ActivityController@create')->name('create');
        Route::post('/store','Admin\ActivityController@store')->name('store');
        Route::get('/edit/{id}/','Admin\ActivityController@edit')->name('edit');
        Route::post('/update/{id}','Admin\ActivityController@update')->name('update');
        Route::get('/del/{id}/','Admin\ActivityController@delete')->name('delete');
    });

    Route::prefix('elibrary')->name('elibrary.')->group(function () {
        Route::post('/store','Admin\ElibraryController@store')->name('store');
        Route::get('/del/{id}/','Admin\ElibraryController@delete')->name('delete');
    });

    Route::prefix('leadership')->name('leadership.')->group(function () {
        Route::post('/store','Admin\LeadershipController@store')->name('store');
        Route::get('/del/{id}/','Admin\LeadershipController@delete')->name('delete');
    });

    Route::prefix('user')->name('user.')->group(function () {
        Route::get('/','AuthController@userList')->name('index');
        Route::post('/store','AuthController@newUserStore')->name('store');
        Route::get('/del/{id}/','AuthController@userDelete')->name('delete');
    });


});



