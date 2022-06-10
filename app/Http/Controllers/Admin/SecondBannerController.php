<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\SecondBanner;
use Session;
use Image;

class SecondBannerController extends Controller
{
    public function secondBanner() {
        Session::put('page', 'second-banner');
        $secondBanners= SecondBanner::get()->toArray();
        return view('admin.secondBanner.second_banner')->with(compact('secondBanners'));
    }
    // Update Second Banner status
    public function updateSecondBanner(Request $request) {
        if($request->ajax()) {
            $data = $request->all();
//            echo "<pre>"; print_r($data);die;
            if($data['status']=="Active") {
                $status = 0;
            }else {
                $status = 1;
            }
            SecondBanner::where('id', $data['secondBanner_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status, 'secondBanner_id'=>$data['secondBanner_id']]);
        }
    }

    public function addEditSecondBanner(Request $request, $id=null) {
        if($id=="") {
            // Add Banner
            $secondBanner = new SecondBanner;
            $title = "პროექტის ფოტოს დამატება";
            $message = "პროექტის ფოტო წარმატებით დაემატა";
        }else {
            $secondBanner = SecondBanner::find($id);
//            dd($banner);
            $title = "პროექტის ფოტოს რედაქტირება";
            $message = "პროექტის ფოტო წარმატებით გაახლდა";
        }
        if ($request->isMethod('post')){
            $data = $request->all();
//            dd($data);
//            echo "<pre>"; print_r($data); die;
            $secondBanner->title = $data['title'];
            $secondBanner->description = $data['description'];

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
                    $large_image_path = 'images/seccondBanner_images/'.$imageName;
                    // Upload Large Image
                    Image::make($image_tmp)->resize(1903,1047)->save($large_image_path);
                    // Save Banner Image in Banners Table
                    $secondBanner->image = $imageName;
                }
            }

            $secondBanner->save();
            session::flash('success_message', $message, $title);
            return redirect('admin/second-banner');
        }
//        dd($secondBanner);
        return view('admin.secondBanner.add_edit_secondBanner',["secondBanner" => $secondBanner, "title"=>$title]);
    }

    public function deleteSecondBanner($id) {
        $secondBannerImage = SecondBanner::where('id',$id)->first();
//        dd($secondBannerImage);

        // Get Banner Image Path
        $secondBanner_image_path = 'images/secondBanner_images/';

        // Delete Banner Image if exists in banners folder
        if(file_exists($secondBanner_image_path.$secondBannerImage->image)) {
            unlink($secondBanner_image_path.$secondBannerImage->image);
        }
        // Delete Banner from banners table
        SecondBanner::where('id',$id)->delete();
        session::flash('success_message', 'ბანერის ფოტო წარმატებით წაიშალა');
        return redirect()->back();
    }
}
