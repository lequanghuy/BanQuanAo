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


Route::get('/trang-chu', 'HomeController@index')->name('trangchu');

Route::get('/dang-ki', 'RegisterController@create');

Route::post('/register', 'RegisterController@store');

Route::get('/product', 'CatergoryDetailsController@product');

Route::get('/product/{product}', 'ProductController@show');

Route::get('/buy/{product}', 'ProductController@buy');

Route::get('/cart','ProductController@cart');

Route::get('/removecartitem/{rowid}','ProductController@removecartitem');

Route::get('/updatecart/{id}/{qty}', 'ProductController@updatecart');


Route::post('/bill', 'BillController@create');

Route::get('/checkout1', function(){
   return view('/checkout.checkout1');
});

Route::get('/confirmation/{token}', 'BillController@updatestatus');

Route::get('/test', 'BillController@test' );

Route::get('/blog', 'BlogController@bloglist');

Route::get('/post/{id}/{slug}', 'BlogController@post');

Route::post('/addcomment/{id}', 'CommentController@add');

//Admin

Route::get('/getdetail/{id}/{theloai}', 'ProductController@getDetailList');

Route::post('/addproduct', 'ProductController@create');

Route::get('/edit/{rid}', 'ProductController@edit');

Route::post('/submitedit/{rid}', 'ProductController@submitedit');

Route::get('/delete/{rid}', 'ProductController@delete');

Route::get('/deleteselect', 'ProductController@destroy');

Route::get('/admin/product/search', 'ProductController@search');

//create event
Route::get('admin/event/create', 'EventController@show');

Route::get('/eventproduct/{key}', 'EventController@getProductType');

Route::post('/event/submit', 'EventController@create');

//event

Route::get('/deleteevent/{rid}', 'EventController@delete');

Route::get('/event/{code}', 'EventController@customerevent');

//bill

Route::get('/detailbill/{id}', 'BillController@detail');

//blog
Route::get('/admin/createblog', function(){
   return view('admin.blog.createblog');
});

Route::post('/createpost', 'BlogController@create');

Route::get('/test', 'EventController@test');

Route::get('/postdelete/{id}', 'BlogController@delete');

Route::get('/postformedit/{id}', 'BlogController@postform');

Route::post('/edit', 'BlogController@edit');

Route::get('/getpermission/{id}','AdminController@permission');

//Auth user Auth admin
Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/user/logout','Auth\LoginController@userLogout')->name('user.logout');

Route::prefix('admin')->group(function(){

    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');

    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');

    Route::get('/', 'AdminController@index')->name('admin.dashboard');

    Route::get('/product', 'AdminController@catergoryadmin')->name('admin.product'); //product

    Route::get('/event', 'AdminController@event'); //event

    Route::get('/bill', 'AdminController@showbill'); //bill

    Route::get('/blog', 'AdminController@showblog'); //blog

    Route::get('/employee', 'AdminController@employee'); //employee

    Route::post('/addemployee', 'AdminController@them');

    Route::get('/role', 'AdminController@role'); //role

    Route::get('/updatepermissions/{roleid}', 'AdminController@updatepermissions');

    Route::post('/createrole', 'AdminController@createrole');

    Route::post('/createpermission', 'AdminController@createpermission');

    Route::get('/edit/{rid}', 'AdminController@getinfo');

    Route::post('/editemployee/{id}', 'AdminController@edit');

    Route::get('delete/{id}', 'AdminController@delete');

    Route::get('/customer','AdminController@customer');

    Route::get('/customerbill/{rid}', 'AdminController@customerbill');

    Route::get('/customer/search', 'AdminController@customersearch');

    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
});

Route::get('/hot', 'ProductController@hot');

Route::get('/search', 'HomeController@searchpro');



