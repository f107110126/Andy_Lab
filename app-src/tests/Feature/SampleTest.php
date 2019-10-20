<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SampleTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    /*
     * if your test might cause the database be change
     * use RefreshDatabase;
     * above this line will undo everything to database.
     * to will be sure every test will be same database status.
     */
    // public function testExample()
    // {
    //     $response = $this->get('/');
    //
    //     $response->assertStatus(200);
    // }

    /*
     * to let a method be test:
     * add this line before method:
     * /**
     *  * @test
     *  *-/
     * public function this_method_will_be_test() {...}
     *
     * or a function use 'test' at start of method name:
     * public function test_this_method() {...}
     */
    /** @test */
    public function guests_may_not_create_teams()
    {
        $this->post('/teams')->assertRedirect('/login');
    }

    /** @test */
    public function a_user_can_create_a_team()
    {
        // by default, test will handling every exception
        // so if debug need review the exception
        // add this line:
        $this->withoutExceptionHandling();

        // Given: I am a user who is logged in.
        $this->actingAs(factory('App\User')->create());

        // for the condition is reusable
        $attributes = ['name' => 'Acme'];
        // When: Then hit the endpoint /teams to create a new team, while passing the necessary data.
//        $this->post('/teams', [
//            // 'owner_id' => '',
//            'name' => 'Acme'
//        ]);

        $this->post('/teams', $attributes);

        // Then: There should be a new in database.
//        $this->assertDatabaseHas('teams', ['name' => 'Acme']);
        $this->assertDatabaseHas('teams', $attributes);
    }
}
