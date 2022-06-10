<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ContactBanner;
use Session;
use Image;

class contactBannerController extends Controller
{
    public function contactBanner() {
        Session::put('page','contactBanner');
        $contactBanner = ContactBanner::get()->toArray();
        return view('admin.contactBanner.contactBanner')->with(compact('contactBanner'));
    }

    public function addEditContactBanner(Request $request, $id=null) {
        if($id=="") {
            // Add Banner
            $contactBanner = new ContactBanner;
            $title = "კონტაქტის ბანერის ფოტოს დამატება";
            $message = "პროექტის ფოტო წარმატებით დაემატა";
        }else {
            $contactBanner = ContactBanner::find($id);
//            dd($banner);
            $title = "კონტაქტის ფოტოს რედაქტირება";
            $message = "კონტაქტის ფოტო წარმატებით გაახლდა";
        }
        if ($request->isMethod('post')){
            $data = $request->all();
//            dd($data);
//            echo "<pre>"; print_r($data); die;
            $contactBanner->title = $data['title'];
            $contactBanner->description = $data['description'];

            // Upload banner image
            if($request->hasfile('image')) {
                $image_tmp = $request->file('image');
                if ($image_tmp->isValid()) {
                    // Get Original Image Name
                    $image_name = $image_tmp->getClientOriginalName();
                    // Get Image Extension
                    $extension = $image_tmp->getClientOriginalExtension();
                    // Generate new image name
                    $imageName = $image_name.'-'.rand(111,99999).'.'.$extension;
                    $large_image_path = 'images/contactBanner_images/'.$imageName;
                    // Upload Large Image
                    Image::make($image_tmp)->resize(1903,1047)->save($large_image_path);
                    // Save Banner Image in Banners Table
                    $contactBanner->image = $imageName;
                }
            }

            $contactBanner->save();
            session::flash('success_message', $message, $title);
            return redirect('admin/contactBanner');
        }
//        dd($banner);
        return view('admin.contactBanner.add_edit_contactBanner',["contactBanner" => $contactBanner, "title"=>$title]);
    }

    // Update Our Projects Sliders status
    public function updateContactBannerStatus(Request $request) {
        if($request->ajax()) {
            $data = $request->all();
//            echo "<pre>"; print_r($data);die;
            if($data['status']=="Active") {
                $status = 0;
            }else {
                $status = 1;
            }
            ContactBanner::where('id', $data['contactBanner_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status, 'contactBanner_id'=>$data['contactBanner_id']]);
        }
    }

    public function deleteContactBanner($id) {
        $contactBanner = ContactBanner::where('id',$id)->first();
//        dd($bannerImage);

        // Get Banner Image Path
        $contactBanner_image_path = 'images/contactBanner_images/';

        // Delete Banner Image if exists in banners folder
        if(file_exists($contactBanner_image_path.$contactBanner->image)) {
            unlink($contactBanner_image_path.$contactBanner->image);
        }
        // Delete Banner from banners table
        ContactBanner::where('id',$id)->delete();
        session::flash('success_message', 'კონტაქტის ბანერი წარმატებით წაიშალა');
        return redirect()->back();
    }
}
