<?php

namespace Tests\Feature;

use App\Models\Discussion;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DiscussionControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_basic_route(): void
    {
        $response = $this->get(route('discussions'));
        $response->assertStatus(200);
    }

    public function test_get_all_discussions_page_1(){
        $response = $this->get(route('discussions'));
        $response->assertStatus(200);

        $expected = Discussion::query()
                              ->orderByDesc('created_at')
                              ->offset(0)
                              ->limit(10)
                              ->pluck('title')
                              ->all();

        $response->assertSee($expected);
    }

    public function test_get_all_discussions_page_2(){

        $response = $this->get(route('discussions',['page'=>2]));
        $response->assertStatus(200);

        $expected = Discussion::query()
                              ->orderByDesc('created_at')
                              ->offset(10)
                              ->limit(10)
                              ->pluck('title')
                              ->all();

        $response->assertSee($expected);
    }

}
