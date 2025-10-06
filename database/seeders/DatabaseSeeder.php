<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Stylebook;
use App\Models\Article;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        User::updateOrCreate(
            ['email' => 'admin@admin.com'],
            ['name' => 'Admin', 'password' => Hash::make('password')]
        );

        // Demo-User
        $users = User::factory(5)->create();

        // Für jeden User Stylebooks erstellen (falls du Stylebooks bereits nutzt)
        foreach ($users as $user) {
            Stylebook::factory(2)->create(['user_id' => $user->id]);
        }

        // Unabhängige Artikel erstellen (ohne Stylebook)
        foreach ($users as $user) {
            Article::factory(rand(3, 5))->create([
                'author_id' => $user->id,
                'is_public' => true,
            ]);
        }
    }
}
