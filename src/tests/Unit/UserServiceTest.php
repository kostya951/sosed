<?php

namespace Tests\Unit;

use App\Core\Assemblers\Users\UserToLastUserAssembler;
use App\Core\Services\UserService;
use App\Core\Services\UserServiceInterface;
use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;


class UserServiceTest extends TestCase
{
    use DatabaseTransactions;

    private UserServiceInterface $service;

    public function __construct(string $name)
    {
        parent::__construct($name);
        $this->service = new UserService(new UserToLastUserAssembler());
    }

    public function setUp(): void
    {
        parent::setUp();
        Role::create([
            'id'=>1,
            'name'=>'citizen',
            'label'=>'Житель'
        ]);

        Role::create([
            'id'=>2,
            'name'=>'admin',
            'label'=>'Администратор'
        ]);
    }

    public function test_get_last_users(): void
    {
        $users = User::factory()->count(9)->create()->pluck('name')->toArray();
        $adminUser = User::factory()->isAdmin()->count(1)->create()->pluck('name')->toArray();
        $blockedUser = User::factory()->blocked()->count(1)->create()->pluck('name')->toArray();
        $deletedUser = User::factory()->deleted()->count(1)->create()->pluck('name')->toArray();
        $unverifiedUser = User::factory()->unverified()->count(1)->create()->pluck('name')->toArray();

        $result = $this->service->getLastUsers();

        $result = array_column($result,'name');

        $this->assertNotEmpty($result);
        $this->assertCount(9,$result);
        $this->assertEquals($users,$result);
        $this->assertNotContains($adminUser[0],$result);
        $this->assertNotContains($blockedUser[0],$result);
        $this->assertNotContains($deletedUser[0],$result);
        $this->assertNotContains($unverifiedUser[0],$result);
    }
}
