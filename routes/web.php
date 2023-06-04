<?php

$this->group(['middleware' => ['auth'], 'namespace' => 'Admin', 'prefix' => 'admin'], function(){

    /*
// all router cc-geradas
    $this->get('GATE1', 'AdminController@gate1')->name('admin.geradas.gate1');
    $this->get('GATE2', 'AdminController@gate2')->name('admin.geradas.gate2');
	 $this->get('api', 'AdminController@api')->name('admin.geradas.api'); //api 
	  $this->get('api11', 'AdminController@api11')->name('admin.geradas.api11'); //api
// 
*/

//Full
$this->get('GATEF1', 'AdminController@gateway_full_index1')->name('admin.full.index1');
$this->get('APIF1', 'AdminController@gateway_full_api1')->name('admin.full.api1');

$this->get('GATEF2', 'AdminController@gateway_full_index2')->name('admin.full.index2');
$this->get('APIF2', 'AdminController@gateway_full_api2')->name('admin.full.api2');






//Lojas

$this->get('americanas', 'AdminController@americanas_index')->name('admin.americanas.index');
$this->get('americanas_api', 'AdminController@americanas_api')->name('admin.americanas.api');

$this->get('shoptime', 'AdminController@shoptime_index')->name('admin.shoptime.index');
$this->get('shoptime_api', 'AdminController@shoptime_api')->name('admin.shoptime.api');

$this->get('magazine', 'AdminController@magazine_index')->name('admin.magazine.index');
$this->get('magazine_api', 'AdminController@magazine_api')->name('admin.magazine.api');

$this->get('netshoes', 'AdminController@netshoes_index')->name('admin.netshoes.index');
$this->get('netshoes_api', 'AdminController@netshoes_api')->name('admin.netshoes.api');

$this->get('centauro', 'AdminController@centauro_index')->name('admin.centauro.index');
$this->get('centauro_api', 'AdminController@centauro_api')->name('admin.centauro.api');

$this->get('nike', 'AdminController@nike_index')->name('admin.nike.index');
$this->get('nike_api', 'AdminController@nike_api')->name('admin.nike.api');

$this->get('submarino', 'AdminController@submarino_index')->name('admin.submarino.index');
$this->get('submarino_api', 'AdminController@submarino_api')->name('admin.submarino.api');

$this->get('kabum', 'AdminController@kabum_index')->name('admin.kabum.index');
$this->get('kabum_api', 'AdminController@kabum_api')->name('admin.kabum.api');

$this->get('netflix', 'AdminController@netflix_index')->name('admin.netflix.index');
$this->get('netflix_api', 'AdminController@netflix_api')->name('admin.netflix.api');

$this->get('spotify', 'AdminController@spotify_index')->name('admin.spotify.index');
$this->get('spotify_api', 'AdminController@spotify_api')->name('admin.spotify.api');


//Saldos

$this->get('pagseguro', 'AdminController@pagseguro_index')->name('admin.pagseguro.index');
$this->get('pagseguro_api', 'AdminController@pagseguro_api')->name('admin.pagseguro.api');










$this->post('withdraw', 'BalanceController@withdrawStore')->name('withdraw.store');
$this->get('withdraw', 'BalanceController@withdraw')->name('balance.withdraw');

$this->post('deposit', 'BalanceController@depositStore')->name('deposit.store'); //Depositar post
$this->get('deposit', 'BalanceController@deposit')->name('balance.deposit'); //Depositar get
$this->get('/', 'BalanceController@index')->name('admin.home'); //Saldo página inicial

//

   /* $this->any('historic-search', 'BalanceController@searchHistoric')->name('historic.search');
    $this->get('historic', 'BalanceController@historic')->name('admin.historic');

    $this->post('transfer', 'BalanceController@transferStore')->name('transfer.store');
    $this->post('confirm-transfer', 'BalanceController@confirmTransfer')->name('confirm.transfer');
    $this->get('transfer', 'BalanceController@transfer')->name('balance.transfer');

    $this->post('withdraw', 'BalanceController@withdrawStore')->name('withdraw.store');
    $this->get('withdraw', 'BalanceController@withdraw')->name('balance.withdraw');

    $this->post('deposit', 'BalanceController@depositStore')->name('deposit.store');
    $this->get('deposit', 'BalanceController@deposit')->name('balance.deposit');
    $this->get('balance', 'BalanceController@index')->name('admin.balance');
    $this->get('/', 'AdminController@index')->name('admin.home');*/

    
});

$this->post('atualizar-perfil', 'Admin\UserController@profileUpdate')->name('profile.update')->middleware('auth');
$this->get('meu-perfil', 'Admin\UserController@profile')->name('profile')->middleware('auth');

$this->get('/', 'Site\SiteController@index')->name('home');


Auth::routes();
