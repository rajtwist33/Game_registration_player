<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Other\Gamecategory;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Admin\Gender;


class GameCategoryController extends Controller
{
    public function index(Request $request)
    {
        $page = "Game Category";
        $title = 'Delete Game Category!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        if ($request->ajax()) {
            $data = Gamecategory::with('gender')->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('gender', function ($data){
                    $gender = $data->gender->name;
                    return $gender;
                })
                ->addColumn('action', function ($row) {
                    $edit = '<a href="' . route('admin.gamecategory.edit', $row->id) . '" class="edit btn btn-primary btn-sm" title="Edit">Edit</a>';
                    $delete =
                        '<a href="' . route('admin.gamecategory.destroy', $row->id) . '"  title="Delete"  data-id="' . $row->id . '"  class="btn btn-danger btn-sm " data-confirm-delete="true">Delete</a>';
                    return  $edit . " " . $delete;
                })
                ->rawColumns(['action', 'gender'])
                ->make(true);
        }

        return view('backend.pages.gamecategory.index', compact('page'));
    }

    public function create()
    {
        $page = "Gamecategory | Create";
        $genders =Gender::all();
        return view('backend.pages.gamecategory.create', compact('page','genders'));
    }


    public function store(Request $request)
    {

            Gamecategory::UpdateOrcreate(
                [
                    'id' => $request->data_id,
                ],
                [
                    'game_name' => $request->game_name,
                    'age_description' => $request->age_description,
                    'gender_id' =>$request->gender_id,
                    'description' =>$request->description,

                ]
            );


        if ($request->data_id != '') {
            Alert::success('SuccessAlert', 'Game Category Updated');
            return redirect()->route('admin.gamecategory.index');
        } else {

            Alert::success('SuccessAlert', 'Game Category Added.');
            return redirect()->route('admin.gamecategory.index');
        }
    }


    public function show(string $id)
    {
        $page = 'Gamecategory | Show';
        $data_lists = Gamecategory::where('slug_display', $id)->first();
        return view('backend.pages.gamecategory.show', compact('page', 'data_lists'));
    }

    public function edit(string $id)
    {
        $page = 'Gamecategory | Edit';
        $genders =Gender::all();
        $data_lists = Gamecategory::with('gender')->Where('id', $id)->first();
        return view('backend.pages.gamecategory.edit', compact('page', 'data_lists','genders'));
    }

    public function update(Request $request, string $id)
    {
        //
    }


    public function destroy(Request $request, $id)
    {
        $data = Gamecategory::Where('id', $id)->delete();
        Alert::success('SuccessAlert', 'Game Category Deleted');
        return back();
    }

}
