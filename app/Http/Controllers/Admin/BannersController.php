<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Banner;
use Session;
use Image;

class BannersController extends Controller
{
    public function banners() {
        Session::put('page', 'banners');
        $banners = Banner::get()->toArray();
//        echo "<pre>"; print_r($banners); die;
        return view('admin.banners.banners')->with(compact('banners'));
    }

    public function addEditBanner(Request $request, $id=null) {
        if($id=="") {
            // Add Banner
            $banner = new Banner;
            $title = "ბანერის დამატება";
            $message = "ბანერი წარმატებით დაემატა";
        }else {
            $banner = Banner::find($id);
//            dd($banner);
            $title = "ბანერის რედაქტირება";
            $message = "ბანერი წარმატებით გაახლდა";
        }
        if ($request->isMethod('post')){
            $data = $request->all();
//            dd($data);
//            echo "<pre>"; print_r($data); die;
            $banner->title = $data['title'];
            $banner->description = $data['description'];
            $banner->price = $data['price'];

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
                    $large_image_path = 'images/banner_images/'.$imageName;
                    // Upload Large Image
                    Image::make($image_tmp)->resize(1903,1047)->save($large_image_path);
                    // Save Banner Image in Banners Table
                    $banner->image = $imageName;
                }
            }

            $banner->save();
            session::flash('success_message', $message, $title);
            return redirect('admin/banners');
        }
//        dd($banner);
        return view('admin.banners.add_edit_banner',["banner" => $banner, "title"=>$title]);
    }

    public function updateBannerStatus(Request $request) {
        if($request->ajax()) {
            $data = $request->all();
//            echo "<pre>"; print_r($data);die;
            if($data['status']=="Active") {
                $status = 0;
            }else {
                $status = 1;
            }
            Banner::where('id', $data['banner_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status, 'banner_id'=>$data['banner_id']]);
        }
    }
    public function deleteBanner($id) {
        $bannerImage = Banner::where('id',$id)->first();
//        dd($bannerImage);

        // Get Banner Image Path
        $banner_image_path = 'images/banner_images/';

        // Delete Banner Image if exists in banners folder
        if(file_exists($banner_image_path.$bannerImage->image)) {
            unlink($banner_image_path.$bannerImage->image);
        }
        // Delete Banner from banners table
        Banner::where('id',$id)->delete();
        session::flash('success_message', 'ბანერი წარმატებით წაიშალა');
        return redirect()->back();
    }
}
