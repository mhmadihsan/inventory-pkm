<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TrxArciveFile extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'arcive_file';

    protected $fillable = [
        'year','month','uploaded_at','keterangan','category_id','user_id','name_file','path_file'
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function category(){
        return $this->belongsTo(MasterCategory::class,'category_id','id');
    }
}
