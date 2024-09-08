<?php

namespace App\Livewire\Auth;

use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;
use Livewire\Component;

class ResetPassword extends Component
{
    #[Validate('email')]
    public string $email;

    #[Validate(['password', 'same:passwordConfirmation', 'min:8'])]
    public string $password;

    public string $passwordConfirmation;

    public string $token;

    public string $emailSentMessage;

    public function render()
    {
        return view('livewire.auth.reset-password');
    }

    public function resetPassword()
    {
        $response = Password::broker()->reset(
            [
                'token' => $this->token,
                'email' => $this->email,
                'password' => $this->password,
            ],
            function ($user, $password) {
                $user->password = Hash::make($password);

                $user->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));

                Auth::guard()->login($user);
            }
        );

        if ($response == Password::RESET_LINK_SENT) {
            $this->emailSentMessage = trans($response);

            return;
        }

        $this->addError('email', trans($response));
    }
}
