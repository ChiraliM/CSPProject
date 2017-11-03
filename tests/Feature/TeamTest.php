<?php

namespace Tests\Feature;

use App\Data\Models\Team;
use App\Data\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TeamTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * @test
     *
     * @return void
     */
    public function a_team_has_a_name()
    {
        $team = new Team(['name' => 'Technology']);
        $this->assertEquals('Technology', $team->name);
    }

    /**
     * @test
     */
    public function a_team_can_add_memebers()
    {
        /* Given */
        $team = factory(Team::class)->create();

        $user = factory(User::class)->create();
        $userTwo = factory(User::class)->create();

        /* When */

        $team->add($user);
        $team->add($userTwo);

        /* Then */

        $this->assertEquals(2, $team->members->count());
    }
}
