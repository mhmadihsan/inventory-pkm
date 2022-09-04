<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterSector extends Model
{
    use HasFactory;
    protected $table = 'master_sector';
    protected $fillable = [
        'name',
        'description',
    ];

    public function category(){
        return $this->hasMany(MasterCategory::class,'sector_id','id');
    }

    public function emloyess(){
        return $this->hasMany(MasterEmployess::class,'sector_id','id');
    }

}
