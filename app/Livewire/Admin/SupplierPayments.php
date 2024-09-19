<?php

namespace App\Livewire\Admin;

use App\Models\Supplier;
use Livewire\Attributes\Computed;
use Livewire\Component;

class SupplierPayments extends Component
{
    public Supplier $supplier;

    public function mount($supplier)
    {
        $this->supplier = $supplier;
    }

    public function render()
    {
        return view('livewire.admin.supplier-payments');
    }

    #[Computed]
    public function payments()
    {
        return $this->supplier->payments;
    }

    public function deletePayment($id)
    {
        $this->supplier->payments()->findOrFail($id)->delete();
    }
}
