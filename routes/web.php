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
            Route::get('activity/create/{contact?}', ['as'=>'activity.create', 'uses'=>'ActivitiesController@create']);
            Route::resource('/account', 'AccountsController')->except('create');
            // Activities
            Route::resource('/activity', 'ActivitiesController');
            //Activity Types
            Route::resource('/activitytype', 'ActivityTypesController');        
            // Contacts
            Route::get('/addactivity/{contact}', ['as' => 'contact.activity', 'uses' => 'ActivitiesController@contactActivity']);

            Route::resource('/contact', 'ContactsController');
            // Opportunities
            Route::get('opportunity/create/{account?}', ['as'=>'opportunity.create', 'uses'=>'OpportunitiesController@create']);
            Route::resource('/opportunity', 'OpportunitiesController');
            // Imports
            
            Route::post('import/mapping/{import}', ['as'=>'import.mapping', 'uses'=>'ImportController@mapping']);
            Route::resource('/import', 'ImportController');
            //Route::get('/import', ['as'=>'account.import.create', 'uses'=>'AccountsController@importForm']);
            //Route::post('/import', ['as'=>'account.import.store', 'uses'=>'AccountsController@import']); 
        }
    );
