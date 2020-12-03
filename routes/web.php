<?php

use Illuminate\Support\Facades\Route;

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

// Auth::routes(['register' => false]);

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia\Inertia::render('Dashboard');
})->name('dashboard');

// Route::get('accounts', [AccountsController::class, 'index']);

// Route::get('/accounts', [AccountsController::class, 'index'])->name('accounts');

Route::resource('/account','AccountsController');
// Route::post('/account/add','AccountsController@store');
Route::get('/addactivity/{contact}', ['as' => 'contact.activity', 'uses' => 'ActivityController@contactActivity']);
Route::resource('/contact','ContactsController');

Route::resource('/activity','ActivityController');
Route::resource('/activitytype','ActivityTypeController');

Route::get('/import','AccountsController@importForm');
Route::post('/import','AccountsController@import');
// Route::get('/accounts/{accounts}/edit', 'AccountsController@edit');
// Route::post('/update','AccountsController@update');
// Route::post('/destroy','AccountsController@destroy');

// Route::get('import-form', 'AccountsController@importForm');
