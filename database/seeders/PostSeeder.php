<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['title' => "My first post", "content" => "This is my first post"],
            ['title' => "My second post", "content" => "This is my second post"],
            ['title' => "My longest post", "content" => "This is my " . str_repeat("very", 100). " post"],
        ];

        foreach($data as $post) {
            Post::create($post);
        }
    }

}