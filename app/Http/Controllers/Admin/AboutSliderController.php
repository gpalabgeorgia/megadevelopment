<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\AboutSlider;
use Session;
use Image;

class AboutSliderController extends Controller
{
    public function aboutSlider() {
        Session::put('page','about-slider');
        $aboutSlider = AboutSlider::get()->toArray();
        return view('admin.aboutSlider.about_slider')->with(compact('aboutSlider'));
    }

    // Update About Slider status
    public function updateAboutSlider(Request $request) {
        if($request->ajax()) {
            $data = $request->all();
//            echo "<pre>"; print_r($data);die;
            if($data['status']=="Active") {
                $status = 0;
            }else {
                $status = 1;
            }
            AboutSlider::where('id', $data['aboutSlider_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status, 'aboutSlider_id'=>$data['aboutSlider_id']]);
        }
    }

    public function addEditAboutSlider(Request $request, $id=null) {
        if($id=="") {
            // Add Banner
            $aboutSlider = new AboutSlider();
            $title = "სლაიდერის ფოტოს დამატება";
            $message = "სლაიდერის ფოტო წარმატებით დაემატა";
        }else {
            $aboutSlider = AboutSlider::find($id);
            $title = "სლაიდერის ფოტოს რედაქტირება";
            $message = "სლაიდერის ფოტო წარმატებით გაახლდა";
        }
        if ($request->isMethod('post')){
            $data = $request->all();
            $aboutSlider->title = $data['title'];
            $aboutSlider->description = $data['description'];

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
                    $large_image_path = 'images/aboutSlider_images/'.$imageName;
                    // Upload Large Image
                    Image::make($image_tmp)->resize(1903,1047)->save($large_image_path);
                    // Save Banner Image in Banners Table
                    $aboutSlider->image = $imageName;
                }
            }

            $aboutSlider->save();
            session::flash('success_message', $message, $title);
            return redirect('admin/about-slider');
        }
        return view('admin.aboutSlider.add_edit_aboutSlider',["aboutSlider" => $aboutSlider, "title"=>$title]);
    }

    public function deleteAboutSlider($id) {
        $aboutSliderImage = AboutSlider::where('id',$id)->first();

        // Get Banner Image Path
        $aboutSlider_image_path = 'images/aboutSlider_images/';

        // Delete Banner Image if exists in banners folder
        if(file_exists($aboutSlider_image_path.$aboutSliderImage->image)) {
            unlink($aboutSlider_image_path.$aboutSliderImage->image);
        }
        // Delete Banner from banners table
        AboutSlider::where('id',$id)->delete();
        session::flash('success_message', 'სლაიდერის ფოტო წარმატებით წაიშალა');
        return redirect()->back();
    }
}
