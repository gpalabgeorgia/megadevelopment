<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Staf;
use Session;
use Image;

class StafController extends Controller
{
    public function staf() {
        Session::put('page','staf');
        $staf = Staf::get()->toArray();
        return view('admin.staf.staf')->with(compact('staf'));
    }

    public function addEditStaf(Request $request, $id=null) {
        if($id=="") {
            // Add Banner
            $staf = new Staf;
            $title = "სტაფის ფოტოს დამატება";
            $message = "სტაფის ფოტო წარმატებით დაემატა";
        }else {
            $staf = Staf::find($id);
//            dd($banner);
            $title = "სტაფის ფოტოს რედაქტირება";
            $message = "სტაფის ფოტო წარმატებით გაახლდა";
        }
        if ($request->isMethod('post')){
            $data = $request->all();
//            dd($data);
//            echo "<pre>"; print_r($data); die;
            $staf->fullName = $data['fullName'];
            $staf->post = $data['post'];
            $staf->description = $data['description'];

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
                    $large_image_path = 'images/staf_images/'.$imageName;
                    // Upload Large Image
                    Image::make($image_tmp)->save($large_image_path);
                    // Save Banner Image in Banners Table
                    $staf->image = $imageName;
                }
            }

            $staf->save();
            session::flash('success_message', $message, $title);
            return redirect('admin/staf');
        }
//        dd($banner);
        return view('admin.staf.add_edit_staf',["staf" => $staf, "title"=>$title]);
    }

    // Update Staf Status
    public function updateStaStatus(Request $request) {
        if($request->ajax()) {
            $data = $request->all();
//            echo "<pre>"; print_r($data);die;
            if($data['status']=="Active") {
                $status = 0;
            }else {
                $status = 1;
            }
//            echo "<pre>"; print_r($data); die;
            Staf::where('id', $data['sta_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status, 'sta_id'=>$data['sta_id']]);
        }
    }

    public function deleteStaf($id) {
        $stafImage = Staf::where('id',$id)->first();
//        dd($secondBannerImage);

        // Get Banner Image Path
        $staf_image_path = 'images/staf_images/';

        // Delete Banner Image if exists in banners folder
        if(file_exists($staf_image_path.$stafImage->image)) {
            unlink($staf_image_path.$stafImage->image);
        }
        // Delete Banner from banners table
        Staf::where('id',$id)->delete();
        session::flash('success_message', 'სტაფის ფოტო წარმატებით წაიშალა');
        return redirect()->back();
    }
}
