<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Blog;
use Session;
use Image;

class BlogController extends Controller
{
    public function blog() {
        Session::put('page','blog');
        $blog = Blog::get()->toArray();
        return view('admin.blog.blog')->with(compact('blog'));
    }

    public function addEditBlog(Request $request, $id=null) {
        if($id=="") {
            // Add Banner
            $blog = new Blog;
            $title = "სიახლის ფოტოს დამატება";
            $message = "სიახლის ფოტო წარმატებით დაემატა";
        }else {
            $blog = Blog::find($id);
//            dd($banner);
            $title = "სიახლის ფოტოს რედაქტირება";
            $message = "სიახლის ფოტო წარმატებით გაახლდა";
        }
        if ($request->isMethod('post')){
            $data = $request->all();
//            dd($data);
//            echo "<pre>"; print_r($data); die;
            $blog->title = $data['title'];
            $blog->description = $data['description'];
            $blog->datetime = $data['datetime'];

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
                    $large_image_path = 'images/blog_images/'.$imageName;
                    // Upload Large Image
                    Image::make($image_tmp)->resize(1903,1047)->save($large_image_path);
                    // Save Banner Image in Banners Table
                    $blog->image = $imageName;
                }
            }

            $blog->save();
            session::flash('success_message', $message, $title);
            return redirect('admin/blog');
        }
//        dd($banner);
        return view('admin.blog.add_edit_blog',["blog" => $blog, "title"=>$title]);
    }

    // Update Blog status
    public function updateBlogStatus(Request $request) {
        if($request->ajax()) {
            $data = $request->all();
//            echo "<pre>"; print_r($data);die;
            if($data['status']=="Active") {
                $status = 0;
            }else {
                $status = 1;
            }
            Blog::where('id', $data['blog_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status, 'blog_id'=>$data['blog_id']]);
        }
    }

    public function deleteBlog($id) {
        $blogImage = Blog::where('id',$id)->first();
//        dd($bannerImage);

        // Get Blog Image Path
        $blog_image_path = 'images/blog_images/';

        // Delete Banner Image if exists in banners folder
        if(file_exists($blog_image_path.$blogImage->image)) {
            unlink($blog_image_path.$blogImage->image);
        }
        // Delete Banner from banners table
        Blog::where('id',$id)->delete();
        session::flash('success_message', 'ბლოგის ფოტო წარმატებით წაიშალა');
        return redirect()->back();
    }
}
