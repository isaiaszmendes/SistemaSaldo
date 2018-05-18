<?php

$this->group(['middleware' => ['auth'], 'namespace' => 'Admin', 'prefix' => 'admin'], function ()
{

	$this->post('balance/transfer', 'BalanceController@transferStore')->name('transfer.store');

	$this->post('balance/confirm-transfer', 'BalanceController@confirmTransfer')->name('confirm.transfer');
	$this->get('balance/transfer', 'BalanceController@transfer')->name('balance.transfer');

	$this->post('balance/withdraw', 'BalanceController@withdrawStore')->name('withdraw.store');
	$this->get('balance/withdraw', 'BalanceController@withdraw')->name('balance.withdraw');

	$this->post('balance/deposit', 'BalanceController@depositStore')->name('deposit.store');
	$this->get('balance/deposit', 'BalanceController@deposit')->name('admin.deposit');
	$this->get('balance', 'BalanceController@index')->name('admin.balance');
	
	$this->get('/', 'AdminController@index')->name('admin.home');
});


$this->get('/', 'Site\SiteController@index')->name('home');

Auth::routes();

// Route::get('/homgit e', 'HomeController@index')->name('home');
