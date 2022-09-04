<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MasterSectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('master_sector')->insert($this->data());
    }

    public function data(){
        return [
            [
                'name'=>'SEKSI KESEHATAN MASYARAKAT',
                'description'=>'untuk file-file di SEKSI KESEHATAN MASYARAKAT',
            ],
            [
                'name'=>'SEKSI PELAYANAN KESEHATAN PRIMA DAN RUJUKAN',
                'description'=>'untuk file-file di SEKSI PELAYANAN KESEHATAN PRIMA DAN RUJUKAN',
            ],
            [
                'name'=>'SUB BAGIAN UMUM KEPEGAWAIAN',
                'description'=>'untuk file-file di SUB BAGIAN UMUM KEPEGAWAIAN',
            ],
            [
                'name'=>'SEKSI P2P',
                'description'=>'untuk file-file di SEKSI P2P',
            ],
            [
                'name'=>'SEKSI PROMKES',
                'description'=>'untuk file-file di SEKSI PROMKES',
            ],

        ];
    }
}
