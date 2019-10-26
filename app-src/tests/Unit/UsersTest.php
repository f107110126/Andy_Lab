<?php

namespace Tests\Unit;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UsersTest extends TestCase
{
    /** @test */
    public function a_user_can_have_a_team()
    {
        $user = factory(User::class)->create();
        $user->team()->create(['name' => 'Acme']);
        self::assertEquals('Acme', $user->team->name);
    }
}
