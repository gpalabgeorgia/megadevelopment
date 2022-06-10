<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Auth;
use App\Admin;
use Hash;
use Image;
use DB;

class AdminController extends Controller
{
    public function dashboard() {
        Session::put('page','dashboard');
        $turn = DB::table("turn")->first();
        $status = $turn->status;
        return view('admin.admin_dashboard')->with(compact('status'));


    }

    public function turnoff() {
        Session::put('page', 'turnoff');
        $exists = DB::table("turn")->first();

        if($exists) {
            DB::table("turn")->where("id", $exists->id)->update(['status' => !$exists->status]);
        } else {
            DB::table("turn")->insert(['status' => true]);
        }
        return redirect()->back();
    }

    public function settings() {
        Session::put('page','settings');
//        Auth::guard('user')->user()->id;
        $adminDetails = Admin::where('email',Auth::guard('admin')->user()->email)->first();
        return view('admin.admin_settings')->with(compact('adminDetails'));
    }

    public function login(Request $request) {
//        echo $password = Hash::make('123456'); die;
        if($request->isMethod('post')) {
            $data = $request->all();
//            echo "<pre>"; print_r($data); die;

           $rules = [
               'email' => 'required|email|max:255',
               'password' => 'required'
            ];
           $customMessages = [
             'email.required' => 'ელ.ფოსტა სავალდებულოა',
             'email.email' => 'შეიყვანეთ ვალიდური ელ.ფოსტა',
             'password.required' => 'პაროლი სავალდებულოა',
           ];
           $this->validate($request,$rules,$customMessages);

            if(Auth::guard('admin')->attempt(['email'=>$data['email'],'password'=>$data['password']])) {
                return redirect('admin/dashboard');
            }else {
                Session::flash('error_message','არასწორი ელ.ფოსტა ან პაროლი');
                return redirect()->back();
            }
        }
        return view('admin.admin_login');
    }

    public function logout() {
        Auth::guard('admin')->logout();
        return redirect('/admin');
    }

    public function chkCurrentPassword(Request $request) {
        $data = $request->all();
//        echo "<pre>"; print_r($data); die;
//        echo Auth::guard('admin')->user()->password(); die;
        if(Hash::check($data['current_pwd'],Auth::guard('admin')->user()->password)) {
            echo "true";
        }else {
            echo "false";
        }
    }

    public function updateCurrentPassword(Request $request) {
        if($request->isMethod('post')) {
            $data = $request->all();
//            echo "<pre>"; print_r($data); die;
            // Check if current password is correct
            if(Hash::check($data['current_pwd'],Auth::guard('admin')->user()->password)) {
                // Check if new and confirm password is correct
                if($data['new_pwd']==$data['confirm_pwd']) {
                    Admin::where('id',Auth::guard('admin')->user()->id)->update(['password'=>bcrypt($data['new_pwd'])]);
                    Session::flash('success_message','პაროლი წარმატებით გაახლდა');
                }else {
                    Session::flash('error_message','ახალი პაროლი და პაროლის დადასტურება არ ემთხვევა ერთმანეთს');
                }
            }else {
                Session::flash('error_message','თქვენი მიმდინარე პაროლი არასწორია');
            }
            return redirect()->back();
        }
    }

    public function updateAdminDetails(Request $request) {
        Session::put('page','update-admin-details');
        if ($request->isMethod('post')) {
            $data = $request->all();
//            echo "<pre>"; print_r($data); die;
            $rulse = [
              'admin_name' => 'required|regex:/^[\pL\s\-]+$/u',
                'admin_mobile' => 'required|numeric',
                'admin_image' => 'image',
            ];

            $customMessages = [
              'admin_name.required' => 'სახელი/გვარი სავალდებულოა',
                'admin_name.regex' => 'შეიყვანეთ ვალიდური სახელი/გვარი',
                'admin_mobile.required' => 'ტელეფონის ნომერი სავალდებულოა',
                'admin_mobile.numeric' => 'შეიყვანეთ ვალიდური ტელეფონის ნომერი',
                'admin_image.image' => 'ატვირთეთ ვალიდური ფოტო',
            ];
            $this->validate($request,$rulse,$customMessages);

            // Upload Image
            if($request->hasFile('admin_image')) {
                $image_tmp = $request->file('admin_image');
                if($image_tmp->isValid()) {
                    // Get Image Extension
                    $extension = $image_tmp->getClientOriginalExtension();
                    // Generate New Imge Name
                    $imageName = rand(11,99999).'.'.$extension;
                    $imagePath = 'images/admin_images/admin_photos/'.$imageName;
                    // Upload the Image
                    Image::make($image_tmp)->save($imagePath);
                }else if(!empty($data['current_admin_image'])) {
                    $imageName = $data['current_admin_image'];
                }else {
                    $imageName = "";
                }
            }
            // Update Admin Details
            Admin::where('email',Auth::guard('admin')->user()->email)->update(['name'=>$data['admin_name'],'mobile'=>$data['admin_mobile'],
                'image'=>$imageName]);
            session::flash('success_message', 'ადმინისტრატორის მონაცემები წარმატებით გაახლდა');
            return redirect()->back();
        }
        return view('admin.update_admin_details');
    }
}
