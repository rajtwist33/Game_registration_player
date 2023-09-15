<?php

namespace App\Http\Controllers;

use App\Models\Other\Gamecategory;
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
    public function index()
    {
        $page = "Dashboard";
        $game_category =Gamecategory::all();
        return view('backend.pages.dashboard.index',compact('page','game_category'));
    }
}
