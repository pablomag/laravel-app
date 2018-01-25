<?php

Route::auth();

Route::get('/', function ()
{
    return view('layouts.index');
});

Route::get('/errors/500', function()
{
	return view('errors.500');
});

Route::group(['middleware' => 'admin.rights'], function()
{
	Route::get('/admin', function()
	{
		return view('admin.index');
	});

	Route::resource('admin/users', 'AdminUsersController');

	Route::resource('admin/posts', 'AdminPostsController');
});
