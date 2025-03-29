<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csvFile = fopen(database_path("countries.csv"),"r");

        while(($data = fgetcsv($csvFile)) !== false){
            Country::create([
                'name'=>$data[0],
                'description'=>$data[1]
            ]);
        }

        fclose($csvFile);
    }
}
