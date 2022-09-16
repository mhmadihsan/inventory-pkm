<?php
function set_active($uri, $output = 'active')
{
 if( is_array($uri) ) {
   foreach ($uri as $u) {
     if (Route::is($u)) {
       return $output;
     }
   }
 } else {
   if (Route::is($uri)){
     return $output;
   }
 }
}

function getCureentYear(){
    return [2021,2022,2023,2024,2025,2026,2027];
}

function getCureentMonth($current=null){
    $data = [
        [
            'id'=>1,
            'name'=>'Januari'
        ],
        [
            'id'=>2,
            'name'=>'Februari'
        ],
        [
            'id'=>3,
            'name'=>'Maret'
        ],
        [
            'id'=>4,
            'name'=>'April'
        ],
        [
            'id'=>5,
            'name'=>'Mei'
        ],
        [
            'id'=>6,
            'name'=>'Juni'
        ],
        [
            'id'=>7,
            'name'=>'Juli'
        ],
        [
            'id'=>8,
            'name'=>'Agustus'
        ],
        [
            'id'=>9,
            'name'=>'September'
        ],
        [
            'id'=>10,
            'name'=>'Oktober'
        ],
        [
            'id'=>11,
            'name'=>'November'
        ],
        [
            'id'=>12,
            'name'=>'Desember'
        ]
    ];
    if($current==null){
        $result = $data;
    }
    else{
        $result = $data[$current-1]['name'] ?? '-';
    }
    return $result;
}

function getIconImage($extention){
    if (str_contains($extention, 'xls')) {
        return 'xls.png';
    }
    else if (str_contains($extention, 'doc')) {
        return 'doc.png';
    }
    else if (str_contains($extention, 'pdf')) {
        return 'pdf.png';
    }
    else {
        return 'file.png';
    }
}
