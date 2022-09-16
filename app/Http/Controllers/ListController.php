<?php

namespace App\Http\Controllers;

use App\Models\TrxArciveFile;
use App\Services\ArciveService;
use Illuminate\Http\Request;

class ListController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->tools = new ArciveService();
    }

    public function index(){
        $year = getCureentYear();
        $month = getCureentMonth();
        $category = $this->tools->getCategory();
        return view('list.index',[
            'year'=>$year,
            'month'=>$month,
            'category'=>$category,
            'now'=>now()
        ]);
    }

    public function datalist(Request $request){
        $fil_month = explode(",",$request->month);
        $data = TrxArciveFile::where('year',$request->year)
                                ->whereIn('month',$fil_month)
                                ->orderBy('year', 'ASC')
                                ->orderBy('month', 'ASC')
                                ->with(['user','category'])
                                ->get();
        if($request->category=='xyz'){
            $result = $data;
        }
        else{
            $result = $data->where('category_id',$request->category);
        }
        return view('list._data',[
            'data'=>$result
        ])->with('no',1);
    }
}
