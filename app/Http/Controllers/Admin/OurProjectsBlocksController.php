<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\OurProjectBlocks;
use Session;
use Image;

class OurProjectsBlocksController extends Controller
{
    public function ourProjectsBlocks() {
        Session::put('page','ourProjectBlock');
        $ourProjectsBlocks = OurProjectBlocks::get()->toArray();
        return view('admin.ourProjectsBlocks.ourProjectsBlocks')->with(compact('ourProjectsBlocks'));
    }

    public function addEditOurProjectsBlocks(Request $request, $id=null) {
        if($id=="") {
            // Add Banner
            $ourProjectsBlocks = new OurProjectBlocks();
            $title = "ბლოკის დამატება";
            $message = "ბლოკი წარმატებით დაემატა";
        }else {
            $ourProjectsBlocks = OurProjectBlocks::find($id);
//            dd($banner);
            $title = "ბლოკის რედაქტირება";
            $message = "ბლოკი წარმატებით გაახლდა";
        }
        if ($request->isMethod('post')){
            $data = $request->all();
//            dd($data);
//            echo "<pre>"; print_r($data); die;
            $ourProjectsBlocks->title = $data['title'];
            $ourProjectsBlocks->description = $data['description'];
            $ourProjectsBlocks->price = $data['price'];

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
                    $large_image_path = 'images/ourProjectsBlocks_images/'.$imageName;
                    // Upload Large Image
                    Image::make($image_tmp)->resize(1903,1047)->save($large_image_path);
                    // Save Banner Image in Banners Table
                    $ourProjectsBlocks->image = $imageName;
                }
            }

            $ourProjectsBlocks->save();
            session::flash('success_message', $message, $title);
            return redirect('admin/ourProjectBlock');
        }
//        dd($banner);
        return view('admin.ourProjectsBlocks.add_edit_ourProjectsBlocks',["ourProjectsBlocks" => $ourProjectsBlocks, "title"=>$title]);
    }

    public function updateOurProjectsBlocksStatus(Request $request) {
        if($request->ajax()) {
            $data = $request->all();
//            echo "<pre>"; print_r($data);die;
            if($data['status']=="Active") {
                $status = 0;
            }else {
                $status = 1;
            }
            OurProjectBlocks::where('id', $data['ourProjectsBlocks_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status, 'ourProjectsBlocks_id'=>$data['ourProjectsBlocks_id']]);
        }
    }

    public function deleteOurProjectBlock($id) {
        $ourProjectsBlock = OurProjectBlocks::where('id',$id)->first();
//        dd($ourProjectsBanner);

        // Get Banner Image Path
        $ourProjectsBlock_image_path = 'images/ourProjectsBlocks_images/';

        // Delete Banner Image if exists in banners folder
        if(file_exists($ourProjectsBlock_image_path.$ourProjectsBlock->image)) {
            unlink($ourProjectsBlock_image_path.$ourProjectsBlock->image);
        }
        // Delete Banner from banners table
        OurProjectBlocks::where('id',$id)->delete();
        session::flash('success_message', 'ბლოკი წარმატებით წაიშალა');
        return redirect()->back();
    }
}
