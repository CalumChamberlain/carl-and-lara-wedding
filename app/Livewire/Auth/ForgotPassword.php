<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Password;
use Livewire\Attributes\Validate;
use Livewire\Component;

class ForgotPassword extends Component
{
    #[Validate('email')]
    public string $email;

    public string $emailSentMessage;

    public function render()
    {
        return view('livewire.auth.forgot-password');
    }

    public function sendResetPasswordLink()
    {
        $response = Password::broker()->sendResetLink(['email' => $this->email]);

        if ($response == Password::RESET_LINK_SENT) {
            $this->emailSentMessage = trans($response);

            return;
        }

        $this->addError('email', trans($response));
    }
}
