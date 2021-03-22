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



Route::get('/','BlogUserController@index');
Route::get('/getdetailarticle/{id}','BlogUserController@getdetailarticle');

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});

Route::post('/registeruser', 'BlogUserController@RegisterUser');
Route::post('/loginuser', 'BlogUserController@LoginUser');

Route::group(['middleware' => 'prevent-back-history'],function(){
        Route::get('/myarticles','BlogUserController@myarticles');
        Route::post('/uploadarticle','BlogUserController@UploadArticle');
        Route::post('/updateuploadarticle','BlogUserController@UpdateUploadArticle');
        Route::get('/removearticle/{id}','BlogUserController@RemoveArticle');
        Route::get('/logout', 'BlogUserController@Logout');
});
