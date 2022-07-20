<?php

namespace Database\Seeders;

use App\Models\Neko;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();


        Neko::factory(10)->create();
         
        // Neko::factory()->create([
            
        //         [
        //             'id' => '1',
        //             'name' => 'Mana',
        //             'desc' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Reprehenderit possimus, vel autem mollitia dolorum dolore aliquam distinctio inventore voluptatem incidunt eum tempore, ut pariatur sequi similique error molestias modi commodi.',
        //             'img' => '/img/alvan-nee-ZCHj_2lJP00-unsplash.jpg'
        //         ],
        //         [   
        //             'id' => '2',
        //             'name' => 'Percy',
        //             'desc' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Reprehenderit possimus, vel autem mollitia dolorum dolore aliquam distinctio inventore voluptatem incidunt eum tempore, ut pariatur sequi similique error molestias modi commodi.',
        //             'img' => '/img/daria-shatova-46TvM-BVrRI-unsplash.jpg'
        //         ],
        //         [   
        //             'id' => '3',
        //             'name' => 'Trevor',
        //             'desc' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Reprehenderit possimus, vel autem mollitia dolorum dolore aliquam distinctio inventore voluptatem incidunt eum tempore, ut pariatur sequi similique error molestias modi commodi.',
        //             'img' => '/img/karina-vorozheeva-rW-I87aPY5Y-unsplash.jpg'
        //         ]   
                
        // ]);
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


    }
}
