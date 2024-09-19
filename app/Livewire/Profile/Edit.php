<?php

namespace App\Livewire\Profile;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password;
use Livewire\Attributes\Renderless;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Edit extends Component
{
    #[Title('Edit Profile')]
    public string $name;

    public string $email;

    public string $current_password;

    // #[Validate(['required', Password::defaults()])]
    public string $new_password;

    public string $new_password_confirmation;

    public string $delete_confirm_password;

    public User $user;

    public function mount(): void
    {
        $this->user = auth()->user();

        $this->name = $this->user->name;
        $this->email = $this->user->email;
    }

    public function render(): \Illuminate\Contracts\View\View
    {
        return view('livewire.profile.edit');
    }

    public function updateProfile(): void
    {
        $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email,'.$this->user->id],
        ]);

        // if the user hasn't changed their name or email and we also want to make, don't update and show error
        if ($this->user->name == $this->name && $this->user->email == $this->email) {
            $this->dispatch('toast', message: 'Nothing to update.', data: ['position' => 'top-right', 'type' => 'info']);

            return;
        }

        $this->user->fill(['email' => $this->email, 'name' => $this->name])->save();

        $this->dispatch('toast', message: 'Profile updated successfully.', data: ['position' => 'top-right', 'type' => 'success']);
    }

    public function updatePassword(): void
    {
        $this->validate([
            'current_password' => ['required'],
            'new_password' => ['required', Password::defaults(), 'same:new_password_confirmation'],
            'new_password_confirmation' => ['required', Password::defaults()],
        ]);

        if (! Hash::check($this->current_password, $this->user->password)) {
            $this->dispatch('toast', message: 'Current Password Incorrect', data: ['position' => 'top-right', 'type' => 'danger']);

            return;
        }

        $this->dispatch('toast', message: 'Successfully updated password.', data: ['position' => 'top-right', 'type' => 'success']);
        $this->user->fill(['password' => Hash::make($this->new_password), 'remember_token' => Str::random(60)])->save();

        $this->reset(['current_password', 'new_password', 'new_password_confirmation']);
    }

    #[Renderless]
    public function destroy(): \Illuminate\Http\RedirectResponse
    {
        if (! Hash::check($this->delete_confirm_password, $this->user->password)) {
            $this->dispatch('toast', message: 'The Password you entered is incorrect', data: ['position' => 'top-right', 'type' => 'danger']);
            $this->reset(['delete_confirm_password']);

            return null;
        }

        $user = auth()->user();

        Auth::logout();

        $user->delete();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return Redirect::to('/');
    }
}
