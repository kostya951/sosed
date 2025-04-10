<?php

namespace Database\Seeders;

use App\Models\Region;
use Illuminate\Database\Seeder;

class RegionSeeder extends Seeder
{
    public function run()
    {
        $csvFile = fopen(database_path("sosed_regions.csv"),"r");

        $i=1;
        while(($data = fgetcsv($csvFile)) !== false){
            Region::create([
                'id'=>$i,
                'country_id'=>$data[0],
                'name'=>$data[1]
            ]);
            $i++;
        }

        fclose($csvFile);
    }
}
