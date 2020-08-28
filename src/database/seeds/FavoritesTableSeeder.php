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
        $min = 1; $max = 64; // post_id 1~64

        //-- test data
        // make favorites
        for ($user_id = 1; $user_id <= 8; $user_id++) {
            $post_ids = [];
            for($i = 0; $i < 30; $i++){
                while(true){
                    $tmp = mt_rand($min, $max);
                    if( ! in_array( $tmp, $post_ids ) ){
                        array_push($post_ids, $tmp);
                        break;
                    } 
                }
            }
            for ($i = 0; $i < 30; $i++) {
                if ( $user_id%8 == $post_ids[$i]%8 ) { continue; }
                Favorite::create([
                    'user_id' => $user_id,
                    'post_id' => $post_ids[$i]
                ]);
            }
        }
    }
}
