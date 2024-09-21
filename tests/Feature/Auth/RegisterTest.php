<?php

use App\Livewire\Auth\Register;
use App\Models\User;
use Livewire\Livewire;

uses(\Illuminate\Foundation\Testing\RefreshDatabase::class);

test('can view register page', function () {
    $this->get(route('register', ['token' => env('REGISTER_KEY')]))
        ->assertSeeLivewire(Register::class);
});

// test('can register with valid data', function () {
//     Livewire::test(Register::class, ['token' => env('REGISTER_KEY')])
//         ->set('name', 'Test User')
//         ->set('email', 'test@example.com')
//         ->set('password', 'password')
//         ->set('passwordConfirmation', 'password')
//         ->call('register');

//     $this->assertAuthenticatedAs(User::first());
// });
