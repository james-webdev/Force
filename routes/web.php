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

Route::get(
    '/', function () {
        return view('welcome');
    }
);
Route::middleware(['auth:sanctum', 'verified'])
    ->group(
        function () { 
            Route::get(
                '/dashboard', function () {
                    return Inertia\Inertia::render('Dashboard');
                }
            )->name('dashboard');
            // Accounts
            Route::resource('/account', 'AccountsController');
            // Activities
            Route::resource('/activity', 'ActivityController');
            //Activity Types
            Route::resource('/activitytype', 'ActivityTypeController');        
            // Contacts
            Route::get('/addactivity/{contact}', ['as' => 'contact.activity', 'uses' => 'ActivityController@contactActivity']);
            Route::resource('/contact', 'ContactsController');
            // Opportunities
            Route::get('opportunity/create/{account?}', ['as'=>'opportunity.create', 'uses'=>'OpportunityController@create']);
            Route::resource('/opportunity', 'OpportunityController');
            // Imports
            Route::get('/import', ['as'=>'account.import.create', 'uses'=>'AccountsController@importForm']);
            Route::post('/import', ['as'=>'account.import.store', 'uses'=>'AccountsController@import']); 
        }
    );
