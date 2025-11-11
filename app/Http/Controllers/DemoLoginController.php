<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;

class DemoLoginController extends Controller
{
    public function __invoke(): RedirectResponse
    {
        User::firstOrCreate(
            ['email' => 'demo@agentcreators.com'],
            [
                'name' => 'Demo User',
                'password' => bcrypt('demo2024-readonly'),
            ]
        );

        return redirect()->route('filament.admin.auth.login')
            ->with('demo_email', 'demo@agentcreators.com')
            ->with('demo_password', 'demo2024-readonly')
            ->with('remember', true);
    }
}
