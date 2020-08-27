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
        for ($i = 1; $i <= 10;$i++) {
            User::create([
                'github_id'      => str_random(7).$i,
                'name'           => 'test_user'.$i,
                'icon'           => 'http://placehold.jp/1/300x300.png?text=test_user'.$i,
                'remember_token' => str_random(10),
                'created_at'     => now(),
                'updated_at'     => now(),
            ]);
        }
    }
}
