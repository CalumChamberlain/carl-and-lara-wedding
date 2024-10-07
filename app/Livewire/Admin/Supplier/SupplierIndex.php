<?php

namespace App\Livewire\Admin\Supplier;

use App\Models\Payment;
use App\Models\Supplier;
use Illuminate\Support\Number;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class SupplierIndex extends Component
{
    use WithPagination;

    #[Title('Suppliers')]
    public function render()
    {
        $suppliers = Supplier::paginate();

        return view('livewire.admin.supplier.supplier-index', compact('suppliers'));
    }

    #[Computed]
    public function totalPrice(): string
    {
        $totalPence = Supplier::sum('price') ?? 0;

        return Number::currency($totalPence / 100, 'GBP');
    }

    #[Computed]
    public function totalPaid(): string
    {
        $totalPence = Payment::whereNotNull('paid_at')
            ->sum('amount') ?? 0;

        return Number::currency($totalPence / 100, 'GBP');
    }
}
