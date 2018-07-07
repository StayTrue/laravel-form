<?php

use Illuminate\Database\Seeder;

class TariffsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tariffs')->insert([[
            'name' => 'Fit',
            'price' => 1500,
            'delivery_days' => '1, 4',
        ], [
        	'name' => 'Power',
        	'price' => 2000,
        	'delivery_days' => '6',
        ], [
        	'name' => 'Daily',
        	'price' => 2300,
        	'delivery_days' => '2, 3, 5',
        ], [
        	'name' => 'Balance',
        	'price' => 3000,
        	'delivery_days' => '3, 1, 5',
        ], [
        	'name' => 'Vega',
        	'price' => 3200,
        	'delivery_days' => '1, 2',
        ], [
        	'name' => 'Super Fit',
        	'price' => 4500,
        	'delivery_days' => '1, 2, 3, 4, 5, 6, 7',
        ]]);
    }
}
