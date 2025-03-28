<?php

namespace Database\Seeders;

use App\Models\City;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csvFile = fopen(database_path("sosed_cities.csv"),"r");

        while(($data = fgetcsv($csvFile)) !== false){
            City::create([
                'region_id'=>$data[0],
                'name'=>$data[1],
                'created_at'=>Carbon::now()->toDateTimeString(),
                'updated_at'=>Carbon::now()->toDateTimeString(),
            ]);
        }

        fclose($csvFile);
    }
}
