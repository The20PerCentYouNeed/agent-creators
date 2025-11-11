<?php

namespace App\Filament\Pages\Auth;

use Filament\Auth\Pages\Login as BaseLogin;

class Login extends BaseLogin
{
    public function mount(): void
    {
        parent::mount();

        if (session()->has('demo_email')) {
            $this->form->fill([
                'email' => session('demo_email'),
                'password' => session('demo_password'),
                'remember' => session('remember', false),
            ]);
        }
    }
}
