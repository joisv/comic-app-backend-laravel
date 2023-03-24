<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Episode;
use App\Models\Genre;
use App\Models\Readme;
use App\Models\Series;
use App\Models\Status;
use App\Models\Type;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       
        User::create([
            'name' => 'joisvanka',
            'email' => 'joisvanka@example.com',
            'password' => bcrypt('password')
        ]);
        \App\Models\User::factory(5)->create();

        Series::create([
            'title' => 'Naruto Shippuden',
            'slug' => 'naruto-shippuden',
            'body' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Officia odio consequatur dicta delectus deserunt quaerat cupiditate! Magni quaerat porro ullam deserunt nulla tempora aspernatur quos? Eum sit dolor vero alias ad eligendi similique, quia libero itaque facere magni non numquam, in saepe tenetur ipsa incidunt totam voluptatem accusamus. Delectus temporibus provident corrupti quis blanditiis omnis quia quo mollitia rem ea possimus nostrum assumenda accusantium reiciendis, sunt natus a illo obcaecati minus sapiente! Neque animi deleniti, vitae ducimus temporibus ullam, quasi veniam necessitatibus, voluptatum labore eaque laborum! Perferendis atque sit repudiandae. Voluptatum nobis asperiores natus illo aperiam rerum voluptate amet quae!',
            
        ]);
        Series::create([
            'title' => 'Death Note',
            'slug' => 'death-note',
            'body' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Officia odio consequatur dicta delectus deserunt quaerat cupiditate! Magni quaerat porro ullam deserunt nulla tempora aspernatur quos? Eum sit dolor vero alias ad eligendi similique, quia libero itaque facere magni non numquam, in saepe tenetur ipsa incidunt totam voluptatem accusamus. Delectus temporibus provident corrupti quis blanditiis omnis quia quo mollitia rem ea possimus nostrum assumenda accusantium reiciendis, sunt natus a illo obcaecati minus sapiente! Neque animi deleniti, vitae ducimus temporibus ullam, quasi veniam necessitatibus, voluptatum labore eaque laborum! Perferendis atque sit repudiandae. Voluptatum nobis asperiores natus illo aperiam rerum voluptate amet quae!',
            
        ]);
        Series::create([
            'title' => 'Chainshaw Man',
            'slug' => 'chainshaw-man',
            'body' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Officia odio consequatur dicta delectus deserunt quaerat cupiditate! Magni quaerat porro ullam deserunt nulla tempora aspernatur quos? Eum sit dolor vero alias ad eligendi similique, quia libero itaque facere magni non numquam, in saepe tenetur ipsa incidunt totam voluptatem accusamus. Delectus temporibus provident corrupti quis blanditiis omnis quia quo mollitia rem ea possimus nostrum assumenda accusantium reiciendis, sunt natus a illo obcaecati minus sapiente! Neque animi deleniti, vitae ducimus temporibus ullam, quasi veniam necessitatibus, voluptatum labore eaque laborum! Perferendis atque sit repudiandae. Voluptatum nobis asperiores natus illo aperiam rerum voluptate amet quae!',
            
        ]);
        Series::create([
            'title' => 'Detektif Connan',
            'slug' => 'detektif-connan',
            'body' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Officia odio consequatur dicta delectus deserunt quaerat cupiditate! Magni quaerat porro ullam deserunt nulla tempora aspernatur quos? Eum sit dolor vero alias ad eligendi similique, quia libero itaque facere magni non numquam, in saepe tenetur ipsa incidunt totam voluptatem accusamus. Delectus temporibus provident corrupti quis blanditiis omnis quia quo mollitia rem ea possimus nostrum assumenda accusantium reiciendis, sunt natus a illo obcaecati minus sapiente! Neque animi deleniti, vitae ducimus temporibus ullam, quasi veniam necessitatibus, voluptatum labore eaque laborum! Perferendis atque sit repudiandae. Voluptatum nobis asperiores natus illo aperiam rerum voluptate amet quae!',
            
        ]);
        Series::create([
            'title' => 'One Piece',
            'slug' => 'one-piece',
            'body' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Officia odio consequatur dicta delectus deserunt quaerat cupiditate! Magni quaerat porro ullam deserunt nulla tempora aspernatur quos? Eum sit dolor vero alias ad eligendi similique, quia libero itaque facere magni non numquam, in saepe tenetur ipsa incidunt totam voluptatem accusamus. Delectus temporibus provident corrupti quis blanditiis omnis quia quo mollitia rem ea possimus nostrum assumenda accusantium reiciendis, sunt natus a illo obcaecati minus sapiente! Neque animi deleniti, vitae ducimus temporibus ullam, quasi veniam necessitatibus, voluptatum labore eaque laborum! Perferendis atque sit repudiandae. Voluptatum nobis asperiores natus illo aperiam rerum voluptate amet quae!',
            
        ]);
        Series::create([
            'title' => 'Boku no Hero',
            'slug' => 'boku-no-hero',
            'body' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Officia odio consequatur dicta delectus deserunt quaerat cupiditate! Magni quaerat porro ullam deserunt nulla tempora aspernatur quos? Eum sit dolor vero alias ad eligendi similique, quia libero itaque facere magni non numquam, in saepe tenetur ipsa incidunt totam voluptatem accusamus. Delectus temporibus provident corrupti quis blanditiis omnis quia quo mollitia rem ea possimus nostrum assumenda accusantium reiciendis, sunt natus a illo obcaecati minus sapiente! Neque animi deleniti, vitae ducimus temporibus ullam, quasi veniam necessitatibus, voluptatum labore eaque laborum! Perferendis atque sit repudiandae. Voluptatum nobis asperiores natus illo aperiam rerum voluptate amet quae!',
            
        ]);
        Series::create([
            'title' => 'Classroom Elite',
            'slug' => 'classroom-elite',
            'body' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Officia odio consequatur dicta delectus deserunt quaerat cupiditate! Magni quaerat porro ullam deserunt nulla tempora aspernatur quos? Eum sit dolor vero alias ad eligendi similique, quia libero itaque facere magni non numquam, in saepe tenetur ipsa incidunt totam voluptatem accusamus. Delectus temporibus provident corrupti quis blanditiis omnis quia quo mollitia rem ea possimus nostrum assumenda accusantium reiciendis, sunt natus a illo obcaecati minus sapiente! Neque animi deleniti, vitae ducimus temporibus ullam, quasi veniam necessitatibus, voluptatum labore eaque laborum! Perferendis atque sit repudiandae. Voluptatum nobis asperiores natus illo aperiam rerum voluptate amet quae!',
            
        ]);
        Series::create([
            'title' => 'Banging my Aunt',
            'slug' => 'banging-my-aunt',
            'body' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Officia odio consequatur dicta delectus deserunt quaerat cupiditate! Magni quaerat porro ullam deserunt nulla tempora aspernatur quos? Eum sit dolor vero alias ad eligendi similique, quia libero itaque facere magni non numquam, in saepe tenetur ipsa incidunt totam voluptatem accusamus. Delectus temporibus provident corrupti quis blanditiis omnis quia quo mollitia rem ea possimus nostrum assumenda accusantium reiciendis, sunt natus a illo obcaecati minus sapiente! Neque animi deleniti, vitae ducimus temporibus ullam, quasi veniam necessitatibus, voluptatum labore eaque laborum! Perferendis atque sit repudiandae. Voluptatum nobis asperiores natus illo aperiam rerum voluptate amet quae!',
            
        ]);

        Genre::create([
            'name' => 'Action',
            'slug' => 'action'
        ]);
        Genre::create([
            'name' => 'Romance',
            'slug' => 'romance'
        ]);
        Genre::create([
            'name' => 'Slice of Life',
            'slug' => 'slice-of-life'
        ]);

        Episode::create([
            'title' => 'death note episode 1',
            'series_id' => '2',
            'slug' => 'death-note-chapter-1'
        ]);
        Episode::create([
            'title' => 'death note episode 2',
            'series_id' => '2',
            'slug' => 'death-note-episode-2'
        ]);
        Episode::create([
            'title' => 'detektif connan episode 1',
            'series_id' => '4',
            'slug' => 'detektif-connan-episode-1'
        ]);
        Episode::create([
            'title' => 'Episode 1',
            'series_id' => '6',
            'slug' => 'cobaa-1'
        ]);

        Readme::create([
            'episode_id' => '2'
        ]);
       
    }
}
