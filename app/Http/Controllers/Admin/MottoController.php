<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Motto;
use Session;

class MottoController extends Controller
{
    public function motto() {
        Session::put('page','motto');
        $motto = Motto::get()->toArray();
        return view('admin.motto.motto')->with(compact('motto'));
    }

    // Update Staf Status
    public function updateMottoStatus(Request $request) {
        if($request->ajax()) {
            $data = $request->all();
//            echo "<pre>"; print_r($data);die;
            if($data['status']=="Active") {
                $status = 0;
            }else {
                $status = 1;
            }
//            echo "<pre>"; print_r($data); die;
            Motto::where('id', $data['motto_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status, 'motto_id'=>$data['motto_id']]);
        }
    }

    public function addEditMotto(Request $request, $id=null) {
        if($id=="") {
            // Add Video
            $motto = new Motto;
//            dd($ourVideos);
            $title = "დევიზის დამატება";
            $message = "დევიზი წარმატებით დაემატა";
        }else {
            $motto = Motto::find($id);
//            dd($ourVideos);
            $title = "დევიზის რედაქტირება";
            $message = "დევიზი წარმატებით გაახლდა";
        }
        if ($request->isMethod('post')){
            $data = $request->all();
//            dd($data);
//            echo "<pre>"; print_r($data); die;
            $motto->title = $data['title'];
            $motto->description = $data['description'];

            $motto->save();
            session::flash('success_message', $message, $title);
            return redirect('admin/motto');
        }
//        dd($banner);
        return view('admin.motto.add_edit_motto',["motto" => $motto, "title"=>$title]);
    }

    public function deleteMotto($id) {
//        $stafImage = Staf::where('id',$id)->first();
//        dd($secondBannerImage);

        // Get Banner Image Path
//        $staf_image_path = 'images/staf_images/';

        // Delete Banner Image if exists in banners folder
//        if(file_exists($staf_image_path.$stafImage->image)) {
//            unlink($staf_image_path.$stafImage->image);
//        }
        // Delete Banner from banners table
        Motto::where('id',$id)->delete();
        session::flash('success_message', 'სტაფის ფოტო წარმატებით წაიშალა');
        return redirect()->back();
    }
}
