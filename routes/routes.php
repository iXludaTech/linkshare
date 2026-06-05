<?php
/**
 * Your application routes go here.
 */
use Legato\Framework\Routing\Route;

Route::get('/', 'App\Controllers\IndexController@show');

Route::get('/register', 'App\Controllers\AuthController@showSignUpForm', 'register_form');
Route::post('/register', 'App\Controllers\AuthController@signup', 'register');

Route::get('/login', 'App\Controllers\AuthController@showLoginForm', 'login_form');
Route::post('/login', 'App\Controllers\AuthController@login', 'login');

Route::get('/auth/activation/[*:code]', 'App\Controllers\AuthController@activate', 'activation_code');

Route::get('/logout', 'App\Controllers\AuthController@logout', 'logout');

Route::get('/links', 'App\Controllers\LinkController@index', 'link_index');
Route::get('/links/create', 'App\Controllers\LinkController@create', 'link_create');
Route::post('/links', 'App\Controllers\LinkController@store', 'link_store');
Route::get('/links/[*:id]', 'App\Controllers\LinkController@show', 'link_show');
Route::get('/subchannels', 'App\Controllers\LinkController@subChannels', 'subchannels');

Route::group('/admin', function () {
    Route::add('GET', '/channel', 'App\Controllers\ChannelController@show');
    Route::add('POST', '/channel', 'App\Controllers\ChannelController@save');

    Route::add('GET', '/subchannel', 'App\Controllers\SubChannelController@show');
    Route::add('POST', '/subchannel', 'App\Controllers\SubChannelController@save');

    Route::add('GET', '/links', 'App\Controllers\LinkModerationController@index');
    Route::add('GET', '/links/[*:id]/approve', 'App\Controllers\LinkModerationController@approve');
    Route::add('GET', '/links/[*:id]/delete', 'App\Controllers\LinkModerationController@destroy');
});
