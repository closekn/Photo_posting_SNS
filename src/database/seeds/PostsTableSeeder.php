<?php

use Illuminate\Database\Seeder;
use App\Models\Post;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //-- test data
        // make 10 posts
        for ($ct = 1; $ct <= 8; $ct++) {
            for ($user_id = 1; $user_id <= 8; $user_id++) {
                Post::create([
                    'user_id'    => $user_id,
                    'photo'      => 'http://placehold.jp/'.sprintf('%06X', mt_Rand(0, 0xFFFFFF)).'/'.sprintf('%06X', mt_Rand(0, 0xFFFFFF)).'/500x500.png?text=Photo'.($user_id+8*($ct-1)),
                    'caption'    => "test_user${user_id}によるテスト投稿\nその${ct}です。",
                    'created_at' => date("Y-m-d H:i:s",strtotime("-${ct} day")),
                    'updated_at' => date("Y-m-d H:i:s",strtotime("-${ct} day")),
                ]);
            }
        }
    }
}
