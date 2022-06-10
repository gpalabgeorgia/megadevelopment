<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Special;
use Session;

class SpecialController extends Controller
{
    public function special() {
        Session::put('page', 'special');
        $special = Special::get()->toArray();
//        echo "<pre>"; print_r($banners); die;
        return view('admin.special.special')->with(compact('special'));
    }

    // Add Edit Our Videos
    public function addEditSpecial(Request $request, $id=null) {
        if($id=="") {
            // Add Video
            $special = new Special;
//            dd($ourVideos);
            $title = "განსაკუთრებულობის დამატება";
            $message = "განსაკუთრებულობა წარმატებით დაემატა";
        }else {
            $special = Special::find($id);
//            dd($ourVideos);
            $title = "განსაკუთრებულობის რედაქტირება";
            $message = "განსაკუთრებულობა წარმატებით გაახლდა";
        }
        if ($request->isMethod('post')){
            $data = $request->all();
//            dd($data);
//            echo "<pre>"; print_r($data); die;
            $special->title = $data['title'];
            $special->description = $data['description'];

            $special->save();
            session::flash('success_message', $message, $title);
            return redirect('admin/special');
        }
//        dd($banner);
        return view('admin.special.add_edit_special',["special" => $special, "title"=>$title]);
    }

    // Update Videos Status
    public function updateSpecial(Request $request) {
        if($request->ajax()) {
            $data = $request->all();
//            echo "<pre>"; print_r($data);die;
            if($data['status']=="Active") {
                $status = 0;
            }else {
                $status = 1;
            }
            Special::where('id', $data['special_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status, 'special_id'=>$data['special_id']]);
        }
    }

    // Delete Special
    public function deleteSpecial($id) {
//        echo "<pre>"; print_r($id); die;
        $special = Special::where('id',$id)->first();
//        echo "<pre>"; print_r($ourVideo); die;

        // Get Video Path
//        $video_path = 'images/video_images/';

        // Delete Banner Image if exists in banners folder
//        if(file_exists($video_path.$ourVideo->video)) {
//            unlink($video_path.$ourVideo->video);
//        }
        // Delete Banner from banners table
        Special::where('id',$id)->delete();
        session::flash('success_message', 'ვიდეო წარმატებით წაიშალა');
        return redirect()->back();
    }
}
