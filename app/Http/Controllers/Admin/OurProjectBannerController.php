<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\OurProjectsBanner;
use Session;
use Image;

class OurProjectBannerController extends Controller
{
    public function ourProjectBanner() {
        Session::put('page','ourProjectBanner');
        $ourProjectBanner = OurProjectsBanner::get()->toArray();
        return view('admin.ourProjectsBanner.ourProjectsBanner')->with(compact('ourProjectBanner'));
    }

    public function addEditOurProjectsBanner(Request $request, $id=null) {
        if($id=="") {
            // Add Banner
            $ourProjectsBanner = new OurProjectsBanner();
            $title = "ბანერის დამატება";
            $message = "ბანერი წარმატებით დაემატა";
        }else {
            $ourProjectsBanner = OurProjectsBanner::find($id);
//            dd($banner);
            $title = "ბანერის რედაქტირება";
            $message = "ბანერი წარმატებით გაახლდა";
        }
        if ($request->isMethod('post')){
            $data = $request->all();
//            dd($data);
//            echo "<pre>"; print_r($data); die;
            $ourProjectsBanner->title = $data['title'];
            $ourProjectsBanner->description = $data['description'];

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
                    $large_image_path = 'images/ourProjectsBanner_images/'.$imageName;
                    // Upload Large Image
                    Image::make($image_tmp)->resize(1903,1047)->save($large_image_path);
                    // Save Banner Image in Banners Table
                    $ourProjectsBanner->image = $imageName;
                }
            }

            $ourProjectsBanner->save();
            session::flash('success_message', $message, $title);
            return redirect('admin/ourProjectBanner');
        }
//        dd($banner);
        return view('admin.ourProjectsBanner.add_edit_ourProjectsBanner',["ourProjectsBanner" => $ourProjectsBanner, "title"=>$title]);
    }

    public function updateOurProjectsBannerStatus(Request $request) {
        if($request->ajax()) {
            $data = $request->all();
//            echo "<pre>"; print_r($data);die;
            if($data['status']=="Active") {
                $status = 0;
            }else {
                $status = 1;
            }
            OurProjectsBanner::where('id', $data['ourProjectsBanner_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status, 'ourProjectsBanner_id'=>$data['ourProjectsBanner_id']]);
        }
    }

    public function deleteOurProjectBanner($id) {
        $ourProjectsBanner = OurProjectsBanner::where('id',$id)->first();
//        dd($ourProjectsBanner);

        // Get Banner Image Path
        $ourProjectsBanner_image_path = 'images/ourProjectsBanner_images/';

        // Delete Banner Image if exists in banners folder
        if(file_exists($ourProjectsBanner_image_path.$ourProjectsBanner->image)) {
            unlink($ourProjectsBanner_image_path.$ourProjectsBanner->image);
        }
        // Delete Banner from banners table
        OurProjectsBanner::where('id',$id)->delete();
        session::flash('success_message', 'ბანერი წარმატებით წაიშალა');
        return redirect()->back();
    }
}
