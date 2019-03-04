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

Route::get('/', 'DashboardController@index')->name('dashboard');
Route::get('/roles', 'UserRolesController@index')->name('roles');
Route::get('/roles/edit/{id}', 'UserRolesController@edit')->name('rolesEdit');
Route::post('/roles/edit', 'UserRolesController@editRole')->name('rolesEditSubmit');
Route::post('/roles/delete', 'UserRolesController@destroy')->name('rolesDelete');
Route::get('/role/create', 'UserRolesController@create')->name('roleCreate');
Route::post('/role/create', 'UserRolesController@createRole')->name('roleCreateSubmit');

Route::get('/users', 'UserController@index')->name('users');
Route::get('/users/create', 'UserController@create')->name('userCreate');
Route::post('/users/create', 'UserController@store')->name('usersCreateSubmit');
Route::get('users/edit/{id}','UserController@edit')->name('userEditForm');
Route::post('users/edit','UserController@editSubmit')->name('userEditForm');
Route::post('/users/delete', 'UserController@destroy')->name('rolesDelete');


Route::get('/mainCategory/', 'MainCategoryController@index')->name('mainCategory');
Route::get('/mainCategory/create', 'MainCategoryController@create')->name('mainCategoryCreate');
Route::post('/mainCategory/create', 'MainCategoryController@store')->name('mainCategoryCreatePost');
Route::get('mainCategory/edit/{id}','MainCategoryController@edit')->name('mainCategoryEdit');
Route::post('/mainCategory/edit','MainCategoryController@editSubmit')->name('mainCategoryEditSubmit');
Route::post('/mainCategory/delete','MainCategoryController@destroy')->name('mainCategoryDelete');


Route::get('/subCategory/', 'SubCategoryController@index')->name('subCategory');
Route::get('/subCategory/create', 'SubCategoryController@create')->name('subCategoryCreate');
Route::post('/subCategory/create', 'SubCategoryController@store')->name('subCategoryCreateSubmit');
Route::get('subCategory/edit/{id}','SubCategoryController@edit')->name('subCategoryEdit');
Route::post('/subCategory/edit','SubCategoryController@editSubmit')->name('subCategoryEditSubmit');
Route::post('/subCategory/delete','SubCategoryController@destroy')->name('subCategoryDelete');

Route::get('/items/create', 'ItemsController@create')->name('itemsCreate');
Route::get('/items', 'ItemsController@index')->name('manageItems');
Route::post('/createItems/create', 'ItemsController@store')->name('itemsCreateSubmit');
Route::post('/manageItem/submit', 'ItemsController@manageItems')->name('submitMainCat');
Route::post('/manageItem/items','ItemsController@getItems')->name('getItems');
Route::get('/items/edit/{id}', 'ItemsController@edit')->name('itemsedit');
Route::post('/items/editItem/', 'ItemsController@editItemUbmit')->name('editItemUbmit');


Route::get('/newInventoryType','NewInventoryController@index')->name('newInventory');
Route::post('/newInventoryType/getFiltersPlants','NewInventoryController@getFilters')->name('GetFilterPlants');
Route::post('/newInventoryType/findInventory','NewInventoryController@findInventory')->name('findInventory');
Route::post('/newInventoryType/updateInventory','NewInventoryController@updateInventory')->name('updateInventory');
Route::get('/inventoryLogin','NewInventoryController@inventoryLogin')->name('inventoryLogin');
Route::get('/createNewPermission','NewInventoryController@createNewPermission')->name('createNewPermission');
Route::post('/submitPermission','NewInventoryController@submitPermission')->name('submitPermission');
Route::get('/newInventoryType/plant','NewInventoryController@plant')->name('Get');

Route::get('/search', 'summeryController@index')->name('advanceSearch');







Auth::routes();

// Deafult route
//Route::get('/home', 'HomeController@index')->name('home');
