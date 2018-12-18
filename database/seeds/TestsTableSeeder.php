<?php

use Illuminate\Database\Seeder;

class TestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = factory(App\User::class)->create();
        $postTypes = factory(App\PostType::class,10)->create();
        $posts = factory(App\Post::class,50)->create()->each(function($post) use ($user,$postTypes) {
            $post->type = $postTypes[mt_rand(0, (count($postTypes) - 1))]->id;
            $post->user_id = $user->id;
            $post->save();
        });
    }
}