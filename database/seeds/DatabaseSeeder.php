<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Car::class, 3)->create()->each(function ($car) {
            factory(\App\Vehicle::class)->create([
                'drivable_id' => $car->id,
                'drivable_type' => '\App\Car',
            ]);
        });

        factory(App\Truck::class, 2)->create()->each(function ($truck) {
            factory(\App\Vehicle::class)->create([
                'drivable_id' => $truck->id,
                'drivable_type' => '\App\Truck',
            ]);
        });
    }
}
