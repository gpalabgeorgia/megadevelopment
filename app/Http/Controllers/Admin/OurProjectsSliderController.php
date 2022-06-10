<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\OurProjectsSlider;
use Session;
use Image;

class OurProjectsSliderController extends Controller
{
    public function ourProjectsSlider() {
        Session::put('page', 'ourProjectsSlider');
        $ourProjectsSliders = OurProjectsSlider::get()->toArray();
//        echo "<pre>"; print_r($banners); die;
        return view('admin.our_projects_slider.our_projects_slider')->with(compact('ourProjectsSliders'));
    }

    public function addEditOurProjectsSlider(Request $request, $id=null) {
        if($id=="") {
            // Add Banner
            $ourProjectsSlider = new OurProjectsSlider;
            $title = "პროექტის ფოტოს დამატება";
            $message = "პროექტის ფოტო წარმატებით დაემატა";
        }else {
            $ourProjectsSlider = OurProjectsslider::find($id);
//            dd($banner);
            $title = "პროექტის ფოტოს რედაქტირება";
            $message = "პროექტის ფოტო წარმატებით გაახლდა";
        }
        if ($request->isMethod('post')){
            $data = $request->all();
//            dd($data);
//            echo "<pre>"; print_r($data); die;
            $ourProjectsSlider->title = $data['title'];
            $ourProjectsSlider->description = $data['description'];

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
                    $large_image_path = 'images/ourProjectsSlider_images/'.$imageName;
                    // Upload Large Image
                    Image::make($image_tmp)->resize(1903,1047)->save($large_image_path);
                    // Save Banner Image in Banners Table
                    $ourProjectsSlider->image = $imageName;
                }
            }

            $ourProjectsSlider->save();
            session::flash('success_message', $message, $title);
            return redirect('admin/ourProjectsSlider');
        }
//        dd($banner);
        return view('admin.our_projects_slider.add_edit_ourProjectsSlider',["ourProjectsSlider" => $ourProjectsSlider, "title"=>$title]);
    }


    // Update Our Projects Sliders status
    public function updateOurProjectsSlider(Request $request) {
        if($request->ajax()) {
            $data = $request->all();
//            echo "<pre>"; print_r($data);die;
            if($data['status']=="Active") {
                $status = 0;
            }else {
                $status = 1;
            }
            OurProjectsSlider::where('id', $data['ourProjectsSlider_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status, 'ourProjectsSlider_id'=>$data['ourProjectsSlider_id']]);
        }
    }

    public function deleteOurProjectsSlider($id) {
        $ourProjectsSliderImage = OurProjectsSlider::where('id',$id)->first();
//        dd($bannerImage);

        // Get Banner Image Path
        $ourProjectsSlider_image_path = 'images/ourProjectsSlider_images/';

        // Delete Banner Image if exists in banners folder
        if(file_exists($ourProjectsSlider_image_path.$ourProjectsSliderImage->image)) {
            unlink($ourProjectsSlider_image_path.$ourProjectsSliderImage->image);
        }
        // Delete Banner from banners table
        OurProjectsSlider::where('id',$id)->delete();
        session::flash('success_message', 'პროექტი ფოტო წარმატებით წაიშალა');
        return redirect()->back();
    }
}
