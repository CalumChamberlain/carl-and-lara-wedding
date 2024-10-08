<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Register extends Component
{
    #[Title('Register')]

    #[Validate(['required', 'string', 'max:255'])]
    public string $name;

    #[Validate(['required', 'email'])]
    public $email;

    #[Validate(['required', 'min:8', 'same:passwordConfirmation'])]
    public $password;

    #[Validate(['required', 'min:8', 'same:password'])]
    public $passwordConfirmation;

    public function mount(Request $request)
    {
        if (! $request->has('token') || $request->token != env('REGISTER_KEY')) {
            return redirect()->route('login');
        }
    }

    public function render()
    {
        return view('livewire.auth.register');
    }

    public function register()
    {
        $this->validate();

        $user = User::create([
            'email' => $this->email,
            'name' => $this->name,
            'password' => Hash::make($this->password),
        ]);

        event(new Registered($user));

        Auth::login($user, true);

        return redirect()->intended('/');
    }
}
