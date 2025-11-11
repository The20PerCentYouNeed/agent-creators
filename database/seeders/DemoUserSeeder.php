<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DemoUserSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'demo@agentcreators.com'],
            [
                'name' => 'Demo User',
                'password' => bcrypt('demo2024-readonly'),
                'email_verified_at' => now(),
            ]
        );

        $this->command->info('✅ Demo user created successfully!');
        $this->command->info('   Email: demo@agentcreators.com');
        $this->command->info('   Password: demo2024-readonly');
    }
}
