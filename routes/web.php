<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    $results = \App\Vehicle::whereHasMorph('drivable', [\App\Car::class], function ($query) {
        $query->where('color', 'Blue');
    });

    // $results = \App\Vehicle::whereHasMorph('drivable', ['*'], function ($query) {
    //     $query->where('color', 'Blue');
    // });

    // Exception (as expected): `Please use whereHasMorph() for MorphTo relationships.`
    // $results = \App\Vehicle::whereHas('drivable', function ($query) {
    //     $query->where('color', 'Blue');
    // });

    dd($results->get());
});
