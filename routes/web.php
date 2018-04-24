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


$router->get('/', function () use ($router) {
    return redirect('/api');
});

$router->group(['prefix' => 'api'], function () use ($router) {

    $router->get('/', function () use ($router) {

        echo 'API em '.$router->app->version().'<br>';

        foreach ($router->getRoutes()as  $r)
        {
                echo "{$r['method']} {$r['uri']} <br>";
        }
        return  '';
    });

    $router->group(['prefix' => 'users'], function () use ($router) {

        $router->get('/', [
            'as' => 'index', 'uses' => 'UserController@index'
        ]);

        $router->post('/store', [
            'as' => 'store', 'uses' => 'UserController@store'
        ]);

        $router->get('/show/{user_id}', [
            'as' => 'show', 'uses' => 'UserController@show'
        ]);

        $router->put('/update/{user_id}', [
            'as' => 'update', 'uses' => 'UserController@update'
        ]);

        $router->delete('/delete/{user_id}', [
            'as' => 'delete', 'uses' => 'UserController@delete'
        ]);

    });

});