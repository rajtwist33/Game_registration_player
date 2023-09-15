<?php

namespace App\Http\Controllers\Admin;


use App\Models\User;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $page = "Setting";
        return view('backend.pages.setting.index', compact('page'));
    }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        User::find(auth()->user()->id)->update(['password' => Hash::make($request->new_password)]);

        return redirect()->back();
    }
    public function change_profile(Request $request)
    {
        if ($files = $request->file('profile')) {

            if (Auth::user()->id) {
                $data = User::Where('id', Auth::user()->id)->first();
                $image_path = $data->profile_path;

                if (file_exists($image_path)) {
                    unlink($image_path);
                }
            }

            $image_name = md5(rand(1000, 10000));
            $ext = strtolower($files->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $uploade_path = 'uploads/setting/profile/';
            $image_url = $uploade_path . $image_full_name;
            $files->move($uploade_path, $image_full_name);

            User::UpdateOrcreate(
                [
                    'id' => Auth::user()->id,
                ],
                [

                    'image_profile' => $image_full_name,
                    'profile_path' => $image_url,

                ]
            );
        }

        return redirect()->back();
    }
    public function change_logo(Request $request)
    {
        if ($files = $request->file('logo')) {

            if (Auth::user()->id) {
                $data = User::Where('id', Auth::user()->id)->first();
                $image_path = $data->logo_path;
                if (file_exists($image_path)) {
                    unlink($image_path);
                }
            }

            $image_name = md5(rand(1000, 10000));
            $ext = strtolower($files->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $uploade_path = 'uploads/setting/logo/';
            $image_url = $uploade_path . $image_full_name;
            $files->move($uploade_path, $image_full_name);

            User::UpdateOrcreate(
                [
                    'id' => Auth::user()->id,
                ],
                [

                    'logo' => $image_full_name,
                    'logo_path' => $image_url,

                ]
            );
        }
        return redirect()->back();
    }


    public function change_user(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $user->update([
            'company_name' => $request->company_name,
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect()->back();
    }

    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
