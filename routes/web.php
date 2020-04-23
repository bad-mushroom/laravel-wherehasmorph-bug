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

    /**
     * App\Car exists in DB_02
     * App\Vehicle exists in DB_01
     *
     * Vehicle is polymorphic and can store Car or Truck models from DB_02 via their UUID.
     *
     * Calling `whereHasMorph` assumes App\Car exists in DB_01 despite the connection
     * that is specified on the model.
     *
     * SQLSTATE[42S02]: Base table or view not found: 1146 Table 'DB_01.cars' doesn't exist
     * (SQL: select * from `vehicles` where ((`vehicles`.`drivable_type` = App\Car and exists
     * (select * from `cars` where `vehicles`.`drivable_id` = `cars`.`id` and `color` = Blue))))
     */
    $results = \App\Vehicle::whereHasMorph('drivable', [\App\Car::class], function ($query) {
        $query->where('color', 'Blue');
    });

    // Exception (as expected): `Please use whereHasMorph() for MorphTo relationships.`
    // $results = \App\Vehicle::whereHas('drivable', function ($query) {
    //     $query->where('color', 'Blue');
    // });

    dd($results->get());
});
