<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\BlogBanner;
use Session;
use Image;

class BlogBannerController extends Controller
{
    public function blogBanner() {
        Session::put('page', 'blogBanner');
        $blogBanner = BlogBanner::get();
        return view('admin.blogBanners.blogBanner')->with(compact($blogBanner));
    }

    public function addEditBlogBanner(Request $request, $id=null) {
        if($id=="") {
            // Add Banner
            $blogBanner = new BlogBanner();
            $title = "ბანერის დამატება";
            $message = "ბანერი წარმატებით დაემატა";
        }else {
            $blogBanner = BlogBanner::find($id);
//            dd($banner);
            $title = "ბანერის რედაქტირება";
            $message = "ბანერი წარმატებით გაახლდა";
        }
        if ($request->isMethod('post')){
            $data = $request->all();
//            dd($data);
//            echo "<pre>"; print_r($data); die;
            $blogBanner->title = $data['title'];
            $blogBanner->description = $data['description'];

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
                    $large_image_path = 'images/blogBanner_images/'.$imageName;
                    // Upload Large Image
                    Image::make($image_tmp)->save($large_image_path);
                    // Save Banner Image in Banners Table
                    $blogBanner->image = $imageName;
                }
            }

            $blogBanner->save();
            session::flash('success_message', $message, $title);
            return redirect('admin/blogBanner');
        }
//        dd($banner);
        return view('admin.blogBanners.add_edit_blogBanner',["blogBanner" => $blogBanner, "title"=>$title]);
    }

    public function updateBlogBannerStatus(Request $request) {
        if($request->ajax()) {
            $data = $request->all();
//            echo "<pre>"; print_r($data);die;
            if($data['status']=="Active") {
                $status = 0;
            }else {
                $status = 1;
            }
            BlogBanner::where('id', $data['blogBanner_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status, 'blogBanner_id'=>$data['blogBanner_id']]);
        }
    }

    public function deleteBlogBanner($id) {
        $bannerImage = BlogBanner::where('id',$id)->first();
//        dd($bannerImage);

        // Get Banner Image Path
        $banner_image_path = 'images/blogBanner_images/';

        // Delete Banner Image if exists in banners folder
        if(file_exists($banner_image_path.$bannerImage->image)) {
            unlink($banner_image_path.$bannerImage->image);
        }
        // Delete Banner from banners table
        BlogBanner::where('id',$id)->delete();
        session::flash('success_message', 'ბანერი წარმატებით წაიშალა');
        return redirect()->back();
    }
}
