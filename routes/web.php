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
    return view('auth.login');
});

Auth::routes([
    'reset' => false,
    'verify' => false,
    'forgot' => false,
]);

Route::get('/home', 'HomeController@index');
Route::get('/admin', 'AdminController@index')->name('admin-home');
Route::get('/agent', 'AgentController@index');
Route::get('/whitelist', 'WhitelistController@index')->name('whitelist');
Route::get('/agent-list', 'AgentListController@index')->name('agent-list');
Route::get('/agent-detail/{id}', 'AgentDetailController@index');
Route::get('/database-list', 'DatabaseListController@index')->name('database-list');
Route::get('/database-detail/{source}', 'DatabaseDetailController@index');
Route::get('/import-excel', 'ExcelImportController@index')->name('import.excel');
Route::get('/export-excel/{name}', 'DatabaseDetailController@export');
Route::get('/whitelist-delete/{ip}', 'WhitelistController@delete')->name('whitelist-delete');

Route::post('/add-customer', 'AdminController@addCustomer')->name('add-customer');
Route::post('/start-contact', 'CustomerController@startContact')->name('start-contact');
Route::post('/update-contact', 'CustomerController@updateContact')->name('update-contact');
Route::post('/agent-password', 'AgentDetailController@password')->name('agent-password');
Route::post('/admin-password', 'AdminController@password')->name('admin-password');
Route::post('/agent-filter', 'AgentDetailController@filter')->name('agent-filter');
Route::post('/agent-delete', 'AgentDetailController@delete')->name('agent-delete');
Route::post('/database-delete', 'DatabaseDetailController@delete')->name('database-delete');
Route::post('/whitelist-add', 'WhitelistController@add')->name('whitelist-add');
Route::post('/import-excel', 'ExcelImportController@import');
