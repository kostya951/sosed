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
        $this->call(\Database\Seeders\MicroregionSeeder::class);
        $this->call(\Database\Seeders\StreetSeeder::class);
        $this->call(\Database\Seeders\ApartmentSeeder::class);
        $this->call(\Database\Seeders\ApartmentUserSeeder::class);
        $this->call(\Database\Seeders\ArticleCategorySeeder::class);
        $this->call(\Database\Seeders\ArticlesSeeder::class);
        $this->call(\Database\Seeders\DiscussionSeeder::class);
    }
}
