<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class ArticlesSeeder extends Seeder
{
    public function run(): void
    {
        Article::factory()
            ->sequence(function(Sequence $sequence){
                return [
                    'publish_user_id' => User::all()->random()->id,
                    'category_id' => ArticleCategory::all()->random()->id
                ];
            })
            ->count(100)
            ->create();
    }
}
