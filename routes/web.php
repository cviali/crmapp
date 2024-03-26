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
Route::get('/admin', 'AdminController@index');
Route::get('/agent', 'AgentController@index');
Route::get('/agent-list', 'AgentListController@index')->name('agent-list');
Route::get('/agent-detail/{id}', 'AgentDetailController@index');
Route::get('/database-list', 'DatabaseListController@index');
Route::get('/database-detail/{source}', 'DatabaseDetailController@index');
Route::get('/import-excel', 'ExcelImportController@index')->name('import.excel');
Route::get('/export-excel/{name}', 'DatabaseDetailController@export');

Route::post('/add-customer', 'AdminController@addCustomer')->name('add-customer');
Route::post('/start-contact', 'CustomerController@startContact')->name('start-contact');
Route::post('/update-contact', 'CustomerController@updateContact')->name('update-contact');
Route::post('/agent-password', 'AgentDetailController@password')->name('agent-password');
Route::post('/agent-delete/{id}', 'AgentDetailController@delete')->name('agent-delete');
Route::post('/import-excel', 'ExcelImportController@import');
