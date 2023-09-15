<?php

namespace App\Http\Controllers\Frontend;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Other\Gamecategory;
use App\Models\Other\Player;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class WebController extends Controller
{
    public function home()
    {
        $gamecategories = Gamecategory::with('gender')->get();
        return view('frontend.pages.home',compact('gamecategories'));
    }
    public function form($id)
    {
        $data = Gamecategory::with('gender')->where('id',$id)->first();
        return view('frontend.pages.form', compact('data'));
    }

    public function submit_from(Request $request)
    {
       $game_id =Gamecategory::where('id',$request->game_id)->select('id','gender_id')->first();
    $check = Player::where('name',$request->name)->where('age',$request->age)->where('game_id',$request->game_id)->exists();

    if(!$check)
    {
        Player::create([
            'name' => $request->name,
            'age' => $request->age,
            'game_id' => $game_id->id,
            'gender_id' =>$game_id->gender_id,
        ]);

      return redirect()->back()->with('success','Player Successfully Registered.');
    }
    else{
        return redirect()->back()->with('error','This Player has Already Registered.');
    }
}

}
