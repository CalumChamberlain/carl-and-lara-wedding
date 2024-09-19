<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Computed;
use Livewire\Component;

class Notes extends Component
{
    public $model;

    public $noteInput;

    public function render()
    {
        return view('livewire.admin.notes');
    }

    public function mount($model)
    {
        $this->model = $model;
    }

    #[Computed]
    public function notes()
    {
        return $this->model
            ->notes()
            ->orderByDesc('created_at')
            ->get();
    }

    public function addNote()
    {
        $this->model->notes()->create([
            'note' => $this->noteInput,
        ]);

        $this->noteInput = '';
    }

    public function deleteNote($id)
    {
        $this->model->notes()->findOrFail($id)->delete();
    }
}
