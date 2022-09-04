<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $a = new Role();
        $a->name = 'superadmin';
        $a->display_name = 'SuperAdmin';
        $a->description = 'The Owners';
        $a->save();

        $a = new Role();
        $a->name = 'admin';
        $a->display_name = 'admin bidang';
        $a->description = 'The supply data';
        $a->save();

        $a = new Role();
        $a->name = 'eksekutif';
        $a->display_name = 'eksekutif';
        $a->description = 'The Viewer eskternal';
        $a->save();
    }
}
