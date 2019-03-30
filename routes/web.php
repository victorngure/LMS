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
// Authentication Routes...
Route::get('login', [
    'as' => 'login',
    'uses' => 'Auth\LoginController@showLoginForm'
  ]);
  Route::post('login', [
    'as' => '',
    'uses' => 'Auth\LoginController@login'
  ]);

  Route::get('/logout', 'Auth\LoginController@logout')->name('logout' );

  
  // Password Reset Routes...
  Route::post('password/email', [
    'as' => 'password.email',
    'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail'
  ]);
  Route::get('password/reset', [
    'as' => 'password.request',
    'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm'
  ]);
  Route::post('password/reset', [
    'as' => 'password.update',
    'uses' => 'Auth\ResetPasswordController@reset'
  ]);
  Route::get('password/reset/{token}', [
    'as' => 'password.reset',
    'uses' => 'Auth\ResetPasswordController@showResetForm'
  ]);

Route::group( ['middleware' => 'auth' ], function()
{
    Route::get('/', function () {
      return view('dashboard');
    });

    Route::resource('roles', 'RoleController');

    Route::resource('permissions', 'PermissionController');

    Route::resource('users','UserController');

    Route::get('leave/request', 'LeaveController@create')->name('leave.create');

    Route::post('leave/request/store', 'LeaveController@store')->name('leave.store');

    Route::get('leave/approve', 'LeaveController@approve')->name('leave.approve');

    Route::get('leave/requests', 'LeaveController@myRequests')->name('leave.requests');

    Route::put('leave/approve/update', 'LeaveController@updateApproval')->name('update.leave.approval');

    Route::get('leave/{id}/edit', 'LeaveController@edit');

    Route::put('leave/{id}/update', 'LeaveController@update')->name('leave.update');

    Route::put('notifications/update', 'NotificationController@updateNotifications')->name('update_notifications');
});