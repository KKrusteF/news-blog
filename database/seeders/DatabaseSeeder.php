<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        $user = User::factory()->create([
            'name' => 'John Doe',
            'username' => 'JohnDoe'
        ]);
        $admin = User::factory()->create([
            'name' => 'Admin',
            'username' => 'admin',
            'password' => bcrypt('admin')
        ]);

        Post::factory(12)->create([
            'user_id' => $user->id
        ]);
    }
}
