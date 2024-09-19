<?php

namespace App\Livewire\Admin\Supplier;

use App\Models\Supplier;
use Livewire\Component;

class SupplierCreate extends Component
{
    public $name;

    public $description;

    public $type;

    public $price;

    public $phone_number;

    public $email;

    public function render()
    {
        return view('livewire.admin.supplier.supplier-create');
    }

    public function create()
    {
        $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'type' => ['required', 'integer'],
            'price' => ['required', 'integer'],
            'phone_number' => ['nullable', 'string', 'max:255'],
            'email' => ['nullable', 'string', 'email', 'max:255'],
        ]);

        Supplier::create([
            'name' => $this->name,
            'type' => $this->type,
            'price' => $this->price,
            'phone_number' => $this->phone_number,
            'email' => $this->email,
        ]);

        return redirect()->route('admin.suppliers.index');
    }
}
