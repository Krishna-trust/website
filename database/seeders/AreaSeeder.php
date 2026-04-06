<?php

namespace Database\Seeders;

use App\Models\Area;
use Illuminate\Database\Seeder;

class AreaSeeder extends Seeder
{
    public function run()
    {
        $areas = [
            [
                'name' => 'Naranpura',
                'slug' => 'નારણપુરા',
                'short_form' => 'NP',
                'pincode' => '380013'
            ],
            [
                'name' => 'Ghatlodiya',
                'slug' => 'ઘાટલોડિયા',
                'short_form' => 'GL',
                'pincode' => '380061'
            ],
            [
                'name' => 'Nirnay Nagar',
                'slug' => 'નિર્ણયનગર',
                'short_form' => 'NN',
                'pincode' => '380013'
            ],
            [
                'name' => 'Ranip',
                'slug' => 'રાણીપ',
                'short_form' => 'RP',
                'pincode' => '382480'
            ],
            [
                'name' => 'Nava Vadaj',
                'slug' => 'નવા વાડજ',
                'short_form' => 'NV',
                'pincode' => '380013'
            ],
            [
                'name' => 'Chandlodiya',
                'slug' => 'ચાંદલોડિયા',
                'short_form' => 'CL',
                'pincode' => '380013'
            ],
            [
                'name' => 'Gota',
                'slug' => 'ગોતા',
                'short_form' => 'GT',
                'pincode' => '380013'
            ]
        ];

        foreach ($areas as $area) {
            Area::create($area);
        }
    }
}
