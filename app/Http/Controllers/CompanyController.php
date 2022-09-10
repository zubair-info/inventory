<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    function index()
    {
        $all_company = Company::first();
        // $all_company = Company::get();
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
        $all_company = Company::select('id')->count();
        if ($all_company < 1) {

            // return $request;
            $company_id = Company::insertGetId([
                'company_name' => $request->company_name,
                'company_phone' => $request->company_phone,
                'company_email' => $request->company_email,
                'company_address' => $request->company_address,
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
            $notification = array(
                'message' => 'Company  Add Sucessfully!',
                'alert-type' => 'success'
            );
            return redirect()->route('company')->with($notification);
        } else {

            return back()->with('message', 'Please update');
        }
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
        // if ($request->mobile_logo) {
        //     $mobile_logo = $request->mobile_logo;
        //     $extention_mobile_logo = $mobile_logo->getClientOriginalExtension();
        //     // echo $extention_mobile_logo;
        //     $file_name_mobile_logo = $request->company_id . '.' . $extention_mobile_logo;
        //     Image::make($mobile_logo)->resize(680, 680)->save(public_path('/uploads/company/' . $file_name_mobile_logo));
        //     Company::find($request->company_id)->update([
        //         'mobile_logo' => $file_name_mobile_logo,
        //     ]);
        // }
        // if ($request->company_logo) {
        //     $company_logo = $request->company_logo;
        //     // echo $company_logo;
        //     $extention = $company_logo->getClientOriginalExtension();
        //     // echo $extention;
        //     $file_name_company_logo = $request->company_id . '.' . $extention;
        //     Image::make($company_logo)->resize(680, 680)->save(public_path('/uploads/company/' . $file_name_company_logo));
        //     Company::find($request->company_id)->update([
        //         'company_logo' => $file_name_company_logo,
        //     ]);
        // }
        // if ($request->company_favicon) {
        //     $company_favicon = $request->company_favicon;
        //     $extention_company_favicon = $company_favicon->getClientOriginalExtension();
        //     // echo $extention;
        //     $file_name_company_favicon = $request->company_id . '.' . $extention_company_favicon;
        //     Image::make($company_favicon)->resize(680, 680)->save(public_path('/uploads/company/' . $file_name_company_favicon));
        //     Company::find($request->company_id)->update([
        //         'company_favicon' => $file_name_company_favicon,
        //     ]);
        // }
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

    function logoCompanyUpdate(Request $request)
    {
        $all_company = Company::where('id', $request->company_id)->first();
        if ($request->company_logo) {
            $company_logo = $request->company_logo;
            $extention = $company_logo->getClientOriginalExtension();
            $file_name_company_logo = $request->company_id . '.' . $extention;
            // echo $file_name_company_logo;
            if ($all_company->company_logo == "logo.png") {

                Image::make($company_logo)->save(public_path('/uploads/company/' . $file_name_company_logo));

                Company::where('id', $request->company_id)->update([
                    'company_logo' => $file_name_company_logo,
                ]);
            } else {
                $company_logo = $request->company_logo;
                // echo $company_logo;
                $extention = $company_logo->getClientOriginalExtension();
                // echo $extention;
                $file_name_company_logo = $request->company_id . '.' . $extention;

                $delete_form = public_path('uploads/company/' . $all_company->company_logo);
                unlink($delete_form);
                Image::make($company_logo)->resize(680, 680)->save(public_path('/uploads/company/' . $file_name_company_logo));
                Company::where('id', $request->company_id)->update([
                    'company_logo' => $file_name_company_logo,
                ]);
            }
        }

        $notification = array(
            'message' => 'Company Logo Update Sucessfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('company')->with($notification);
    }
    function mobilelogoCompanyUpdate(Request $request)
    {

        $all_company = Company::where('id', $request->company_id)->first();
        if ($request->mobile_logo) {
            $mobile_logo = $request->mobile_logo;
            $extention_mobile_logo = $mobile_logo->getClientOriginalExtension();
            // echo $extention_mobile_logo;
            $file_name_mobile_logo = $request->company_id . '.' . $extention_mobile_logo;


            // echo $file_name_company_logo;
            if ($all_company->mobile_logo == "mobilelogo.png") {
                if ($all_company->mobile_logo == "mobilelogo.png") {

                    Image::make($mobile_logo)->resize(680, 680)->save(public_path('/uploads/company/' . $file_name_mobile_logo));

                    Company::where('id', $request->company_id)->update([
                        'mobile_logo' => $file_name_mobile_logo,
                    ]);
                } else {

                    $delete_form = public_path('uploads/company/' . $all_company->mobile_logo);
                    unlink($delete_form);
                    Image::make($mobile_logo)->resize(680, 680)->save(public_path('/uploads/company/' . $file_name_mobile_logo));

                    Company::where('id', $request->company_id)->update([
                        'mobile_logo' => $file_name_mobile_logo,
                    ]);
                }
            }
            $notification = array(
                'message' => 'Company Mobile Logo Update Sucessfully!',
                'alert-type' => 'success'
            );
            return redirect()->route('company')->with($notification);
        }
    }

    function favIconCompanyUpdate(Request $request)
    {
        // echo $request->company_favicon;
        $all_company = Company::where('id', $request->company_id)->first();
        if ($request->company_favicon) {
            $company_favicon = $request->company_favicon;
            $extention_company_favicon = $company_favicon->getClientOriginalExtension();

            $file_name_company_favicon = $request->company_id . '.' . $extention_company_favicon;

            if ($all_company->company_favicon == "favlogo.png") {

                Image::make($company_favicon)->resize(680, 680)->save(public_path('/uploads/company/' . $file_name_company_favicon));
                Company::find($request->company_id)->update([
                    'company_favicon' => $file_name_company_favicon,
                ]);
            } else {
                $delete_form = public_path('uploads/company/' . $all_company->mobile_logo);
                unlink($delete_form);
                Image::make($company_favicon)->resize(680, 680)->save(public_path('/uploads/company/' . $file_name_company_favicon));
                Company::find($request->company_id)->update([
                    'company_favicon' => $file_name_company_favicon,
                ]);
            }
        }
        $notification = array(
            'message' => 'Company Fav Icon Update Sucessfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('company')->with($notification);
    }
}
