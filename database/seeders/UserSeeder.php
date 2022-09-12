<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        $a = User::create([
            'employess_id'=>1,
            'name'=>'SuperAdmin',
            'email'=>'superadmin@si-albumas.com',
            'password'=>bcrypt('inirahasia'),
        ]);
        $a->attachRole('superadmin');

        $a = User::create([
            'employess_id'=>2,
            'name'=>'user1',
            'email'=>'user1@si-albumas.com',
            'password'=>bcrypt('inirahasia'),
        ]);
        $a->attachRole('admin');

        $a = User::create([
            'employess_id'=>3,
            'name'=>'user2',
            'email'=>'user2@si-albumas.com',
            'password'=>bcrypt('inirahasia'),
        ]);
        $a->attachRole('admin');

        $a = User::create([
            'employess_id'=>4,
            'name'=>'user3',
            'email'=>'user3@si-albumas.com',
            'password'=>bcrypt('inirahasia'),
        ]);
        $a->attachRole('admin');


        $a = User::create([
            'employess_id'=>4,
            'name'=>'Eksekutif',
            'email'=>'eksekutif@si-albumas.com',
            'password'=>bcrypt('inirahasia'),
        ]);
        $a->attachRole('eksekutif');
    }
}
