<?php

namespace App\Livewire\Admin\Supplier;

use App\Enums\SupplierTypes;
use App\Models\Supplier;
use Illuminate\Validation\Rule;
use Livewire\Component;

class SupplierForm extends Component
{
    public $id;

    public $name;

    public $description;

    public $type;

    public $price;

    public $phone_number;

    public $email;

    public function mount($supplier = null)
    {
        if ($supplier) {
            $supplier = Supplier::findOrFail($supplier);
            $this->id = $supplier->id;
            $this->name = $supplier->name;
            $this->description = $supplier->description;
            $this->type = $supplier->type;
            $this->price = $supplier->price;
            $this->phone_number = $supplier->phone_number;
            $this->email = $supplier->email;
        }
    }

    public function render()
    {
        return view('livewire.admin.supplier.supplier-form');
    }

    public function save()
    {
        $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'type' => ['required', Rule::enum(SupplierTypes::class)],
            'price' => ['required', 'numeric'],
            'phone_number' => ['nullable', 'string', 'max:255'],
            'email' => ['nullable', 'string', 'email', 'max:255'],
        ]);

        $supplier = Supplier::updateOrCreate([
            'id' => $this->id,
        ], [
            'name' => $this->name,
            'type' => $this->type,
            'price' => $this->price,
            'phone_number' => $this->phone_number,
            'email' => $this->email,
        ]);

        if ($this->id) {
            return redirect()->route('admin.supplier.show', $supplier);
        }

        return redirect()->route('admin.suppliers.index');
    }
}
