<?php

$this->group(['middleware' => ['auth'], 'namespace' => 'Admin'], function (){
	$this->get('admin', 'AdminController@index')->name('admin.home');

});


$this->get('/', 'Site\SiteController@index')->name('admin');

Auth::routes();

// Route::get('/homgit e', 'HomeController@index')->name('home');
