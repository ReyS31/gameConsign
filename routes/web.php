<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/anagram','ExampleController@anagramTest');

$router->get('/{apiKey}/{search}/{sort}','MovieController@searchWithSortMovie');
$router->get('/{apiKey}/{search}','MovieController@searchMovie');
$router->get('/{apiKey}','MovieController@allMovie');