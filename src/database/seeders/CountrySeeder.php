<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    public function run()
    {
        $csvFile = fopen(database_path("countries.csv"),"r");

        $i=1;
        while(($data = fgetcsv($csvFile)) !== false){
            Country::create([
                'id'=>$i,
                'name'=>$data[0],
                'description'=>$data[1]
            ]);
            $i++;
        }

        fclose($csvFile);
    }
}
