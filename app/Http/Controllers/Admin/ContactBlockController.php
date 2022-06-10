<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ContactBlock;
use Session;

class ContactBlockController extends Controller
{
    public function contactBlock() {
        Session::put('page','contactBlock');
        $contactBlock = ContactBlock::get()->toArray();
        return view('admin.contactBlock.contactBlock')->with(compact('contactBlock'));
    }

    public function addEditContactBlock(Request $request, $id=null) {
        if($id=="") {
            // Add Contact
            $contactBlock = new ContactBlock;
            $title = "კონტაქტის დამატება";
            $message = "კონტაქტი წარმატებით დაემატა";
        }else {
            $contactBlock = ContactBlock::find($id);
//            dd($banner);
            $title = "კონტაქტის რედაქტირება";
            $message = "კონტაქტი გაახლდა";
        }
        if ($request->isMethod('post')){
            $data = $request->all();
//            dd($data);
//            echo "<pre>"; print_r($data); die;
            $contactBlock->title = $data['title'];
            $contactBlock->address = $data['address'];
            $contactBlock->phone = $data['phone'];
            $contactBlock->email = $data['email'];
            $contactBlock->secondTitle = $data['secondTitle'];

            $contactBlock->save();
            session::flash('success_message', $message, $title);
            return redirect('admin/contactBlock');
        }
//        dd($banner);
        return view('admin.contactBlock.add_edit_contactBlock',["contactBlock" => $contactBlock, "title"=>$title]);
    }

    // Update Contact Block status
    public function updateContactBlockStatus(Request $request) {
        if($request->ajax()) {
            $data = $request->all();
//            echo "<pre>"; print_r($data);die;
            if($data['status']=="Active") {
                $status = 0;
            }else {
                $status = 1;
            }
            ContactBlock::where('id', $data['contactBlock_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status, 'contactBlock_id'=>$data['contactBlock_id']]);
        }
    }

    public function deleteContactBlock($id) {
        $contactBlock = ContactBlock::where('id',$id)->first();
//        dd($bannerImage);

        // Get Banner Image Path
//        $contactBanner_image_path = 'images/contactBanner_images/';

        // Delete Banner Image if exists in banners folder
//        if(file_exists($contactBanner_image_path.$contactBanner->image)) {
//            unlink($contactBanner_image_path.$contactBanner->image);
//        }
        // Delete Banner from banners table
        ContactBlock::where('id',$id)->delete();
        session::flash('success_message', 'კონტაქტის ბლოკი წარმატებით წაიშალა');
        return redirect()->back();
    }
}
