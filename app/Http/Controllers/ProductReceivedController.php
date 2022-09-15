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

class ProductReceivedController extends Controller
{
    //
    function index()
    {
        $all_supplier_buyer = Supplier::all();
        $all_department = Department::all();
        $all_brand = Brand::all();
        $all_yarn = Yarn::all();
        $all_material = Material::all();
        $all_color = Color::all();
        $add_all_product = ProductFeature::get();
        $cablenames  = ProductReceived::get();
        return view('admin.product-received.index', [
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
        return view('admin.product-received.index', [
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

        return $request;

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
        $dozon = $request->dozon;
        $pices = $request->pices;
        $weight = $request->weight;
        $weight_kg = $request->weight_kg;
        $weight_kg_qty = $request->weight_kg_qty;
        $weight_pound = $request->weight_pound;
        $weight_pound_qty = $request->weight_pound_qty;
        // $weight = $request->weight_ . $form_count;
        // $weight_kg = $request->weight_kg_ . $form_count;
        // $weight_kg_qty = $request->weight_kg_qty_ . $form_count;
        // $weight_pound = $request->weight_pound_ . $form_count;
        // $weight_pound_qty = $request->weight_pound_qty_ . $form_count;
        $cartoon = $request->cartoon;
        $cartoon_small = $request->cartoon_small;
        $cartoon_qty_small = $request->cartoon_qty_small;
        $rate = $request->rate;
        // dd($request);
        for ($i = 0; $i < count($form_count); $i++) {
            if (isset($weight[$i])) {
                $weight = $weight[$i];
            } else {
                $weight = NULL;
            }
            if (isset($weight_kg[$i])) {
                $weight_kg = $weight_kg[$i];
            } else {
                $weight_kg = NULL;
            }
            if (isset($weight_kg_qty[$i])) {
                $weight_kg_qty = $weight_kg_qty[$i];
            } else {
                $weight_kg_qty = NULL;
            }
            if (isset($weight_pound[$i])) {
                $weight_pound = $weight_pound[$i];
            } else {
                $weight_pound = NULL;
            }
            if (isset($weight_pound_qty[$i])) {
                $weight_pound_qty = $weight_pound_qty[$i];
            } else {
                $weight_pound_qty = NULL;
            }
            if (isset($cartoon[$i])) {
                $cartoon = $cartoon[$i];
            } else {
                $cartoon = NULL;
            }
            if (isset($cartoon_small[$i])) {
                $cartoon_small = $cartoon_small[$i];
            } else {
                $cartoon_small = NULL;
            }
            if (isset($cartoon_qty_small[$i])) {
                $cartoon_qty_small = $cartoon_qty_small[$i];
            } else {
                $cartoon_qty_small = NULL;
            }
            if (isset($cartoon_medium[$i])) {
                $cartoon_medium = $cartoon_medium[$i];
            } else {
                $cartoon_medium = NULL;
            }
            if (isset($cartoon_medium_qty[$i])) {
                $cartoon_medium_qty = $cartoon_medium_qty[$i];
            } else {
                $cartoon_medium_qty = NULL;
            }
            if (isset($cartoon_large[$i])) {
                $cartoon_large = $cartoon_large[$i];
            } else {
                $cartoon_large = NULL;
            }
            if (isset($cartoon_large_qty[$i])) {
                $cartoon_large_qty = $cartoon_large_qty[$i];
            } else {
                $cartoon_large_qty = NULL;
            }
            if (isset($cartoon_exrta_large[$i])) {
                $cartoon_exrta_large = $cartoon_exrta_large[$i];
            } else {
                $cartoon_exrta_large = NULL;
            }
            if (isset($cartoon_extar_large_qty[$i])) {
                $cartoon_extar_large_qty = $cartoon_extar_large_qty[$i];
            } else {
                $cartoon_extar_large_qty = NULL;
            }
            if (isset($cartoon_exrta_xxl[$i])) {
                $cartoon_exrta_xxl = $cartoon_exrta_xxl[$i];
            } else {
                $cartoon_exrta_xxl = NULL;
            }
            if (isset($cartoon_extar_large_xxl_qty[$i])) {
                $cartoon_extar_large_xxl_qty = $cartoon_extar_large_xxl_qty[$i];
            } else {
                $cartoon_extar_large_xxl_qty = NULL;
            }
            if (isset($dozon[$i])) {
                $dozon = $dozon[$i];
            } else {
                $dozon_qty = NULL;
            }
            if (isset($dozon_qty[$i])) {
                $dozon_qty = $dozon_qty[$i];
            } else {
                $dozon_qty = NULL;
            }
            if (isset($pices[$i])) {
                $pices = $pices[$i];
            } else {
                $pices = NULL;
            }
            if (isset($pices_qty[$i])) {
                $pices_qty = $pices_qty[$i];
            } else {
                $pices_qty = NULL;
            }
            if (isset($rate[$i])) {
                $rate = $rate[$i];
            } else {
                $rate = NULL;
            }
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
                'dozon_qty' => $dozon_qty,
                'dozon' => $dozon,
                'pices' => $pices,
                'pices_qty' => $pices_qty,
                'rate' => $rate,
                'created_at' => Carbon::now(),
            ]);
        }
    }

    function productFeatureSearchData(Request $request)
    {
        $data = ProductFeature::where('id', $request->product_feature_id)->first();

        return response()->json(['success' =>  $data]);
    }
}
