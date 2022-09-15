<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;
use Validator;


class MaterialController extends Controller
{
    //
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    function index()
    {
        // $material = material::find($id);
        $all_material = Material::all();
        return view('admin.material.index', compact('all_material'));
    }

    function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'material_name' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' =>  $validator->errors()->all()
            ]);
        }

        Material::create([
            'material_name' => $request->material_name,
        ]);

        return response()->json(['success' => 'yarn created successfully.']);
    }



    function edit($id)
    {
        // dd($request);
        $material = Material::find($id);
        return view('admin.material.edit', compact('material'));
    }

    function update(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'material_name' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()->all()
            ]);
        }

        Material::find($request->id)->update([
            'material_name' => $request->material_name,
        ]);

        return response()->json(['success' => 'yarn Update successfully.']);
    }

    public function destroy($id)
    {
        // echo $user_id;
        Material::find($id)->delete();
        return response()->json(['success' => 'Delete sucessfull']);
    }
}
