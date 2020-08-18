<?php

use Illuminate\Database\Seeder;
use App\Models\Favorite;

class FavoritesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //-- test data
        // make favorites
        for ($i = 1; $i <= 10; $i++) {
            for ($j = $i+1; $j <= 10; $j++) {
                Favorite::create([
                    'user_id' => $i,
                    'post_id' => $j
                ]);
            }
        }
    }
}
