<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DashboardTest extends TestCase
{
    use RefreshDatabase;
    
    /** @test */
    public function it_show_the_dashboard_page_to_authenticated_users()
    {

		$user = factory(User::class)->create();
        $this->actingAs($user)
            ->get(route('home'))
            ->assertStatus(200)
            ->assertSee('Dashboard');
    }

    /** @test */
    function it_redirects_guest_users_to_the_login_page()
    {
        $this->get(route('home'))
            ->assertStatus(302)
            ->assertRedirect('login');
    }
}
