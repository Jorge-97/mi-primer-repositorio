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

Route::get('/', function () {
    return view('welcome');
});


/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::prefix('admin-users')->name('admin-users/')->group(static function() {
            Route::get('/',                                             'AdminUsersController@index')->name('index');
            Route::get('/create',                                       'AdminUsersController@create')->name('create');
            Route::post('/',                                            'AdminUsersController@store')->name('store');
            Route::get('/{adminUser}/impersonal-login',                 'AdminUsersController@impersonalLogin')->name('impersonal-login');
            Route::get('/{adminUser}/edit',                             'AdminUsersController@edit')->name('edit');
            Route::post('/{adminUser}',                                 'AdminUsersController@update')->name('update');
            Route::delete('/{adminUser}',                               'AdminUsersController@destroy')->name('destroy');
            Route::get('/{adminUser}/resend-activation',                'AdminUsersController@resendActivationEmail')->name('resendActivationEmail');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::get('/profile',                                      'ProfileController@editProfile')->name('edit-profile');
        Route::post('/profile',                                     'ProfileController@updateProfile')->name('update-profile');
        Route::get('/password',                                     'ProfileController@editPassword')->name('edit-password');
        Route::post('/password',                                    'ProfileController@updatePassword')->name('update-password');
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::prefix('alumnos')->name('alumnos/')->group(static function() {
            Route::get('/',                                             'AlumnosController@index')->name('index');
            Route::get('/create',                                       'AlumnosController@create')->name('create');
            Route::post('/',                                            'AlumnosController@store')->name('store');
            Route::get('/{alumno}/edit',                                'AlumnosController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'AlumnosController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{alumno}',                                    'AlumnosController@update')->name('update');
            Route::delete('/{alumno}',                                  'AlumnosController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::prefix('craftableproyectos')->name('craftableproyectos/')->group(static function() {
            Route::get('/',                                             'CraftableproyectoController@index')->name('index');
            Route::get('/create',                                       'CraftableproyectoController@create')->name('create');
            Route::post('/',                                            'CraftableproyectoController@store')->name('store');
            Route::get('/{craftableproyecto}/edit',                     'CraftableproyectoController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'CraftableproyectoController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{craftableproyecto}',                         'CraftableproyectoController@update')->name('update');
            Route::delete('/{craftableproyecto}',                       'CraftableproyectoController@destroy')->name('destroy');
        });
    });
});