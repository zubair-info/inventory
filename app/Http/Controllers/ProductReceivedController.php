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
use Illuminate\Support\Facades\Validator;

class ProductReceivedController extends Controller
{
    //
    function index()
    {
        // $all_supplier_buyer = Supplier::all();
        // $all_department = Department::all();
        // $all_brand = Brand::all();
        // $all_yarn = Yarn::all();
        // $all_material = Material::all();
        // $all_color = Color::all();
        // $add_all_product = ProductFeature::get();
        $all_product_received = ProductReceived::get();
        return view('admin.product-received.index', [
            // 'all_supplier_buyer' => $all_supplier_buyer,
            // 'all_department' => $all_department,
            // 'all_brand' => $all_brand,
            // 'all_yarn' => $all_yarn,
            // 'all_material' => $all_material,
            // 'all_color' => $all_color,
            // 'add_all_product' => $add_all_product,
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

        $form_count = $request->form_count;
        $product_uid = $request->product_uid;
        $received_chalan_id = $request->received_chalan_id;
        $date = $request->date;
        $product_received = $request->product_received;
        $supplier_buyer_id = $request->supplier_buyer_id;
        $department_id = $request->department_id;
        $product_name = $request->product_name;
        $yarn_type_id = $request->yarn_type_id;
        $brand_id = $request->brand_id;
        $material_type_id = $request->material_type_id;
        $color_id = $request->color_id;
        $unit_type = $request->unit_type;
        $rate = $request->rate;
        for ($i = 0; $i <= $form_count; $i++) {

            $weight = "weight_" . $i;

            if (isset($request->$weight)) {
                $weight = $request->$weight;
            } else {
                $weight = NULL;
            }

            $weight_kg = "weight_kg_" . $i;
            if (isset($request->$weight_kg)) {
                $weight_kg = $request->$weight_kg;
            } else {
                $weight_kg = NULL;
            }
            $weight_kg_qty = "weight_kg_qty_" . $i;
            if (isset($request->$weight_kg_qty)) {
                $weight_kg_qty = $request->$weight_kg_qty;
            } else {
                $weight_kg_qty = NULL;
            }
            $weight_pound = "weight_pound_" . $i;
            if (isset($request->$weight_pound)) {
                $weight_pound = $request->$weight_pound;
            } else {
                $weight_pound = NULL;
            }
            $weight_pound_qty = "weight_pound_qty_" . $i;
            if (isset($request->$weight_pound_qty)) {
                $weight_pound_qty = $request->$weight_pound_qty;
            } else {
                $weight_pound_qty = NULL;
            }
            $cartoon = "cartoon_" . $i;
            if (isset($request->$cartoon)) {
                $cartoon = $request->$cartoon;
            } else {
                $cartoon = NULL;
            }
            $cartoon_small = "cartoon_small_" . $i;
            if (isset($request->$cartoon_small)) {
                $cartoon_small = $request->$cartoon_small;
            } else {
                $cartoon_small = NULL;
            }
            $cartoon_qty_small = "cartoon_qty_small_" . $i;
            if (isset($request->$cartoon_qty_small)) {
                $cartoon_qty_small = $request->$cartoon_qty_small;
            } else {
                $cartoon_qty_small = NULL;
            }
            $cartoon_medium = "cartoon_medium_" . $i;
            if (isset($request->$cartoon_medium)) {
                $cartoon_qty_small = $request->$cartoon_medium;
            } else {
                $cartoon_medium = NULL;
            }
            $cartoon_medium_qty = "cartoon_medium_qty_" . $i;
            if (isset($request->$cartoon_medium_qty)) {
                $cartoon_medium_qty = $request->$cartoon_medium_qty;
            } else {
                $cartoon_medium_qty = NULL;
            }
            $cartoon_large = "cartoon_large_" . $i;
            if (isset($request->$cartoon_large)) {
                $cartoon_large = $request->$cartoon_large;
            } else {
                $cartoon_large = NULL;
            }
            $cartoon_large_qty = "cartoon_large_qty_" . $i;
            if (isset($request->$cartoon_large_qty)) {
                $cartoon_large_qty = $request->$cartoon_large_qty;
            } else {
                $cartoon_large_qty = NULL;
            }
            $cartoon_exrta_large = "cartoon_exrta_large_" . $i;
            if (isset($request->$cartoon_exrta_large)) {
                $cartoon_exrta_large = $request->$cartoon_exrta_large;
            } else {
                $cartoon_exrta_large = NULL;
            }
            $cartoon_extar_large_qty = "cartoon_extar_large_qty_" . $i;
            if (isset($request->$cartoon_extar_large_qty)) {
                $cartoon_extar_large_qty = $request->$cartoon_extar_large_qty;
            } else {
                $cartoon_extar_large_qty = NULL;
            }
            $cartoon_exrta_xxl = "cartoon_exrta_xxl_" . $i;
            if (isset($request->$cartoon_exrta_xxl)) {
                $cartoon_exrta_xxl = $request->$cartoon_exrta_xxl;
            } else {
                $cartoon_exrta_xxl = NULL;
            }
            $cartoon_extar_large_xxl_qty = "cartoon_extar_large_xxl_qty_" . $i;
            if (isset($request->$cartoon_extar_large_xxl_qty)) {
                $cartoon_extar_large_xxl_qty = $request->$cartoon_extar_large_xxl_qty;
            } else {
                $cartoon_extar_large_xxl_qty = NULL;
            }
            $dozon = "dozon_" . $i;
            if (isset($request->$dozon)) {
                $dozon = $request->$dozon;
            } else {
                $dozon = NULL;
            }
            $dozon_qty = "dozon_qty_" . $i;
            if (isset($request->$dozon_qty)) {
                $dozon_qty = $request->$dozon_qty;
            } else {
                $dozon_qty = NULL;
            }
            $pices = "pices_" . $i;
            if (isset($request->$pices)) {
                $pices = $request->$pices;
            } else {
                $pices = NULL;
            }
            $pices_qty = "pices_qty_" . $i;
            if (isset($request->$pices_qty)) {
                $pices_qty = $request->$pices_qty;
            } else {
                $pices_qty = NULL;
            }
            $box = "box_" . $i;
            if (isset($request->$box)) {
                $box = $request->$box;
            } else {
                $box = NULL;
            }
            $box_qty = "box_qty_" . $i;
            if (isset($request->$box_qty)) {
                $box_qty = $request->$box_qty;
            } else {
                $box_qty = NULL;
            }
            $roll = "roll_" . $i;
            if (isset($request->$roll)) {
                $roll = $request->$roll;
            } else {
                $roll = NULL;
            }
            $roll_qty = "roll_qty_" . $i;
            if (isset($request->$roll_qty)) {
                $roll_qty = $request->$roll_qty;
            } else {
                $roll_qty = NULL;
            }

            // $validator = Validator::make($request->all(), [
            //     'received_chalan_id' => 'required',
            //     'product_received' => 'required',
            //     'department_id' => 'required',
            //     'yarn_type_id' => 'required',
            //     'brand_id' => 'required',
            // ]);
            // $validator = Validator::make($request->input());
            // dd($request->input());

            // if ($validator->fails()) {
            //     return response()->json([
            //         'error' => $validator->errors()->all()
            //     ]);
            // }
            // if ($validator->fails()) {
            //     return Response::json(array('edit_errors' => $validator->getMessageBag()->toArray()));
            // }

            ProductReceived::insert([
                'product_uid' => $request->product_uid,
                'received_chalan_id' => $request->received_chalan_id,
                'date' => $request->date,
                'product_received' => $request->product_received,
                'supplier_buyer_id' => $request->supplier_buyer_id,
                'department_id' => $request->department_id,
                'product_name' => $product_name[$i],
                'yarn_type_id' => $yarn_type_id[$i],
                'brand_id' => $brand_id[$i],
                'color_id' => $color_id[$i],
                'material_type_id' => $material_type_id[$i],
                'unit_type' => $unit_type[$i],
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
                'rate' => $rate[$i],
                'created_at' => Carbon::now(),
            ]);
        }

        $notification = array(
            'message' => 'Add Product Received Sucessfully!',
            'alert-type' => 'success'
        );
        // return redirect()->route('product_received_add')->with($notification);
        return response()->json(['success' => $notification]);
    }

    function productFeatureSearchData(Request $request)
    {
        $data = ProductFeature::where('id', $request->product_feature_id)->first();

        return response()->json(['success' =>  $data]);
    }
}
