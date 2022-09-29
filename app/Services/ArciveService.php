<?php

namespace App\Services;

use App\Models\MasterCategory;
use App\Models\TrxArciveFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArciveService
{
    public function __construct()
    {
        $this->user = Auth::user();
    }

    public function getCategory(){
        $user = Auth::user();
        if($user->hasRole('admin')){
            $category = $user->employess->moresector->map(function ($val){
                                            return $val->category;
                        })->collapse() ?? collect();
        }
        else{
            $category = MasterCategory::get();
        }
        return $category;
    }

    public function StoreArcive(Request $request){
        $store = TrxArciveFile::create([
            'year'=>$request->tahun,
            'month'=>$request->bulan,
            'uploaded_at'=>now(),
            'keterangan'=>$request->keterangan,
            'category_id'=>$request->category,
            'user_id'=>Auth::user()->id,
            'name_file'=>$request->nama_file,
            'path_file'=>self::req_file($request->file)
        ]);
    }

    public function UpdateArcive(Request $request){
        $update = TrxArciveFile::findOrFail($request->id);
        $update->year = $request->tahun;
        $update->month = $request->bulan;
        $update->keterangan = $request->keterangan;
        $update->category_id = $request->category;
        $update->user_id = Auth::user()->id;
        $update->name_file = $request->nama_file;
        if($request->file('file')){
            $update->uploaded_at = now();
            $update->path_file = self::req_file($request->file);
        }
        $update->update();
    }

    private function req_file($file){
        $filenameWithExt = $file->getClientOriginalName();
        //Get just filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        // Get just ext
        $extension = $file->getClientOriginalExtension();
        // Filename to store
        $fileNameToStore = $filename.'_'.time().'.'.$extension;
        // Upload Image
        $path = $file->storeAs('public/arcive',$fileNameToStore);
        return $path;
    }

    public function manipulate($data){
        $user = Auth::user();
        if($user->hasRole('admin')){
//            $data1 = $data->where('user_id',$user->id);
            $result = $data->map(function ($val)use($user){
                $hasil = $val;
                if($val->user_id==$user->id){
                    $hasil->edited = true;
                }
                else{
                    $hasil->edited = false;
                }
                return $hasil;
            });
        }
        elseif($user->hasRole('superadmin')){
            $result = $data->map(function ($val)use($user){
                $hasil = $val;
                $hasil->edited = true;
                return $hasil;
            });
        }
        else{
            $result = $data->map(function ($val)use($user){
                $hasil = $val;
                $hasil->edited = true;
                return $hasil;
            });
        }
        return $result;
    }
}
