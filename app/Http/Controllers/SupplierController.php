<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class SupplierController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    function index()
    {
        $all_supplier = Supplier::get();
        return view('admin.supplier.index', [
            'all_supplier' => $all_supplier
        ]);
    }
    function supplierAdd()
    {
        return view('admin.supplier.add_supplier');
    }
    function supplierStore(Request $request)
    {


        // return $request;
        $supplier_id = Supplier::insertGetId([
            'supplier_name' => $request->supplier_name,
            'supplier_phone' => $request->supplier_phone,
            'supplier_email' => $request->supplier_email,
            'supplier_address' => $request->supplier_address,
            'supplier_logo' => 'suplier logo',
        ]);

        if ($request->supplier_logo) {
            $supplier_logo = $request->supplier_logo;
            // echo $supplier_logo;
            $extention = $supplier_logo->getClientOriginalExtension();
            // echo $extention;
            $file_name_supplier_logo = $supplier_id . '.' . $extention;
            Image::make($supplier_logo)->resize(680, 680)->save(public_path('/uploads/supplier/' . $file_name_supplier_logo));
            Supplier::find($supplier_id)->update([
                'supplier_logo' => $file_name_supplier_logo,
            ]);
        }
        $notification = array(
            'message' => 'Supplier  Add Sucessfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('supplier')->with($notification);
    }

    function supplierEdit($supplier_id)
    {
        $all_supplier = Supplier::find($supplier_id);
        return view('admin.supplier.supplierEdit', [
            'all_supplier' => $all_supplier
        ]);
    }

    function supplierUpdate(Request $request)
    {

        Supplier::find($request->supplier_id)->update([
            'supplier_name' => $request->supplier_name,
            'supplier_phone' => $request->supplier_phone,
            'supplier_email' => $request->supplier_email,
            'supplier_address' => $request->supplier_address,
        ]);
        if ($request->supplier_logo) {
            $supplier_logo = $request->supplier_logo;
            // echo $supplier_logo;
            $extention = $supplier_logo->getClientOriginalExtension();
            // echo $extention;
            $file_name_supplier_logo = $request->supplier_id . '.' . $extention;
            Image::make($supplier_logo)->resize(680, 680)->save(public_path('/uploads/supplier/' . $file_name_supplier_logo));
            Supplier::find($request->supplier_id)->update([
                'supplier_logo' => $file_name_supplier_logo,
            ]);
        }
        $notification = array(
            'message' => 'Supplier  Update Sucessfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('supplier')->with($notification);
    }

    public function supplierDelete($id)
    {
        // echo $user_id;
        Supplier::find($id)->delete();
        return response()->json(['success' => 'Supplier Delete sucessfull']);
    }
}
