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
Route::get('/index',[
    'uses' => 'HomeController@index',
    'as' => 'index',

]);


Route::get('/',[
    'uses' => 'HomeController@home',
    'as' => 'home',

]);

Route::match(['get','post'],'/login',[
    'uses' => 'UserController@logIn',
    'as' => 'login'
]);
Route::match(['get'],'/logout',[
    'uses' => 'UserController@logout',
    'as'=>'logout'
]);
Route::match(['get','post'],'/signup',[
    'uses' => 'UserController@signUp',
    'as' => 'signup',

]);

Route::get('/img/{filename}', [
    'uses' => 'HomeController@getImage',
    'as' => 'account.image'
]);
Route::get('/dashboard',[
    'uses' => 'DashboardController@index',
    'as'=>'dashboard',
    'middleware' => 'roles',
    'roles' => ['Admin']

]);


Route::match(['get','post'],'/users',[
    'uses' => 'UserController@index',
    'as'=>'users',
    'middleware' => 'roles',
    'roles' => ['Admin']
]);


Route::match(['get','post'],'/roles',[
    'uses' => 'RoleController@index',
    'middleware' => 'roles',
    'roles' => ['Admin'],
    'as' => 'roles',

]);

Route::post('/roles/change',[
    'uses' => 'RoleController@changeRole',
    'as'=>'roles.change',
    'middleware' => 'roles',
    'roles' => ['Admin']
]);
Route::match(['get','post'],'/roles/create',[
    'uses' => 'RoleController@createRole',
    'middleware' => 'roles',
    'roles' => ['Admin'],
    'as' => 'roles.create',

]);
Route::match(['get','post'],'/roles/delete',[
    'uses' => 'RoleController@deleteRole',
    'as'=>'roles.delete',
    'middleware' => 'roles',
    'roles' => ['Admin']
]);

Route::match(['get','post'],'/permissions',[
    'uses' => 'PermissionController@index',
    'middleware' => 'roles',
    'roles' => ['Admin'],
    'as' => 'permissions',

]);
Route::post('/permissions/change',[
    'uses' => 'PermissionController@changePermission',
    'as'=>'permissions.change',
    'middleware' => 'roles',
    'roles' => ['Admin']
]);
Route::match(['get','post'],'/permissions/create',[
    'uses' => 'PermissionController@createPermission',
    'middleware' => 'roles',
    'roles' => ['Admin'],
    'as' => 'permissions.create',

]);
Route::match(['get','post'],'/permissions/delete',[
    'uses' => 'PermissionController@deletePermission',
    'as'=>'permissions.delete',
    'middleware' => 'roles',
    'roles' => ['Admin']
]);


Route::match(['get','post'],'/services/delete',[
    'uses' => 'ServiceController@deleteService',
    'as'=>'services.delete',
    'middleware' => 'roles',
    'roles' => ['Admin']
]);
Route::match(['get','post'],'/services/create',[
    'uses' => 'ServiceController@createService',
    'as'=>'services.create',
    'middleware' => 'roles',
    'roles' => ['Admin']
]);
Route::match(['get','post'],'/services/{id?}',[
    'uses' => 'ServiceController@index',
    'as'=>'services',
    'middleware' => 'roles',
    'roles' => ['Admin']
]);

Route::match(['get','post'],'/states/delete/{id?}',[
    'uses' => 'StateController@deleteState',
    'as'=>'states.delete',
    'middleware' => 'roles',
    'roles' => ['Admin']
]);
Route::match(['get','post'],'/states/create',[
    'uses' => 'StateController@createState',
    'as'=>'states.create',
    'middleware' => 'roles',
    'roles' => ['Admin']
]);
Route::match(['get','post'],'/states/{id?}',[
    'uses' => 'StateController@index',
    'as'=>'states',
    'middleware' => 'roles',
    'roles' => ['Admin']
]);


Route::match(['get','post'],'/orders/create',[
    'uses' => 'OrderController@createOrder',
    'as'=>'orders.create',
    'middleware' => 'roles',
    'roles' => ['Admin']
]);
Route::match(['get','post'],'/orders/delete',[
    'uses' => 'OrderController@deleteOrder',
    'as'=>'orders.delete',
    'middleware' => 'roles',
    'roles' => ['Admin']
]);
Route::match(['get','post'],'/orders/{id?}',[
    'uses' => 'OrderController@index',
    'as'=>'orders',
    'middleware' => 'roles',
    'roles' => ['Admin']
]);
