<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Validator;

class BrandController extends Controller
{
    //
    function index()
    {
        // $brand = Brand::find($id);
        $all_brand_name = Brand::all();
        return view('admin.brand.index', compact('all_brand_name'));
    }

    function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'brand_name' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                // 'errors' => 'faild',
                "errors" => $validator->messages()
            ]);
        } else {

            // dd($request);
            $brand = Brand::create([
                'brand_name' => $request->brand_name,
            ]);
            // $notification = array(
            //     'message' => 'Brand Name Add Sucessfully!',
            //     'alert-type' => 'success'
            // );
            // return redirect()->route('brand')->with($notification);
            return response()->json([
                "success" => 'Brand Name Add Sucessfully!',
                "brand" => $brand,
            ]);
            // return redirect()->route('brand')->with($notification);
        }
    }



    function edit($id)
    {
        // dd($request);
        $brand = Brand::find($id);
        return view('admin.brand.edit', compact('brand'));
    }

    function update(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'brand_name' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                "errors" => $validator->messages()
            ]);
        } else {

            $brand = Brand::find($request->id)->update([
                'brand_name' => $request->brand_name,
            ]);
            return response()->json([
                "success" => 'Brand Name Update Sucessfully!',

            ]);
        }
    }

    public function destroy($id)
    {
        // echo $user_id;
        Brand::find($id)->delete();
        return response()->json(['success' => 'Delete sucessfull']);
    }
}
