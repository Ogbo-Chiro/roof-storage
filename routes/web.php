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


Auth::routes(['verify' => true]);

Route::group(['middleware' => ['auth']], function(){
Route::get('get/{files}', 'RoofController@getFile')->name('getfile');
Route::name('roofs_path')->get('/home', 'RoofController@index');
Route::name('store_roof_path')->post('/home', 'RoofController@store');
Route::name('deletefile')->get('{fileToDelete}', 'RoofController@deleteFile');

Route::name('restore')->get('bin/trash/{fileToRestore}', 'RoofController@restoreFile');
Route::name('delete_file_permanently')->get('get/bin/trash/{fileToRemove}', 'RoofController@removeFile');
});
//route to files not deleted
Route::name('index')->get('/home', 'RoofController@index')->middleware('verified');
//route to files deleted
Route::name('bin')->get('bin/trash', 'RoofController@trash')->middleware('verified');
