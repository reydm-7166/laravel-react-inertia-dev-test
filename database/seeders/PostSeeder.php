<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::first();

        Post::create([
            'UUID' => rand(100000, 999999),
            'user_id' => $user->id,
            'slug' => 'first-post',
            'title' => 'First Post',
            'description' => 'This is the 1st seed post.',
            'email_verified_at' => now(),
        ]);

        Post::create([
            'UUID' => rand(100000, 999999),
            'user_id' => $user->id,
            'slug' => 'second-post',
            'title' => 'Second Post',
            'description' => 'This is 2nd seed post',
            'email_verified_at' => now(),
        ]);
    }
}
