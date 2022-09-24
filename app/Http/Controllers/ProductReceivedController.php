<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Color;
use App\Models\Department;
use App\Models\Material;
use App\Models\ProductFeature;
use App\Models\ProductReceived;
use App\Models\Supplier;
use App\Models\Yarn;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
// use Illuminate\Support\Facades\Validator;
use Validator;

class ProductReceivedController extends Controller
{
    //
    function index()
    {
        $all_product_received = ProductReceived::get();
        $all_supplier_buyer = Supplier::all();
        $all_department = Department::all();
        $all_brand = Brand::all();
        $all_yarn = Yarn::all();
        $all_material = Material::all();
        $all_color = Color::all();

        // $all_product_received = ProductReceived::get()->groupBy('received_chalan_id');
        // $all_product_received = ProductReceived::selectRaw('count(*) as total, received_chalan_id')->groupBy('received_chalan_id')->get();
        // return $all_product_received;
        return view('admin.product-received.index', [
            'all_supplier_buyer' => $all_supplier_buyer,
            'all_department' => $all_department,
            'all_brand' => $all_brand,
            'all_yarn' => $all_yarn,
            'all_material' => $all_material,
            'all_color' => $all_color,
            'all_product_received' => $all_product_received,
        ]);
    }

    function product_received_add()
    {
        // return view('admin.product-received.product_received_add');
        $all_supplier_buyer = Supplier::all();
        $all_department = Department::all();
        $all_brand = Brand::all();
        $all_yarn = Yarn::all();
        $all_material = Material::all();
        $all_color = Color::all();
        $add_all_product = ProductFeature::get();
        $cablenames  = ProductReceived::get();
        return view('admin.product-received.product_received_add', [
            'all_supplier_buyer' => $all_supplier_buyer,
            'all_department' => $all_department,
            'all_brand' => $all_brand,
            'all_yarn' => $all_yarn,
            'all_material' => $all_material,
            'all_color' => $all_color,
            'cablenames' => $cablenames,
            'add_all_product' => $add_all_product,
        ]);
    }

    function product_received_store(Request $request)
    {
        // return $request;

        // return $request->yarn_type_id_0;
        $form_count = $request->form_count;
        $product_uid = $request->product_uid;
        $received_chalan_id = $request->received_chalan_id;
        $date = $request->date;
        $product_received = $request->product_received;
        $supplier_buyer_id = $request->supplier_buyer_id;
        $department_id = $request->department_id;
        // $product_name = $request->product_name;
        $validator = Validator::make($request->all(), [
            // 'received_chalan_id' => 'required',
            // 'date' => 'required',
            // 'product_received' => 'required',
            // 'product_name' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors(),
            ]);
        }
        for ($i = 0; $i <= $form_count; $i++) {
            $product_name = "product_name_" . $i;
            $product_name_req = $request->has($product_name);
            if ($product_name_req != NULL) {
                if ($product_name_req) {
                    $product_name = $request->$product_name;
                } else {
                    $product_name = NULL;
                }
                $yarn_type_id = "yarn_type_id_" . $i;

                // dd($request->has($yarn_type_id));

                // return $request->input('yarn_type_id_0');
                // return $request->yarn_type_id_0;
                if ($request->has($yarn_type_id)) {
                    $yarn_type_id = $request->$yarn_type_id;
                    $yarn_type_id_value = 'required';
                    $yarn_type_id_required = "yarn_type_id_" . $i;
                } else {
                    $yarn_type_id_required = $yarn_type_id;
                    $yarn_type_id_value = 'nullable';
                    $yarn_type_id = NULL;
                }
                $material_type_id = "material_type_id_" . $i;
                if ($request->has($material_type_id)) {
                    $material_type_id = $request->$material_type_id;
                    $material_type_id_required =  "material_type_id_" . $i;
                    $material_type_id_value = 'required';
                } else {
                    $material_type_id = NULL;
                    $material_type_id_required =  "material_type_id_" . $i;
                    $material_type_id_value = 'nullable';
                }
                $brand_id = "brand_id_" . $i;
                if ($request->has($brand_id)) {
                    $brand_id = $request->$brand_id;
                    $brand_id_required = "brand_id_" . $i;
                    $brand_id_value = 'required';
                } else {
                    $brand_id = NULL;
                    $brand_id_required = "brand_id_" . $i;
                    $brand_id_value = 'nullable';
                }
                $color_id = "color_id_" . $i;
                if ($request->has($color_id)) {
                    $color_id = $request->$color_id;
                    $color_id_required = "color_id_" . $i;
                    $color_id_value = 'required';
                } else {
                    $color_id = NULL;
                    $color_id_required = "color_id_" . $i;
                    $color_id_value = 'nullable';
                }
                $unit_type = "unit_type_" . $i;
                if ($request->has($unit_type)) {
                    $unit_type = $request->$unit_type;
                } else {
                    $unit_type = NULL;
                }
                $weight = "weight_" . $i;

                if ($request->has($weight)) {
                    $weight = $request->$weight;
                } else {
                    $weight = NULL;
                }

                $weight_kg = "weight_kg_" . $i;
                if ($request->has($weight_kg)) {
                    $weight_kg = $request->$weight_kg;
                } else {
                    $weight_kg = NULL;
                }
                $weight_kg_qty_data = "weight_kg_qty_" . $i;
                if ($request->has($weight_kg_qty_data)) {
                    $weight_kg_qty_required = "weight_kg_qty_" . $i;
                    $weight_kg_qty_value = 'required';
                    $weight_kg_qty = $request->$weight_kg_qty_data;
                } else {
                    $weight_kg_qty = NULL;
                    $weight_kg_qty_required =  "weight_kg_qty_" . $i;
                    $weight_kg_qty_value = 'nullable';
                }

                $weight_pound = "weight_pound_" . $i;
                if ($request->has($weight_pound)) {
                    $weight_pound = $request->$weight_pound;
                } else {
                    $weight_pound = NULL;
                }
                $weight_pound_qty = "weight_pound_qty_" . $i;

                if ($request->has($weight_pound_qty)) {
                    $weight_pound_qty = $request->$weight_pound_qty;
                    $weight_pound_qty_required = "weight_pound_qty_" . $i;
                    $weight_pound_qty_value = 'required';
                } else {
                    $weight_pound_qty = NULL;
                    $weight_pound_qty_required = "weight_pound_qty_" . $i;
                    $weight_pound_qty_value = 'nullable';
                }
                $cartoon = "cartoon_" . $i;
                if ($request->has($cartoon)) {
                    $cartoon = $request->$cartoon;
                } else {
                    $cartoon = NULL;
                }
                $cartoon_small = "cartoon_small_" . $i;
                if ($request->has($cartoon_small)) {
                    $cartoon_small = $request->$cartoon_small;
                } else {
                    $cartoon_small = NULL;
                }
                $cartoon_qty_small = "cartoon_qty_small_" . $i;
                if ($request->has($cartoon_qty_small)) {
                    $cartoon_qty_small = $request->$cartoon_qty_small;
                    $cartoon_qty_small_required = "cartoon_qty_small_" . $i;
                    $cartoon_qty_small_value = 'required';
                } else {
                    $cartoon_qty_small = NULL;
                    $cartoon_qty_small_required = "cartoon_qty_small_" . $i;
                    $cartoon_qty_small_value = 'nullable';
                }
                $cartoon_medium = "cartoon_medium_" . $i;
                if ($request->has($cartoon_medium)) {
                    $cartoon_qty_small = $request->$cartoon_medium;
                } else {
                    $cartoon_medium = NULL;
                }
                $cartoon_medium_qty = "cartoon_medium_qty_" . $i;
                if ($request->has($cartoon_medium_qty)) {
                    $cartoon_medium_qty = $request->$cartoon_medium_qty;
                    $cartoon_medium_qty_required =  "cartoon_medium_qty_" . $i;
                    $cartoon_medium_qty_value = 'required';
                } else {
                    $cartoon_medium_qty = NULL;
                    $cartoon_medium_qty_required =  "cartoon_medium_qty_" . $i;
                    $cartoon_medium_qty_value = 'nullable';
                }
                $cartoon_large = "cartoon_large_" . $i;
                if ($request->has($cartoon_large)) {
                    $cartoon_large = $request->$cartoon_large;
                } else {
                    $cartoon_large = NULL;
                }
                $cartoon_large_qty = "cartoon_large_qty_" . $i;
                if ($request->has($cartoon_medium_qty)) {
                    $cartoon_large_qty = $request->$cartoon_large_qty;
                    $cartoon_large_qty_required = "cartoon_large_qty_" . $i;
                    $cartoon_large_qty_value = 'required';
                } else {
                    $cartoon_large_qty = NULL;
                    $cartoon_large_qty_required = "cartoon_large_qty_" . $i;
                    $cartoon_large_qty_value = 'nullable';
                }
                $cartoon_exrta_large = "cartoon_exrta_large_" . $i;
                if ($request->has($cartoon_exrta_large)) {
                    $cartoon_exrta_large = $request->$cartoon_exrta_large;
                } else {
                    $cartoon_exrta_large = NULL;
                }
                $cartoon_extar_large_qty = "cartoon_extar_large_qty_" . $i;
                if ($request->has($cartoon_extar_large_qty)) {
                    $cartoon_extar_large_qty = $request->$cartoon_extar_large_qty;
                    $cartoon_extar_large_qty_required = "cartoon_extar_large_qty_" . $i;
                    $cartoon_extar_large_qty_value = 'required';
                } else {
                    $cartoon_extar_large_qty = NULL;
                    $cartoon_extar_large_qty_required = "cartoon_extar_large_qty_" . $i;
                    $cartoon_extar_large_qty_value = 'nullable';
                }
                $cartoon_exrta_xxl = "cartoon_exrta_xxl_" . $i;
                if ($request->has($cartoon_exrta_xxl)) {
                    $cartoon_exrta_xxl = $request->$cartoon_exrta_xxl;
                } else {
                    $cartoon_exrta_xxl = NULL;
                }
                $cartoon_extar_large_xxl_qty = "cartoon_extar_large_xxl_qty_" . $i;
                if ($request->has($cartoon_extar_large_xxl_qty)) {
                    $cartoon_extar_large_xxl_qty = $request->$cartoon_extar_large_xxl_qty;
                    $cartoon_extar_large_xxl_qty_required = "cartoon_extar_large_xxl_qty_" . $i;
                    $cartoon_extar_large_xxl_qty_value = 'required';
                } else {
                    $cartoon_extar_large_xxl_qty = NULL;
                    $cartoon_extar_large_xxl_qty_required = "cartoon_extar_large_xxl_qty_" . $i;
                    $cartoon_extar_large_xxl_qty_value = 'nullable';
                }
                $dozon = "dozon_" . $i;
                if (isset($request->$dozon)) {
                    $dozon = $request->$dozon;
                } else {
                    $dozon = NULL;
                }
                $dozon_qty = "dozon_qty_" . $i;
                if ($request->has($dozon_qty)) {
                    $dozon_qty = $request->$dozon_qty;
                    $dozon_qty_required = "dozon_qty_" . $i;
                    $dozon_qty_value = 'required';
                } else {
                    $dozon_qty = NULL;
                    $dozon_qty_required = "dozon_qty_" . $i;
                    $dozon_qty_value = 'nullable';
                }
                $pices = "pices_" . $i;
                if ($request->has($pices)) {
                    $pices = $request->$pices;
                } else {
                    $pices = NULL;
                }
                $pices_qty = "pices_qty_" . $i;
                if ($request->has($pices_qty)) {
                    $pices_qty = $request->$pices_qty;
                    $pices_qty_required =  "pices_qty_" . $i;
                    $pices_qty_value = 'required';
                } else {
                    $pices_qty = NULL;
                    $pices_qty_required =  "pices_qty_" . $i;
                    $pices_qty_value = 'nullable';
                }
                $box = "box_" . $i;
                if ($request->has($box)) {
                    $box = $request->$box;
                } else {
                    $box = NULL;
                }
                $box_qty = "box_qty_" . $i;
                if ($request->has($box_qty)) {
                    $box_qty = $request->$box_qty;
                    $box_qty_required =  "box_qty_" . $i;
                    $box_qty_value = 'required';
                } else {
                    $box_qty = NULL;
                    $box_qty_required =  "box_qty_" . $i;
                    $box_qty_value = 'nullable';
                }
                $roll = "roll_" . $i;
                if ($request->has($roll)) {
                    $roll = $request->$roll;
                } else {
                    $roll = NULL;
                }
                $roll_qty = "roll_qty_" . $i;
                if ($request->has($roll_qty)) {
                    $roll_qty = $request->$roll_qty;
                    $roll_qty_required = "roll_qty_" . $i;
                    $roll_qty_value = 'required';
                } else {
                    $roll_qty = NULL;
                    $roll_qty_required = "roll_qty_" . $i;
                    $roll_qty_value = 'nullable';
                }
                $rate = "rate_" . $i;
                $rate_required = "rate_" . $i;
                if ($request->has($rate)) {
                    $rate = $request->$rate;
                    $rate_required = "rate_" . $i;
                    $rate_qty_value = 'required';
                } else {
                    $rate = NULL;
                    $rate_required = "rate_" . $i;
                    $rate_qty_value = 'nullable';
                }
                $validator = Validator::make($request->all(), [
                    $yarn_type_id_required => $yarn_type_id_value,
                    $material_type_id_required => $material_type_id_value,
                    $brand_id_required => $brand_id_value,
                    $color_id_required => $color_id_value,
                    $weight_kg_qty_required => $weight_kg_qty_value,
                    $weight_pound_qty_required => $weight_pound_qty_value,
                    $cartoon_qty_small_required => $cartoon_qty_small_value,
                    $cartoon_medium_qty_required => $cartoon_medium_qty_value,
                    $cartoon_large_qty_required => $cartoon_large_qty_value,
                    $cartoon_extar_large_qty_required => $cartoon_extar_large_qty_value,
                    $cartoon_extar_large_xxl_qty_required => $cartoon_extar_large_xxl_qty_value,
                    $dozon_qty_required => $dozon_qty_value,
                    $pices_qty_required => $pices_qty_value,
                    $box_qty_required => $box_qty_value,
                    $roll_qty_required => $roll_qty_value,
                    $rate_required => $rate_qty_value,
                ]);
                if ($validator->fails()) {
                    return response()->json([
                        'error' => $validator->errors()->first(),
                    ]);
                }
                ProductReceived::insert([
                    'product_uid' => $request->product_uid,
                    'received_chalan_id' => $request->received_chalan_id,
                    'date' => $request->date,
                    'product_received' => $request->product_received,
                    'supplier_buyer_id' => $request->supplier_buyer_id,
                    'department_id' => $request->department_id,
                    'product_name' => $product_name,
                    'yarn_type_id' => $yarn_type_id,
                    'brand_id' => $brand_id,
                    'color_id' => $color_id,
                    'material_type_id' => $material_type_id,
                    'unit_type' => $unit_type,
                    'weight' => $weight,
                    'weight_kg' => $weight_kg,
                    'weight_kg_qty' => $weight_kg_qty,
                    'weight_pound' => $weight_pound,
                    'weight_pound_qty' => $weight_pound_qty,

                    'cartoon' => $cartoon,
                    'cartoon_small' => $cartoon_small,
                    'cartoon_qty_small' => $cartoon_qty_small,
                    'cartoon_medium' => $cartoon_medium,
                    'cartoon_medium_qty' => $cartoon_medium_qty,
                    'cartoon_large' => $cartoon_large,
                    'cartoon_large_qty' => $cartoon_large_qty,
                    'cartoon_exrta_large' => $cartoon_exrta_large,
                    'cartoon_extar_large_qty' => $cartoon_extar_large_qty,
                    'cartoon_exrta_xxl' => $cartoon_exrta_xxl,
                    'cartoon_extar_large_xxl_qty' => $cartoon_extar_large_xxl_qty,
                    'dozon' => $dozon,
                    'dozon_qty' => $dozon_qty,
                    'pices' => $pices,
                    'pices_qty' => $pices_qty,
                    'box' => $box,
                    'box_qty' => $box_qty,
                    'roll' => $roll,
                    'roll_qty' => $roll_qty,
                    'rate' => $rate,
                    'created_at' => Carbon::now(),
                ]);
            }
            // $notification = array(
            //     'message' => 'Add Product Received Sucessfully!',
            //     'alert-type' => 'success'
            // );
            // // return redirect()->route('product_received_add')->with($notification);
            // return response()->json(['success' => $notification]);
            // else {
            //     return $product_name_req = $request->$product_name;
            // }

            // if (isset($request->$product_name)) {
            //     $product_name = $request->$product_name;
            // } else {
            //     $product_name = NULL;
            // }

            // }
            // $product_null = ProductReceived::select('product_name', 'product_uid')->get();
            // return  $product_null;

            // $product_nulls = ProductReceived::where('product_uid', $product_null->product_uid)->where('product_name', 'null')->get();
            // return $product_nulls;
        }
        // $notification = array(
        //     'message' => 'Add Product Received Sucessfully!',
        //     'alert-type' => 'success'
        // );
        // // return redirect()->route('product_received_add')->with($notification);
        return response()->json(['success' => 'Product Received Sucessfull!!']);
    }

    function productFeatureSearchData(Request $request)
    {
        $data = ProductFeature::where('id', $request->product_feature_id)->first();

        return response()->json(['success' =>  $data]);
    }
    function productReceivedDelete($id)
    {
        // $product_uid = ProductReceived::where('id', $id)->select('product_uid')->get();
        // return $product_uid;
        // return response()->json(['success' => $product_uid]);
        ProductReceived::where('id', $id)->delete();
        return response()->json(['success' => 'Delete sucessfull']);
    }
}
