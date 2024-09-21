<?php

use App\Livewire\Auth\Login;
use App\Models\User;
use Livewire\Livewire;

uses(\Illuminate\Foundation\Testing\RefreshDatabase::class);

test('can view login page', function () {
    $this->get(route('login'))
        ->assertSeeLivewire(Login::class);
});

test('is redirected if already logged in', function () {
    $user = User::factory()->create();

    $this->be($user);

    $this->get(route('login'))
        ->assertRedirect('/');
});

test('can login with valid credentials', function () {
    $user = User::factory()->create();

    Livewire::test(Login::class)
        ->set('email', $user->email)
        ->set('password', 'password')
        ->call('authenticate');

    $this->assertAuthenticatedAs($user);
});

test('can not login with invalid credentials', function () {
    $user = User::factory()->create();

    Livewire::test(Login::class)
        ->set('email', $user->email)
        ->set('password', 'wrong-password')
        ->call('authenticate')
        ->assertHasErrors(['email']);
});

test('can not login with invalid email', function () {
    $user = User::factory()->create();

    Livewire::test(Login::class)
        ->set('email', 'wrong-email')
        ->set('password', 'password')
        ->call('authenticate')
        ->assertHasErrors(['email']);
});
