<?php

use Illuminate\Http\Request;
use App\User;
use App\Trip;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

 //API FOR USERS
Route::get('users', function() {
    // If the Content-Type and Accept headers are set to 'application/json', 
    // this will return a JSON structure. This will be cleaned up later.
    return User::all();
});
 
Route::get('users/{id}', function($id) {
    return User::find($id);
});

Route::post('users', function(Request $request) {
    return User::create($request->all);
});

Route::put('users/{id}', function(Request $request, $id) {
    $user = User::findOrFail($id);
    $user->update($request->all());

    return $user;
});

Route::delete('users/{id}', function($id) {
    User::find($id)->delete();

    return 204;
});


//API FOR TRIPS
Route::get('trips', function() {
    // If the Content-Type and Accept headers are set to 'application/json', 
    // this will return a JSON structure. This will be cleaned up later.
    return Trip::all();
});
 
Route::get('trips/{id}', function($id) {
    return Trip::find($id);
});

Route::post('trips', function(Request $request) {
    return Trip::create($request->all);
});

Route::put('trips/{id}', function(Request $request, $id) {
    $trip = Trip::findOrFail($id);
    $trip->update($request->all());

    return $trip;
});

Route::delete('trips/{id}', function($id) {
    Trip::find($id)->delete();

    return 204;
});