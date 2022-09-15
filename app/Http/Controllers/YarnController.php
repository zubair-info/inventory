<?php

namespace App\Http\Controllers;

use App\Models\Yarn;
use Illuminate\Http\Request;
use Validator;

class YarnController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    function index()
    {
        // $brand = Brand::find($id);
        $all_yarn = Yarn::all();
        return view('admin.yarn.index', compact('all_yarn'));
    }

    function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'yarn_name' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' =>  $validator->errors()->all()
            ]);
        }

        Yarn::create([
            'yarn_name' => $request->yarn_name,
        ]);

        return response()->json(['success' => 'yarn created successfully.']);
    }



    function edit($id)
    {
        // dd($request);
        $brand = Yarn::find($id);
        return view('admin.brand.edit', compact('brand'));
    }

    function update(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'yarn_name' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()->all()
            ]);
        }

        Yarn::find($request->id)->update([
            'yarn_name' => $request->yarn_name,
        ]);

        return response()->json(['success' => 'yarn Update successfully.']);
    }

    public function destroy($id)
    {
        // echo $user_id;
        Yarn::find($id)->delete();
        return response()->json(['success' => 'Delete sucessfull']);
    }
}
