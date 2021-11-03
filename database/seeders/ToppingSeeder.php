<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ToppingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('topping')->insert(
            [
                [
                    'title' => 'tomato',
                    'price' => 0.5
                ],
                [
                    'title' => 'sliced mushrooms',
                    'price' => 0.5
                ],
                [
                    'title' => 'feta cheese',
                    'price' => 1
                ],
                [
                    'title' => 'sausages',
                    'price' => 1
                ],
                [
                    'title' => 'sliced onion',
                    'price' => 0.5
                ],
                [
                    'title' => 'mozzarella cheese',
                    'price' => 0.3
                ],
                [
                    'title' => 'oregano',
                    'price' => 2
                ],
                [
                    'title' => 'bacon',
                    'price' => 1
                ],
            ]
        );
    }
}
