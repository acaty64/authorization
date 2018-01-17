<?php

namespace Tests\Feature\Admin;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdminDashboardTest extends TestCase
{
	use RefreshDatabase;

	/** @test */
	function admins_can_visit_the_admin_dashboard()
	{
        $this->withoutExceptionHandling(); // Para ver detalle del error

        $this->actingAs($this->createAdmin())
            ->get(route('admin_dashboard'))
            ->assertStatus(200)
            ->assertSee('Admin Panel');
	}

    /** @test */
    function non_admin_users_cannot_visit_the_admin_dashboard()
    {

        $this->actingAs($this->createUser())
            ->get(route('admin_dashboard'))
            ->assertStatus(403);
    }

    /** @test */
    function guests_cannot_visit_the_admin_dashboard()
    {
        $this->get(route('admin_dashboard'))
            ->assertStatus(302)
            ->assertRedirect('login');

    }	


}
