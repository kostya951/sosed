<?php
namespace Database\Seeders;

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
        $this->call(\Database\Seeders\CountrySeeder::class);
        $this->call(\Database\Seeders\RegionSeeder::class);
        $this->call(\Database\Seeders\CitySeeder::class);
        $this->call(\Database\Seeders\AdsCategoriesSeeder::class);
        $this->call(\Database\Seeders\RoleSeeder::class);
        $this->call(\Database\Seeders\UserSeeder::class);
        $this->call(\Database\Seeders\ArticleCategorySeeder::class);
        $this->call(\Database\Seeders\ArticleSeeder::class);
    }
}
