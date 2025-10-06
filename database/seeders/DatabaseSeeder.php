<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\{User, Stylebook, Article};

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Admin user
        User::updateOrCreate(
            ['email' => 'admin@admin.com'],
            ['name' => 'Admin', 'password' => Hash::make('password')]
        );

        // Demo users + content
        $users = User::factory(5)->create();

        foreach ($users as $user) {
            Stylebook::factory(2)->create(['user_id' => $user->id]);

            Article::factory(rand(2,4))->create([
                'author_id' => $user->id,
                'is_public' => true,
            ]);
        }
    }
}
