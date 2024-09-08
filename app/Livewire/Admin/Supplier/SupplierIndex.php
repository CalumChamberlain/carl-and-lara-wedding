<?php

namespace App\Livewire\Admin\Supplier;

use App\Models\Supplier;
use Livewire\Component;
use Livewire\WithPagination;

class SupplierIndex extends Component
{
    use WithPagination;

    public function render()
    {
        $suppliers = Supplier::paginate();

        return view('livewire.admin.supplier.supplier-index', compact('suppliers'));
    }
}
