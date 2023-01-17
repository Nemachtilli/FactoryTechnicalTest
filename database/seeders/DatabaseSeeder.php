<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Region;
use App\Models\Country;
use App\Models\Director;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Factory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {   

        Director::factory(10)->create();
        User::factory(100)->make();

        

    //     User::factory( 10)->make()->each(function ($user) {
            
                
    //             // $countries = Country::all();

    //             // foreach ($countries as $country) {
    //             //     DB::table('users')->inser([
    //             //         'country_id' => Country::inRandomOrder()->first()->id,
    //             //     ])->exclude(['hs_id', 'mec_id']);
    //             // }
                
    //             // $countryId = Country::find($user['country_id']);

    //             // foreach ($countryId as $country) { // loop through all posts 
    //             //     $regions = Region::all()->random()->pluck('id')->toArray();
    //             //     // Insert random post tag
    //             //     foreach ($regions as $region) {
    //             //         DB::table('users')->insert([
    //             //             'region_id' => $countryId,
    //             //         ]);
    //             //     }
    //             // }

    // });


    //     // foreach(Post::all() as $post){ // loop through all posts 
    //     //     $random_tags = Tag::all()->random(rand(2, 5))->pluck('id')->toArray();
    //     //     // Insert random post tag
    //     //     foreach ($random_tags as $tag) {
    //     //         DB::table('post_tags')->insert([
    //     //             'post_id' => $post->id,
    //     //             'tag_id' => Tag::all()->random(1)[0]->id
    //     //         ]);
    //     //     }
    //     // }
    // });

    // foreach(Country::all() as $country){ // loop through all posts 
    //     $region_id = Tag::all()->random(rand(2, 5))->pluck('id')->toArray();
    //     // Insert random post tag
    //     foreach ($random_tags as $tag) {
    //         DB::table('post_tags')->insert([
    //             'post_id' => $post->id,
    //             'tag_id' => Tag::all()->random(1)[0]->id
    //         ]);
    //     }
    // }

   


   
    
}
}
