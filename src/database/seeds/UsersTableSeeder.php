<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //-- test data
        // make 10 users
        for ($user_id = 1; $user_id <= 8; $user_id++) {
            User::create([
                'github_id'      => str_random(7).$user_id,
                'name'           => 'test_user'.$user_id,
                'icon'           => 'http://placehold.jp/'.sprintf('%06X', mt_Rand(0, 0xFFFFFF)).'/'.sprintf('%06X', mt_Rand(0, 0xFFFFFF)).'/300x300.png?text=test_user'.$user_id,
                'remember_token' => str_random(10),
                'created_at'     => now(),
                'updated_at'     => now(),
            ]);
        }
    }
}
