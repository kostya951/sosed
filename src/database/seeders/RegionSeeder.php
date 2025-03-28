<?php

namespace Database\Seeders;

use App\Models\Region;
use Illuminate\Database\Seeder;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csvFile = fopen(database_path("sosed_regions.csv"),"r");

        while(($data = fgetcsv($csvFile)) !== false){
            Region::create([
                'country_id'=>$data[0],
                'name'=>$data[1]
            ]);
        }

        fclose($csvFile);
    }
}
