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

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Pusher\Pusher;

$router->post('login', 'ApiTokenController@login');

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['middleware' => 'auth'], function() use ($router) {

    $router->post('broadcasting/auth', function(Request $request, Pusher $pusher) {
        $user = Auth::user();

        return $pusher->presenceAuth('presence-chat', $request->request->get('socket_id'), $user->id, [
            'name' => $user->name,
            'profile_image_url' => $user->profile_image_url
        ]);
    });

    $router->put('user/{user}/online', function (Pusher $pusher) use ($router) {
        $user = Auth::user();
        $pusher->trigger('presence-chat', 'UserOnline', [
            'name' => $user->name,
            'profile_image_url' => $user->profile_image_url
        ]);
    });

    $router->put('user/{user}/offline', function (Pusher $pusher) use ($router) {
        $user = Auth::user();
        $pusher->trigger('presence-chat', 'UserOffline', [
            'name' => $user->name,
            'profile_image_url' => $user->profile_image_url
        ]);
    });

    $router->get('room', 'RoomController@index');
    $router->get('private-message', 'RoomController@index');
    $router->post('private-message', 'RoomController@store');
});
