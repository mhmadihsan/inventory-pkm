<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MasterCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        DB::table('master_category')->insert($this->data());
    }

    private function data(){
        return [
            [
                'sector_id'=>1,
                'name'=>'LAPORAN KESEHATAN ANAK',
                'description'=>'',
                'active'=>1,
            ],
            [
                'sector_id'=>1,
                'name'=>'LAPORAN KESEHATAN IBU',
                'description'=>'',
                'active'=>1,
            ],
            [
                'sector_id'=>1,
                'name'=>'PELAYANAN LANSIA',
                'description'=>'',
                'active'=>1,
            ],
            [
                'sector_id'=>1,
                'name'=>'PELAYANAN USIA ANAK SEKOLAH',
                'description'=>'',
                'active'=>1,
            ],
            [
                'sector_id'=>1,
                'name'=>'KESEHATAN LINGKUNGAN',
                'description'=>'',
                'active'=>1,
            ],
            [
                'sector_id'=>1,
                'name'=>'KESEHATAN KERJA & OLAH RAGA',
                'description'=>'',
                'active'=>1,
            ],
            [
                'sector_id'=>2,
                'name'=>'LAPORAN Seksi Pelayanan Kesehatan Primer dan Rujukan',
                'description'=>'',
                'active'=>1,
            ],
            [
                'sector_id'=>3,
                'name'=>'LAPORAN SUB BAGIAN UMUM KEPEGAWAIAN',
                'description'=>'',
                'active'=>1,
            ],
            [
                'sector_id'=>4,
                'name'=>'LAPORAN SEKSI P2P',
                'description'=>'',
                'active'=>1,
            ],
            [
                'sector_id'=>5,
                'name'=>'LAPORAN SEKSI PROMKES',
                'description'=>'',
                'active'=>1,
            ]
        ];
    }
}
