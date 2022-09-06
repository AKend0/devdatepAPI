<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Country::create(['nombre'=>'Argentina']);
        Country::create(['nombre'=>'Bolivia']);
        Country::create(['nombre'=>'Chile']);
        Country::create(['nombre'=>'Ecuador']);
        Country::create(['nombre'=>'Peru']);
        Country::create(['nombre'=>'Venezuela']);
    }
}
