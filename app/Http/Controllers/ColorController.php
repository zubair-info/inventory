<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;
use Validator;

class ColorController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    function index()
    {
        // $material = material::find($id);
        $all_color = Color::all();
        return view('admin.color.index', compact('all_color'));
    }

    function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'color_name' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' =>  $validator->errors()->all()
            ]);
        }

        Color::create([
            'color_name' => $request->color_name,
        ]);

        return response()->json(['success' => 'Color created successfully.']);
    }



    function edit($id)
    {
        // dd($request);
        $color = Color::find($id);
        return view('admin.color.edit', compact('color'));
    }

    function update(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'color_name' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()->all()
            ]);
        }

        Color::find($request->id)->update([
            'color_name' => $request->color_name,
        ]);

        return response()->json(['success' => 'Color Update successfully.']);
    }

    public function destroy($id)
    {
        // echo $user_id;
        Color::find($id)->delete();
        return response()->json(['success' => 'Delete sucessfull']);
    }
}
