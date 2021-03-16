<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
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
Route::get('/', 'App\Http\Controllers\StudentController@index')->name('student.index');
Route::get('/student-create', 'App\Http\Controllers\StudentController@add')->name('student.add');
Route::post('/student-submit', 'App\Http\Controllers\StudentController@store')->name('student.insert');
Route::get('/student/delete/{id}', 'App\Http\Controllers\StudentController@delete')->name('student.delete');
Route::get('/student/edit/{id}', 'App\Http\Controllers\StudentController@edit')->name('student.edit');
Route::post('/student/update/{id}', 'App\Http\Controllers\StudentController@update')->name('student.update');

Route::get('/marklist', 'App\Http\Controllers\StudentMarkListController@index')->name('student.marklist');
Route::get('/student-marklist-create', 'App\Http\Controllers\StudentMarkListController@add')->name('student.addMarkList');
Route::post('/student-submit-marklist', 'App\Http\Controllers\StudentMarkListController@store')->name('student.insert.marklist');
Route::get('/student-marklist/delete/{id}', 'App\Http\Controllers\StudentMarkListController@delete')->name('student.marklist.delete');
Route::get('/student-marklist/edit/{id}', 'App\Http\Controllers\StudentMarkListController@edit')->name('student.marklist.edit');
Route::post('/student-marklist/update/{id}', 'App\Http\Controllers\StudentMarkListController@update')->name('student.marklist.update');