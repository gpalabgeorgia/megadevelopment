<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\OurProjects;
use App\OurProjectsSlider;
use Illuminate\Http\Request;
use Session;
use Image;

class OurProjectsController extends Controller
{
    public function ourProjects() {
        Session::put('page', 'ourProjects');
        $ourProjects = OurProjects::get()->toArray();
//        echo "<pre>"; print_r($banners); die;
        return view('admin.our_projects.our_projects')->with(compact('ourProjects'));
    }

    public function addEditOurProjects(Request $request, $id=null) {
        if($id=="") {
            // Add Banner
            $ourProjects = new OurProjects;
            $title = "პროექტის დამატება";
            $message = "პროექტი წარმატებით დაემატა";
        }else {
            ;$ourProjects = OurProjects::find($id);
//            dd($banner);
            $title = "პროექტის რედაქტირება";
            $message = "პროექტი წარმატებით გაახლდა";
        }
        if ($request->isMethod('post')){
            $data = $request->all();
//            dd($data);
//            echo "<pre>"; print_r($data); die;
            $ourProjects->title = $data['title'];
            $ourProjects->description = $data['description'];

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
                    $large_image_path = 'images/ourProjects_images/'.$imageName;
                    // Upload Large Image
                    Image::make($image_tmp)->save($large_image_path);
                    // Save Banner Image in Banners Table
                    $ourProjects->image = $imageName;
                }
            }

            $ourProjects->save();
            session::flash('success_message', $message, $title);
            return redirect('admin/ourProjects');
        }
//        dd($banner);
        return view('admin.our_projects.add_edit_ourProjects',["ourProjects" => $ourProjects, "title"=>$title]);
    }

    public function updateOurProjects(Request $request) {
        if($request->ajax()) {
            $data = $request->all();
//            echo "<pre>"; print_r($data);die;
            if($data['status']=="Active") {
                $status = 0;
            }else {
                $status = 1;
            }
            OurProjects::where('id', $data['ourProjects_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status, 'ourProjects_id'=>$data['ourProjects_id']]);
        }
    }

    public function deleteOurProjects($id) {
        $ourProjectsImage = OurProjects::where('id',$id)->first();
//        dd($bannerImage);

        // Get Banner Image Path
        $ourProjects_image_path = 'images/ourProjects_images/';

        // Delete Banner Image if exists in banners folder
        if(file_exists($ourProjects_image_path.$ourProjectsImage->image)) {
            unlink($ourProjects_image_path.$ourProjectsImage->image);
        }
        // Delete Banner from banners table
        OurProjects::where('id',$id)->delete();
        session::flash('success_message', 'პროექტი წარმატებით წაიშალა');
        return redirect()->back();
    }
}
