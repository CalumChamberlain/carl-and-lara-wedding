<?php

namespace App\Livewire\Admin\Payment;

use App\Models\Supplier;
use Livewire\Component;

class PaymentForm extends Component
{
    public $amount;

    public $reference;

    public $date;

    public Supplier $supplier;

    public function mount($supplier)
    {
        $this->supplier = $supplier;
    }

    public function render()
    {
        return view('livewire.admin.payment.payment-form');
    }

    public function save()
    {
        $this->validate([
            'amount' => ['required', 'numeric'],
            'reference' => ['nullable', 'string', 'max:255'],
            'date' => ['required', 'date'],
        ]);

        $this->supplier->payments()->create([
            'amount' => $this->amount,
            'reference' => $this->reference,
            'date' => $this->date,
        ]);

        return redirect()->route('admin.suppliers.show', $this->supplier);
    }
}
