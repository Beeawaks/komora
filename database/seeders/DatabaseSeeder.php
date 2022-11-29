<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Course;
use App\Models\Bulletin;
use App\Models\Category;
use App\Models\pertanyaanPost;
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
        User::factory(3)->create();

        // Category::create([
        //     'name'=>'College',
        //     'slug'=>'college'
        // ]);

        // Category::create([
        //     'name'=>'Personal',
        //     'slug'=>'personal'
        // ]);

        pertanyaanPost::factory(20)->create();

        Bulletin::factory(10)->create();

        Course::factory(5)->create();
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // User::create([
        //     'name'=>'Gilang',
        //     'email'=>'gilang@gmail.com',
        //     'password'=>bcrypt('12345')
        // ]);

        // User::create([
        //     'name'=>'Septian',
        //     'email'=>'septian@gmail.com',
        //     'password'=>bcrypt('12345')
        // ]);

        // pertanyaanPost::create([
        //     'title' => 'Judul Pertama',
        //     'category_id'=> '1',
        //     'user_id'=> '1',
        //     'slug' => 'judul-pertama',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem natus esse suscipit illum dolore eum ratione quam harum laboriosam temporibus perferendis, veritatis nulla quaerat voluptatibus, sint officiis dolorum doloribus voluptates dolorem earum? Temporibus dolor incidunt officiis praesentium pariatur magni quasi eos dolore! Eum, debitis molestias! Totam quia iure fuga reprehenderit dolor earum vitae consequatur libero nesciunt, sequi enim ipsum quidem accusamus qui est. Voluptatibus ipsam esse tempore, temporibus ratione itaque molestiae ullam officia atque nulla deserunt minima laboriosam, ipsa beatae magni dignissimos facilis saepe. Iure officiis quam id ab reiciendis natus omnis. Velit quasi aliquam dicta sunt fuga soluta nam?'
        // ]);

        // pertanyaanPost::create([
        //     'title' => 'Judul Kedua',
        //     'category_id'=> '2',
        //     'user_id'=> '2',
        //     'slug' => 'judul-kedua',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem natus esse suscipit illum dolore eum ratione quam harum laboriosam temporibus perferendis, veritatis nulla quaerat voluptatibus, sint officiis dolorum doloribus voluptates dolorem earum? Temporibus dolor incidunt officiis praesentium pariatur magni quasi eos dolore! Eum, debitis molestias! Totam quia iure fuga reprehenderit dolor earum vitae consequatur libero nesciunt, sequi enim ipsum quidem accusamus qui est. Voluptatibus ipsam esse tempore, temporibus ratione itaque molestiae ullam officia atque nulla deserunt minima laboriosam, ipsa beatae magni dignissimos facilis saepe. Iure officiis quam id ab reiciendis natus omnis. Velit quasi aliquam dicta sunt fuga soluta nam?'
        // ]);

        
    }
}
