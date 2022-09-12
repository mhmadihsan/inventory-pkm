<?php

namespace App\Http\Controllers;

use App\Models\MasterEmployess;
use App\Models\TrxArciveFile;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        $user = User::count();
        $emloyess = MasterEmployess::count();
        $arcive_doc = TrxArciveFile::get()->sortByDesc('updated_at')->take(5);
        $arcive = TrxArciveFile::count();
        return view('home',[
            'user'=>$user,
            'employess'=>$emloyess,
            'arcive_doc'=>$arcive_doc,
            'arcive'=>$arcive
        ]);
    }
}
