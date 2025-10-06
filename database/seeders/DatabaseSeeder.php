<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Stylebook;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Admin für die Bewertung
        User::updateOrCreate(
            ['email' => 'admin@admin.com'],
            ['name' => 'Admin', 'password' => Hash::make('password')]
        );

        // Demo-User + Stylebooks
        User::factory(5)->create()->each(function ($user) {
            Stylebook::factory(3)->create(['user_id' => $user->id]);
        });
    }
}
