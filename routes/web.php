<?php

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

$router->get('/series[/{id}]', "SeriesController@get");
$router->post('/series', "SeriesController@post");
$router->put('/series/{id}', "SeriesController@put");
$router->delete('/series/{id}', "SeriesController@delete");

$router->get('/genres[/{id}]', "GenresController@get");
$router->post('/genres', "GenresController@post");
$router->put('/genres/{id}', "GenresController@put");
$router->delete('/genres/{id}', "GenresController@delete");

$router->post('/login', "LoginController@login");