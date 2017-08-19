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
/**@var \Illuminate\Routing\Router $router */

//docker-compose exec app php artisan

$router->get('/', function () {
    return view('welcome');
});

Auth::routes();

$router->get('/home', 'HomeController@index')->name('home');


$router->get('/articles', 'ArticlesController@index')->name('articles');
$router->get('/article/{id}', 'ArticlesController@article')->name('article');

$router->get('/articles/{alias}', 'ArticlesController@category')->name('category');

$router->get('/spares', 'SparesController@index');
$router->get('/spares/{type_id}', 'SparesController@categories');
$router->get('/spares/{type_id}/{category_id}', 'SparesController@spares');

