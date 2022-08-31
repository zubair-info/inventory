<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class CompanyController extends Controller
{
    //
    function index()
    {
        $all_company = Company::get();
        return view('admin.company.index', [
            'all_company' => $all_company
        ]);
    }
    function companyAdd()
    {
        return view('admin.company.add_company');
    }
    function companyStore(Request $request)
    {
        // return $request;
        $company_id = Company::insertGetId([
            'company_name' => $request->company_name,
            'company_phone' => $request->company_phone,
            'company_email' => $request->company_email,
            'company_address' => $request->company_address,
            // 'mobile_logo' => $request->mobile_logo,
            // 'company_logo' => $request->company_logo,
            // 'company_favicon' => $request->company_favicon,
        ]);



        if ($request->mobile_logo) {
            $mobile_logo = $request->mobile_logo;
            $extention_mobile_logo = $mobile_logo->getClientOriginalExtension();
            // echo $extention_mobile_logo;
            $file_name_mobile_logo = $company_id . '.' . $extention_mobile_logo;
            Image::make($mobile_logo)->resize(680, 680)->save(public_path('/uploads/company/' . $file_name_mobile_logo));
            Company::find($company_id)->update([
                'mobile_logo' => $file_name_mobile_logo,
            ]);
        }
        if ($request->company_logo) {
            $company_logo = $request->company_logo;
            // echo $company_logo;
            $extention = $company_logo->getClientOriginalExtension();
            // echo $extention;
            $file_name_company_logo = $company_id . '.' . $extention;
            Image::make($company_logo)->resize(680, 680)->save(public_path('/uploads/company/' . $file_name_company_logo));
            Company::find($company_id)->update([
                'company_logo' => $file_name_company_logo,
            ]);
        }
        if ($request->company_favicon) {
            $company_favicon = $request->company_favicon;
            $extention_company_favicon = $company_favicon->getClientOriginalExtension();
            // echo $extention;
            $file_name_company_favicon = $company_id . '.' . $extention_company_favicon;
            Image::make($company_favicon)->resize(680, 680)->save(public_path('/uploads/company/' . $file_name_company_favicon));
            Company::find($company_id)->update([
                'company_favicon' => $file_name_company_favicon,
            ]);
        }

        // // echo $mobile_logo;
        // $extention_mobile_logo = $mobile_logo->getClientOriginalExtension();
        // // echo $extention_mobile_logo;
        // $file_name_mobile_logo = $company_id . '.' . $extention_mobile_logo;
        // Image::make($mobile_logo)->resize(680, 680)->save(public_path('/uploads/company/' . $file_name_mobile_logo));

        // $company_logo = $request->company_logo;
        // // echo $company_logo;
        // $extention = $company_logo->getClientOriginalExtension();
        // // echo $extention;
        // $file_name_company_logo = $company_id . '.' . $extention;
        // Image::make($company_logo)->resize(680, 680)->save(public_path('/uploads/company/' . $file_name_company_logo));

        // $company_favicon = $request->company_logo;
        // // echo $company_favicon;
        // $extention_company_favicon = $company_favicon->getClientOriginalExtension();
        // // echo $extention;
        // $file_name_company_favicon = $company_id . '.' . $extention_company_favicon;
        // Image::make($company_favicon)->resize(680, 680)->save(public_path('/uploads/company/' . $file_name_company_favicon));

        // Company::find($company_id)->update([
        //     'mobile_logo' => $file_name_mobile_logo,
        //     'company_logo' => $file_name_company_logo,
        //     'company_favicon' => $file_name_company_logo,
        // ]);
        $notification = array(
            'message' => 'Company  Add Sucessfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('company')->with($notification);
    }

    function companyEdit($company_id)
    {
        $all_company = Company::find($company_id);
        return view('admin.company.companyEdit', [
            'all_company' => $all_company
        ]);
    }

    function companyUpdate(Request $request)
    {

        Company::find($request->company_id)->update([
            'company_name' => $request->company_name,
            'company_phone' => $request->company_phone,
            'company_email' => $request->company_email,
            'company_address' => $request->company_address,
        ]);
        if ($request->mobile_logo) {
            $mobile_logo = $request->mobile_logo;
            $extention_mobile_logo = $mobile_logo->getClientOriginalExtension();
            // echo $extention_mobile_logo;
            $file_name_mobile_logo = $request->company_id . '.' . $extention_mobile_logo;
            Image::make($mobile_logo)->resize(680, 680)->save(public_path('/uploads/company/' . $file_name_mobile_logo));
            Company::find($request->company_id)->update([
                'mobile_logo' => $file_name_mobile_logo,
            ]);
        }
        if ($request->company_logo) {
            $company_logo = $request->company_logo;
            // echo $company_logo;
            $extention = $company_logo->getClientOriginalExtension();
            // echo $extention;
            $file_name_company_logo = $request->company_id . '.' . $extention;
            Image::make($company_logo)->resize(680, 680)->save(public_path('/uploads/company/' . $file_name_company_logo));
            Company::find($request->company_id)->update([
                'company_logo' => $file_name_company_logo,
            ]);
        }
        if ($request->company_favicon) {
            $company_favicon = $request->company_favicon;
            $extention_company_favicon = $company_favicon->getClientOriginalExtension();
            // echo $extention;
            $file_name_company_favicon = $request->company_id . '.' . $extention_company_favicon;
            Image::make($company_favicon)->resize(680, 680)->save(public_path('/uploads/company/' . $file_name_company_favicon));
            Company::find($request->company_id)->update([
                'company_favicon' => $file_name_company_favicon,
            ]);
        }
        $notification = array(
            'message' => 'Company  Update Sucessfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('company')->with($notification);
    }

    public function companyDelete($id)
    {
        // echo $user_id;
        Company::find($id)->delete();
        return response()->json(['success' => 'Company Delete sucessfull']);
    }
}
