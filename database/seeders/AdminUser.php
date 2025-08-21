<?php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminUser extends Seeder
{
    public function run(): void
    {
        User::create([
            'full_name' => 'Admin',
            'email' => 'admin@library.local',
            'phone' => '0123456789',
            'role' => 'admin'
        ]);
    }
}
