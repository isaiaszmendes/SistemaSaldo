<?php

$this->group(['middleware' => ['auth'], 'namespace' => 'Admin', 'prefix' => 'admin'], function (){

	$this->get('balance', 'BalanceController@index')->name('admin.balance');

	$this->get('balance/deposit', 'BalanceController@deposit')->name('admin.deposit');

	$this->post('balance/deposit', 'BalanceController@depositStore')->name('deposit.store');

	$this->get('/', 'AdminController@index')->name('admin.home');

});


$this->get('/', 'Site\SiteController@index')->name('admin');

Auth::routes();

// Route::get('/homgit e', 'HomeController@index')->name('home');
