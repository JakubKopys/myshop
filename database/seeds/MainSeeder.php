<?php

use Illuminate\Database\Seeder;

class MainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class)->create([
            'name' => 'Admin',
            'email' => 'example@email.com',
            'password' => bcrypt('foobar'),
            'admin' => true
        ]);

        $strings = ['electronics', 'fashion and beauty', 'home', 'health', 'culture and entertainment',
                 'sport and recreation', 'motorization', 'collections and art'];
        $categories = [];

        for ($i = 0; $i < count($strings); $i++) {
            $categories[] = factory(App\Category::class)->create([
                'name' => $strings[$i]
            ]);
        }

        foreach ($categories as $category) {
            factory(App\Product::class, 3)->create([
               'category_id' => $category->id
            ]);
        }
    }
}
