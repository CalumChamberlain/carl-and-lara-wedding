<?php

use App\Enums\SupplierTypes;
use App\Models\Supplier;
use App\Models\User;
use Livewire\Livewire;

it('can render the create supplier form', function () {
    Livewire::test('admin.supplier.supplier-form')
        ->assertSee('Add supplier') // Check if "Add supplier" is visible
        ->assertStatus(200); // Check if page loads properly
});

it('can create a supplier', function () {
    $supplierData = [
        'name' => 'New Supplier',
        'type' => SupplierTypes::Venue->value,
        'price' => 1500, // Adjusted price to account for attribute
        'phone_number' => '1234567890',
        'email' => 'supplier@example.com',
    ];

    Livewire::test('admin.supplier.supplier-form')
        ->set('name', $supplierData['name'])
        ->set('type', $supplierData['type'])
        ->set('price', $supplierData['price'])
        ->set('phone_number', $supplierData['phone_number'])
        ->set('email', $supplierData['email'])
        ->call('save')
        ->assertRedirect(route('admin.suppliers.index')); // Redirect after saving

    $this->assertDatabaseHas('suppliers', [...$supplierData,
        'price' => $supplierData['price'] * 100,
    ]);
});

it('can render the edit supplier form', function () {
    $supplier = Supplier::factory()->create();

    Livewire::test('admin.supplier.supplier-form', ['supplier' => $supplier->id])
        ->assertSet('name', $supplier->name)
        ->assertStatus(200);
});

it('can update a supplier', function () {
    $supplier = Supplier::factory()->create();

    $newData = [
        'name' => 'Updated Supplier Name',
        'type' => SupplierTypes::Venue,
        'price' => 2000,
        'phone_number' => '0987654321',
        'email' => 'newemail@example.com',
    ];

    Livewire::test('admin.supplier.supplier-form', ['supplier' => $supplier->id])
        ->set('name', $newData['name'])
        ->set('type', $newData['type'])
        ->set('price', $newData['price'])
        ->set('phone_number', $newData['phone_number'])
        ->set('email', $newData['email'])
        ->call('save')
        ->assertRedirect(route('admin.suppliers.show', $supplier->id)); // Redirect after update
});

it('can see a list of suppliers', function () {
    $user = User::factory()->create();
    $suppliers = Supplier::factory()->count(5)->create();

    Livewire::actingAs($user)
        ->test('admin.supplier.supplier-index')
        ->assertSee($suppliers->first()->name)
        ->assertSee($suppliers->last()->name)
        ->assertStatus(200);
});
