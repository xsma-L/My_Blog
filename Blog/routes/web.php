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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

    Route::get('/home', 'HomeController@index')->name('home');
    
    Route::get('/inscription', function () {
        return view('auth/register');
    });

    Route::get('/connexion', function () {
    return view('auth/login');
});


Route::get('/billet/new', 'BilletController@nouveau')->middleware('blocked')->name('publication_billet');

Route::post('/billet/done', 'BilletController@poste')->middleware('blocked')->name('publication');

Route::get('/billet/show', 'BilletController@show')->middleware('blocked')->name('show_billets');

Route::get('/billet/{id}/edit', 'BilletController@update_form')->middleware('blocked')->name('update_billets');

Route::post('/billet/update/done', 'BilletController@add_update')->middleware('blocked')->name('update_done');

Route::get('/billet/{id}/delete/{user_id}', 'BilletController@delete_post')->middleware('blocked')->name('delete_billets');

Route::get('/billet/{id}', 'BilletController@comment_post')->middleware('blocked')->name('comment_billets');

Route::post('/comment/update/done', 'BilletController@add_comment')->middleware('blocked')->name('comment_done');

Route::get('admin/users', 'BilletController@admin_show')->middleware('admin')->name('admin_user');

Route::post('admin/users/blocked', 'BilletController@blocked_user')->middleware('admin')->name('block');

Route::post('admin/users/unlocked', 'BilletController@unlocked_user')->middleware('admin')->name('unlock');

Route::get('admin/billets', 'BilletController@last_billets_show')->middleware('admin')->name('admin_billets');

Route::post('admin/billets/delet', 'BilletController@delete_billet')->middleware('admin')->name('admin_delete_billet');

Route::get('admin/comments', 'BilletController@last_comments_show')->middleware('admin')->name('admin_comments');

Route::post('admin/comment/delet', 'BilletController@delete_comment')->middleware('admin')->name('admin_delete_comment');