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

Route::get('/', 'IndexController');
Route::post('/ticket/new', 'Ticket\AddHandlerController');
Route::get('/ticket/{ticket_id}', 'Ticket\IndexController');
Route::post('/ticket/msg/new', 'Ticket\IndexController');
