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
Class Bar {}
Route::get('bar', function(Bar $bar){
    dd($bar);
});

Route::get('/', 'PagesController@welcome');
/*
Route::get('about', ['middleware' => 'auth', function(){
    return 'this pase will only show if the user is signed in';
}]);
*/
Route::get('about', 'PagesController@about');
Route::get('contact', 'PagesController@contact');
/*
Route::get('articles', 'ArticlesController@index');
Route::get('articles/create', 'ArticlesController@create');
Route::get('articles/{id}', 'ArticlesController@show');
Route::post('articles', 'ArticlesController@store');
Route::get('articles/{id}/edit', 'ArticlesController@edit');
*/
Route::resource('articles', 'ArticlesController');
//Route::get('contact', function () {
//    return view('welcome');
//}

//Route::get('phpinfo', function () {
//    phpinfo();
//});
/*
Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);
*/
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('foo', ['middleware' => 'manager', function()
{
    return 'this page may only be viewed by managers';
}
]);

Route::get('tags/{tag}', 'TagsController@show');

Route::get('/logout', 'Auth\LoginController@logout');
//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
