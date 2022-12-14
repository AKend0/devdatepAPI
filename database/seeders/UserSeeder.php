<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Applier;
use App\Models\Turn;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'applier_id'    =>  1,
            'role_id'       =>  1,
            'password'      => bcrypt('laravel')
        ])->assignRole('admin');

        User::create([
            'applier_id'    =>  2,
            'role_id'       =>  1,
            'password'      => bcrypt('laravel')
        ])->assignRole('admin');

        User::create([
            'applier_id'    =>  3,
            'role_id'       =>  1,
            'password'      => bcrypt('laravel')
        ])->assignRole('admin');

        $users = User::factory(30)->create();

        foreach($users as $user)
        {
            $applier = Applier::where('id',$user->applier_id);
            $applier->update([
                'turn_id' => Turn::inRandomOrder()->first()->id,
            ]);
        }
    }
}
