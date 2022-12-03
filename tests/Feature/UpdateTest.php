<?php

namespace Tests\Feature;

use App\Http\Livewire\Dashboard;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabaseState;
use Livewire\Livewire;

class UpdateTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function dashboard_page_contains_livewire_component()
    {
        $this->actingAs(User::factory()->create());

        $this->get(route('home'))
            ->assertSuccessful()
            ->assertSeeLivewire('dashboard');
    }

    /** @test */
    function name_is_required()
    {
        $this->actingAs(User::factory()->create());

        Livewire::test(Dashboard::class)
            ->set('name', '')
            ->call('updateUser')
            ->assertHasErrors(['name' => 'required']);
    }

    /** @test */
    function email_is_required()
    {
        $this->actingAs(User::factory()->create());

        Livewire::test('dashboard')
            ->set('email', '')
            ->call('updateUser')
            ->assertHasErrors(['email' => 'required']);
    }

    /** @test */
    function email_is_valid_email()
    {
        $this->actingAs(User::factory()->create());

        Livewire::test(Dashboard::class)
            ->set('email', 'tallstack')
            ->call('updateUser')
            ->assertHasErrors(['email' => 'email']);
    }
}
