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
//admin login page
Route::get('/' , function(){
    return view('auth.login');
});




Route::get('/getData', function(){
    return File::get(public_path() . '/fetchdata.php');
});

//registration


Auth::routes();


//route group

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {


    //user mgt
Route::get('/users',[
    'uses' => 'UsersController@index',
    'as'   => 'users'
]);

Route::get('/user/create',[
    'uses' => 'UsersController@create',
    'as'   => 'users.create'
]);

Route::post('/user/store',[
    'uses' =>'UsersController@store',
    'as'   =>'user.store'
]);


Route::get('/user/restore/{id}',[
    'uses' =>'UsersController@restore',
    'as' =>'user.restore'
]);


Route::get('user/delete/{id}',[
    'uses' =>'UsersController@destroy',
    'as'   =>'user.destroy'
]);

Route::get('/user/edit/{id}',[
    'uses' =>'UsersController@edit',
    'as'   => 'user.edit'
]);


Route::post('/user/update/{id}',[
    'uses' =>'UsersController@update',
    'as'   => 'user.update'
]);


Route::get('user/trashed',[
    'uses' =>'UsersController@trashed',
    'as'   =>'user.trashed'
]);

Route::get('user/kill/{id}',[
    'uses' =>'UsersController@kill',
    'as'   =>'user.kill'
]);


Route::get('/users/admin/{id}',[
    'uses' =>'UsersController@admin',
    'as'  => 'user.admin'
]);

Route::get('/users/notAdmin/{id}',[
    'uses' =>'UsersController@notAdmin',
    'as'  => 'user.notAdmin'
]);

//user profile router


Route::get('/user/profile',[
    'uses' => 'ProfilesController@index',
    'as'   => 'user.profile'
]);


Route::get('/change/password',[
    'uses' => 'ProfilesController@changepassword',
    'as'   => 'changepassword'
]);

Route::post('/user/password/update',[
    'uses'  => 'ProfilesController@passupdate',
    'as'    => 'user.password.update'
   ]);



Route::post('/user/profile/update',[
 'uses'  => 'ProfilesController@update',
 'as'    => 'user.profile.update'
]);


Route::get('/user/profile/show',[
    'uses'  => 'ProfilesController@show',
    'as'    => 'user.profile.show'
   ]);


Route::get('/user/search',[
    'uses' =>'UsersController@search',
    'as' => 'usearch'
]);


//settings routes

Route::get('/application/settings',[
    'uses'=>'SettingsController@index',
    'as'  => 'settings'
]);

Route::post('/application/settings/update',[
    'uses'=>'SettingsController@update',
    'as'  => 'settings.update'
]);









//admin controller
Route::get('/admin', [
    'uses'=> 'DashboardController@index',
    'as' =>'admin.dashboard'
]);




//client Routes
Route::get('/clients',[
    'uses' => 'ClientsController@index',
    'as'   => 'clients'
]);


//clients main

Route::get('/clients/main',[
    'uses' => 'ClientsController@indexmain',
    'as'   => 'clients.main'
]);



//search clients

Route::get('/clients/search/client',[
    'uses' =>'ClientsController@searchClient',
    'as' => 'ccsearch'
]);

//single search
Route::get('/client/search',[
    'uses' =>'ClientsController@search',
    'as' => 'csearch'
]);






Route::get('/clients/active',[
    'uses' => 'ClientsController@active',
    'as'   => 'clients.active'
]);

Route::get('/client/create',[
    'uses' => 'ClientsController@create',
    'as'   => 'clients.create'
]);



Route::get('/client/edit/{id}',[
    'uses' =>'ClientsController@edit',
    'as'   => 'client.edit'
]);

Route::get('/clients/delete/{id}', [
    'uses' => 'ClientsController@destroy',
    'as' => 'client.destroy',
]);

Route::get('/clients/pdf/{id}',[
    'uses' => 'ClientsController@export_pdf',
    'as'   => 'print.client',
]);


Route::get('/clients/project/tag/{id}',[
    'uses' => 'ClientsController@project_tag',
    'as'   => 'client.project',
]);


Route::post('client/project/update/{id}',[
     'uses' =>'ClientsController@update_project',
    'as'=>'client.project.update'
]);



Route::post('/client/update/{id}',[
    'uses' =>'ClientsController@update',
    'as'  => 'client.update'
]);



Route::post('/client/store',[
    'uses' => 'ClientsController@store',
    'as'   => 'clients.store'
]);






//project router

Route::get('/project',[
    'uses' => 'ProjectsController@index',
    'as'   => 'projects'
]);

Route::get('/projects/paused/',[
    'uses' => 'ProjectsController@stoppedAndPaused',
    'as'   => 'inactiveProjects'
]);


Route::get('/project/create',[
    'uses' => 'ProjectsController@create',
    'as'   => 'projects.create'
]);


Route::get('/search',[
    'uses' =>'ProjectsController@search',
    'as' => 'psearch'
]);

Route::get('/project/edit/{id}',[
    'uses' => 'ProjectsController@edit',
    'as'   => 'project.edit'
]);


Route::get('/project/done/{id}',[
    'uses' =>'ProjectsController@done',
    'as'  => 'project.done'
]);


Route::get('/project/progressing/{id}',[
    'uses' =>'ProjectsController@progress',
    'as'  => 'project.progress'
]);

Route::get('/project/pause/{id}',[
    'uses' =>'ProjectsController@pause',
    'as'  => 'project.pause'
]);

Route::get('/project/stop/{id}',[
    'uses' =>'ProjectsController@stop',
    'as'  => 'project.stop'
]);

Route::get('/project/delete/{id}', [
    'uses' => 'ProjectsController@destroy',
    'as' => 'project.destroy',
]);

Route::post('/project/store',[
    'uses' => 'ProjectsController@store',
    'as'   => 'projects.store'
]);

Route::post('/project/update/{id}',[
    'uses' =>'ProjectsController@update',
    'as'  => 'project.update'
]);


//client type

Route::get('/client/type',[
    'uses' => 'CtypeController@index',
    'as'   => 'ctypes'
]);


Route::get('/ctype/create', [
    'uses' => 'CtypeController@create',
    'as' => 'ctype.create',
]);


Route::post('/ctype/store', [
    'uses' => 'CtypeController@store',
    'as' => 'ctype.store',
]);

Route::get('/ctype/edit/{id}', [
    'uses' => 'CtypeController@edit',
    'as' => 'ctype.edit',
]);

Route::get('/ctype/delete/{id}', [
    'uses' => 'CtypeController@destroy',
    'as' => 'ctype.destroy',
]);

Route::post('/ctype/update/{id}',[
    'uses' =>'CtypeController@update',
    'as'  => 'ctype.update'
]);


// categories

Route::get('/project/category',[
    'uses' => 'CategoriesController@index',
    'as'   => 'categories'
]);

Route::get('/category/search',[
    'uses' =>'CategoriesController@search',
    'as' => 'catsearch'
]);

Route::get('/categories/edit/{id}', [
    'uses' => 'CategoriesController@edit',
    'as' => 'category.edit',
]);

Route::get('/categories/delete/{id}', [
    'uses' => 'CategoriesController@destroy',
    'as' => 'category.destroy',
]);

Route::post('/categories/update/{id}',[
    'uses' =>'CategoriesController@update',
    'as'  => 'category.update'
]);



Route::get('/categories/create', [
    'uses' => 'CategoriesController@create',
    'as' => 'categories.create',
]);


Route::post('/categories/store', [
    'uses' => 'CategoriesController@store',
    'as' => 'category.store',
]);


//sales

Route::get('sales/view',[
    'uses' =>'SalesController@index',
    'as'   =>'sales'
]);

Route::get('sales/creditors/view',[
    'uses' =>'SalesController@creditors',
    'as'   =>'sales.creditors'
]);


Route::get('sales/debtors/view',[
    'uses' =>'SalesController@debtors',
    'as'   =>'sales.debtors'
]);

Route::get('sales/subscribers/view',[
    'uses' =>'SalesController@subscribers',
    'as'   =>'sales.subscribers'
]);


Route::get('client/subscriptions/view/{id}',[
    'uses' =>'SalesController@client_subscription',
    'as'   =>'client.subscription'
]);

Route::post('/subscribe/{id}',[
    'uses' =>'SalesController@make_payment',
    'as'  => 'income.store'
]);

Route::get('sales/create',[
    'uses' =>'SalesController@create',
    'as'   =>'sales.create'
]);

Route::get('/pfetch',[
    'uses' =>'ProjectsController@ksearch',
    'as' => 'ksearch'
]);

Route::get('/sales/chart',[
    'uses'=>'SalesController@chart',
    'as' =>'sales.chart'    
    ]);

    // Route::get('/sales/pdf/{id}',[
    //     'uses' => 'SalesController@update',
    //     'as'   => 'print.sales',
    // ]);


Route::post('sales/store',[
    'uses' =>'SalesController@store',
    'as'   =>'sales.store'
]);

Route::get('/sale/daily/{id}',[
    'uses' =>'SalesController@daily',
    'as'  => 'sale.daily'
]);

Route::get('/sale/payment/{id}',[
    'uses' =>'SalesController@show',
    'as'   => 'sale.payment'
]);

Route::post('/sale/update/{id}',[
    'uses' =>'SalesController@update',
    'as'  => 'sale.update'
]);

Route::get('/sale/monthly/{id}',[
    'uses' =>'SalesController@monthly',
    'as'  => 'sale.monthly'
]);
Route::get('/sale/weekly/{id}',[
    'uses' =>'SalesController@weekly',
    'as'  => 'sale.weekly'
]);
Route::get('/sale/yearly/{id}',[
    'uses' =>'SalesController@yearly',
    'as'  => 'sale.yearly'
]);




});






















