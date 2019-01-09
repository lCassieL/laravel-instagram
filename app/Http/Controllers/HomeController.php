<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $photos_nosort = DB::table('photos')->get();
        $photos = collect($photos_nosort);
        $photos = $photos->sortByDesc('created_at');
        return view('home', ['photos'=> $photos]);
    }
}
