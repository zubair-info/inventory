<?php

namespace App\Http\Controllers;

use App\Models\ProductFeature;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Carbon;

class ProductFeatureController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    function index(Request $request)
    {
        // if ($request->ajax()) {
        //     $add_product_feacture = ProductFeature::select('*');
        //     return Datatables::of($add_product_feacture)
        //         ->addIndexColumn()
        //         ->addColumn('action', function ($row) {

        //             $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';

        //             return $btn;
        //         })
        //         ->rawColumns(['action'])
        //         ->make(true);
        // }

        // return view('users');
        $add_product_feacture = ProductFeature::all();
        return view('admin.product-feacture.index', [
            'add_product_feacture' => $add_product_feacture
        ]);
    }

    function product_feacture_add()
    {
        return view('admin.product-feacture.product_feacture_add');
    }

    function productFeactureStore(Request $request)
    {
        // return $request;
        // print_r( $request->Weight_kg);
        // return $request->Weights_kgs;
        ProductFeature::insert([
            'product_name' => $request->product_name,
            'category' => $request->category,
            'description' => $request->description,
            'yarn_type' => $request->yarn_type,
            'brand' => $request->brand,
            'material_type' => $request->material_type,
            'color' => $request->color,
            'unit_type' => $request->unit_type,
            'weight' => $request->weight,
            'weight_kg' => $request->Weights_kgs,
            'weight_pound' => $request->Weights_pounds,
            'cartoon' => $request->cartoon,
            'cartoon_small' => $request->cartoon_small,
            'cartoon_qty_small' => $request->cartoon_qty_small,
            'cartoon_medium' => $request->cartoon_medium,
            'cartoon_medium_qty' => $request->cartoon_medium_qty,
            'cartoon_large' => $request->cartoon_large,
            'cartoon_large_qty' => $request->cartoon_large_qty,
            'cartoon_exrta_large' => $request->cartoon_exrta_large,
            'cartoon_extar_large_qty' => $request->cartoon_extar_large_qty,
            'cartoon_exrta_xxl' => $request->cartoon_exrta_xxl,
            'cartoon_extar_large_xxl_qty' => $request->cartoon_extar_large_xxl_qty,
            'box' => $request->box,
            'box_qty' => $request->box_qty,
            'dozon' => $request->dozon,
            'dozon_qty' => $request->dozon_qty,
            'pices' => $request->pices,
            'pices_qty' => $request->pices_qty,
            'roll' => $request->roll,
            'roll_qty' => $request->roll_qty,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Product Feacture Add sucessfull!',
            'alert-type' => 'success'
        );
        return redirect()->route('product_feacture')->with($notification);
        // return response()->json(['success' => 'Product Feacture Add sucessfull']);
        // return back();
    }

    function product_feacture_edit($product_feacture_id)
    {
        $add_product_feacture = ProductFeature::where('id', $product_feacture_id)->first();
        // return $add_product_feacture;
        return view('admin.product-feacture.product_feacture_edit', [
            'add_product_feacture' => $add_product_feacture
        ]);
    }
    function productFeactureUpdate(Request $request)
    {
        // return $request;
        ProductFeature::find($request->product_feacture_id)->update([

            'product_name' => $request->product_name,
            'category' => $request->category,
            'description' => $request->description,
            'yarn_type' => $request->yarn_type,
            'brand' => $request->brand,
            'matiral_type' => $request->mterial_type,
            'color' => $request->color,
            'unit_type' => $request->unit_type,
            'weight' => $request->weight,
            'weight_kg' => $request->Weights_kgs,
            'weight_pound' => $request->Weights_pounds,
            'cartoon' => $request->cartoon,
            'cartoon_small' => $request->cartoon_small,
            'cartoon_qty_small' => $request->cartoon_qty_small,
            'cartoon_medium' => $request->cartoon_medium,
            'cartoon_medium_qty' => $request->cartoon_medium_qty,
            'cartoon_large' => $request->cartoon_large,
            'cartoon_large_qty' => $request->cartoon_large_qty,
            'cartoon_exrta_large' => $request->cartoon_exrta_large,
            'cartoon_extar_large_qty' => $request->cartoon_extar_large_qty,
            'cartoon_exrta_xxl' => $request->cartoon_exrta_xxl,
            'cartoon_extar_large_xxl_qty' => $request->cartoon_extar_large_xxl_qty,
            'box' => $request->box,
            'box_qty' => $request->box_qty,
            'dozon' => $request->dozon,
            'dozon_qty' => $request->dozon_qty,
            'pices' => $request->pices,
            'pices_qty' => $request->pices_qty,
            'roll' => $request->roll,
            'roll_qty' => $request->roll_qty,
        ]);
        $notification = array(
            'message' => 'Product Feacture Update sucessfull!',
            'alert-type' => 'success'
        );
        return redirect()->route('product_feacture')->with($notification);
        // return response()->json(['success' => 'Product Feacture Add sucessfull']);
        // return back();
    }

    function productFeactureDelete($id)
    {

        ProductFeature::find($id)->delete();
        return response()->json(['success' => 'Delete sucessfull']);
    }
}
