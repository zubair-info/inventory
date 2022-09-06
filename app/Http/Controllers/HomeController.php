<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    //user list view
    public function userList()
    {
        $total_user = User::count();
        $all_users = User::Where('id', '!=', Auth::id())->get();
        return view('admin.user.user_list', compact('all_users', 'total_user'));
    }
    //user list view
    public function userEdit($user_id)
    {
        $all_user = User::find($user_id);
        return view('admin.user.userEdit', compact('all_user', 'all_user'));
    }
    // user delete
    public function userDelete($id)
    {
        // echo $user_id;
        User::find($id)->delete();
        return response()->json(['success' => 'User Delete sucessfull']);
    }

    public function userChangeStatus(Request $request)
    {
        // echo $request->status;
        $user = User::find($request->user_id);
        $user->status = $request->status;
        $user->save();
        return response()->json(['success' => 'Status change successfully.']);
    }

    // profile update all from view
    public function profileChange()
    {
        return view('admin.user.profile');
    }

    // profile name change
    public function nameChange(Request $request)
    {
        // print_r($request->all());
        $request->validate([

            'name' => 'required',
        ], [
            'name.required' => 'Name Requried',

        ]);

        User::where('id', Auth::id())->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'updated_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'User Info Update Sucessfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('profile.change')->with($notification);
        // return back()->with('update', 'User Name Update Sucessfully');
    }

    // profile password update
    public  function passwordUpdate(Request $request)
    {
        $request->validate([

            'old_password' => 'required',
            'password' => 'required',
            'password' =>  Password::min(8)
                ->mixedCase()
                ->letters()
                ->numbers()
                ->symbols(),
            'password' => 'confirmed',

        ]);
        if (Hash::check($request->old_password, Auth::user()->password)) {

            if (Hash::check($request->password, Auth::user()->password)) {

                return back()->with('same_pass', 'Old Pass And Current Pass Same');
            } else {

                // echo 'nai';
                User::find(Auth::id())->update([

                    'password' => bcrypt($request->password),
                    'updated_at' => Carbon::now(),

                ]);
                // return back()->with('update', 'Password Update  Sucessfully!!');
                $notification = array(
                    'message' => 'Password Update  Sucessfully!!',
                    'alert-type' => 'success'
                );
                return redirect()->route('profile.change')->with($notification);
            }
        } else {
            // echo 'Old Pass Not Correct';
            return back()->with('wrong_pass', 'Old Pass Not Correct');
        }
    }

    // profile picture update
    public function picture_update(Request $request)
    {
        $request->validate([
            'profile_photo' => 'required|mimes:jpg,jpeg,png',
        ]);
        // print_r($request->all());
        $uploaded_photo = $request->profile_photo;
        $extention = $uploaded_photo->getClientOriginalExtension();
        // echo $extention;
        $filename = Auth::id() . '.' . $extention;
        // echo $filename;
        if (Auth::user()->profile_photo == "defult.jpg") {
            // echo $filename;
            Image::make($uploaded_photo)->save(public_path('/uploads/users/' . $filename));

            DB::table('users')
                ->where('id', Auth::id())
                ->update(['profile_photo' => $filename]);
        } else {

            $delete_form = public_path('uploads/users/' . Auth::user()->profile_photo);
            unlink($delete_form);
            Image::make($uploaded_photo)->save(public_path('/uploads/users/' . $filename));
            DB::table('users')
                ->where('id', Auth::id())
                ->update(['profile_photo' => $filename]);
        }

        $notification = array(
            'message' => 'Profile Update Sucessfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('user')->with($notification);
    }

    function userUpdate(Request $request)
    {
        $user_info = User::where('id', $request->user_id)->first();
        // return $request;

        if ($request->profile_photo) {
            // print_r($request->all());
            $uploaded_photo = $request->profile_photo;
            $extention = $uploaded_photo->getClientOriginalExtension();
            // echo $extention;
            $filename = $request->user_id . '.' . $extention;
            // echo $filename;
            if ($user_info->profile_photo == "defult.jpg") {
                // echo $filename;
                Image::make($uploaded_photo)->save(public_path('/uploads/users/' . $filename));

                DB::table('users')
                    ->where('id', $request->user_id)
                    ->update(['profile_photo' => $filename]);
            } else {

                $delete_form = public_path('uploads/users/' . $user_info->profile_photo);
                unlink($delete_form);
                Image::make($uploaded_photo)->save(public_path('/uploads/users/' . $filename));
                DB::table('users')
                    ->where('id', $request->user_id)
                    ->update(['profile_photo' => $filename]);
            }
        }
        User::where('id', $request->user_id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);
        $notification = array(
            'message' => 'User  Info Update Sucessfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('user')->with($notification);
    }
}
