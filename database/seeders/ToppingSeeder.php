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
                    'name' => 'tomato',
                    'price' => 0.5
                ],
                [
                    'name' => 'sliced mushrooms',
                    'price' => 0.5
                ],
                [
                    'name' => 'feta cheese',
                    'price' => 1
                ],
                [
                    'name' => 'sausages',
                    'price' => 1
                ],
                [
                    'name' => 'sliced onion',
                    'price' => 0.5
                ],
                [
                    'name' => 'mozzarella cheese',
                    'price' => 0.3
                ],
                [
                    'name' => 'oregano',
                    'price' => 2
                ],
                [
                    'name' => 'bacon',
                    'price' => 1
                ],
            ]
        );
    }
}
