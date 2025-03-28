<?php

namespace Database\Seeders;

use App\Models\AdCategory;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class AdsCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fileCSV = fopen(database_path('ads_categories.csv'),'r');

        while(($data = fgetcsv($fileCSV)) !== false){
            AdCategory::create([
                'id'=>$data[0],
                'slug'=>$data[1],
                'parent_id'=>$data[2],
                'title'=>$data[3],
                'h1'=>$data[4],
                'page_title'=>$data[5],
                'body'=>$data[6],
                'meta_description'=>$data[7],
                'created_at'=>Carbon::now()->toDateTimeString(),
                'updated_at'=>Carbon::now()->toDateTimeString(),
            ]);
        }
    }
}
