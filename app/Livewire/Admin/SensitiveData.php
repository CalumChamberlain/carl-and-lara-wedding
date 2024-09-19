<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\On;
use Livewire\Component;

class SensitiveData extends Component
{
    public string $content;

    public bool $isVisible = false;

    protected $user;

    public function mount($content)
    {
        $this->content = $content;
        $this->checkIfVisible();
    }

    public function render()
    {
        return view('livewire.admin.sensitive-data');
    }

    public function toggle()
    {
        auth()->user()->update([
            'show_sensitive_data' => ! auth()->user()->show_sensitive_data,
        ]);

        $this->dispatch('sensitive-data-toggled');
    }

    #[On('sensitive-data-toggled')]
    public function onSensitiveDataToggled()
    {
        $this->checkIfVisible();
    }

    protected function checkIfVisible()
    {
        $this->isVisible = auth()->user()->show_sensitive_data;
    }
}
