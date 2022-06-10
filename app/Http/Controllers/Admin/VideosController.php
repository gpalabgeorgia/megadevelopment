<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Videos;
use Session;
use Image;

class VideosController extends Controller
{
    public function videos() {
        Session::put('page', 'videos');
        $videos = Videos::get()->toArray();
//        echo "<pre>"; print_r($banners); die;
        return view('admin.videos.videos')->with(compact('videos'));
    }

    // Update Videos Status
    public function updateVideos(Request $request) {
        if($request->ajax()) {
            $data = $request->all();
//            echo "<pre>"; print_r($data);die;
            if($data['status']=="Active") {
                $status = 0;
            }else {
                $status = 1;
            }
            Videos::where('id', $data['ourVideo_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status, 'ourVideo_id'=>$data['ourVideo_id']]);
        }
    }

    // Add Edit Our Videos
    public function addEditOurVideos(Request $request, $id=null) {
        if($id=="") {
            // Add Video
            $ourVideos = new Videos;
//            dd($ourVideos);
            $title = "ვიდეოს დამატება";
            $message = "ვიდეო წარმატებით დაემატა";
        }else {
            $ourVideos = Videos::find($id);
//            dd($ourVideos);
            $title = "ვიდეოს რედაქტირება";
            $message = "ვიდეო წარმატებით გაახლდა";
        }
        if ($request->isMethod('post')){
            $data = $request->all();
//            dd($data);
//            echo "<pre>"; print_r($data); die;
            $ourVideos->title = $data['title'];

            // Upload videos image
            if($request->hasfile('image')) {
                $image_tmp = $request->file('image');
                if ($image_tmp->isValid()) {
                    // Get Original Image Name
                    $image_name = $image_tmp->getClientOriginalName();
                    // Get Image Extension
                    $extension = $image_tmp->getClientOriginalExtension();
                    // Generate new image name
                    $imageName = $image_name.'-'.rand(111,99999).'.'.$extension;
                    $large_image_path = 'images/ourVideos_images/'.$imageName;
                    // Upload Large Image
                    Image::make($image_tmp)->save($large_image_path);
                    // Save Video Image in Videos Table
                    $ourVideos->image = $imageName;
                }
            }

            // Upload Videos
            if($request->hasFile('video')) {
                $video_tmp = $request->file('video');
//                dd($video_tmp);
                if($video_tmp->isValid()) {
                    // Upload Video
                    $video_name = $video_tmp->getClientOriginalName();
                    $extension = $video_tmp->getClientOriginalExtension();
                    $videoName = $video_name.'-'.rand().'.'.$extension;
                    $video_path = 'images/ourVideos_video/';
                    $video_tmp->move($video_path, $videoName);
                    // Save Video in Videos Table
                    $ourVideos->video = $videoName;
                }
            }

            $ourVideos->save();
            session::flash('success_message', $message, $title);
            return redirect('admin/videos');
        }
//        dd($banner);
        return view('admin.videos.add_edit_our_videos',["ourVideos" => $ourVideos, "title"=>$title]);
    }

    // Delete Videos
    public function deleteVideos($id) {
//        echo "<pre>"; print_r($id); die;
        $ourVideo = Videos::where('id',$id)->first();
//        echo "<pre>"; print_r($ourVideo); die;

        // Get Video Path
        $video_path = 'images/ourVideos_images/';

        // Delete Banner Image if exists in banners folder
        if(file_exists($video_path.$ourVideo->video)) {
            unlink($video_path.$ourVideo->video);
        }
        // Delete Banner from banners table
        Videos::where('id',$id)->delete();
        session::flash('success_message', 'ვიდეო წარმატებით წაიშალა');
        return redirect()->back();
    }
}
