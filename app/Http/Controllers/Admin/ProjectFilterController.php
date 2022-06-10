<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ProjectFilter;
use Session;
use Image;

class ProjectFilterController extends Controller
{
    public function projectFilter() {
        Session::put('page','projectFilter');
        $projectFilter = ProjectFilter::get()->toArray();
        return view('admin.project_filter.project_filter')->with(compact('projectFilter'));
    }

    public function addEditProjectFilter(Request $request, $id=null) {
        if($id=="") {
            // Add Banner
            $projectFilter = new ProjectFilter;
            $title = "ფილტრის დამატება";
            $message = "ფილტრი წარმატებით დაემატა";
        }else {
            $projectFilter = ProjectFilter::find($id);
//            dd($banner);
            $title = "ფილტრის რედაქტირება";
            $message = "ფილტრი წარმატებით გაახლდა";
        }
        if ($request->isMethod('post')){
            $data = $request->all();
//            dd($data);
//            echo "<pre>"; print_r($data); die;
            $projectFilter->project = $data['project'];
            $projectFilter->floor = $data['floor'];
            $projectFilter->meter = $data['meter'];
            $projectFilter->position = $data['position'];
            $projectFilter->description = $data['description'];
            $projectFilter->price = $data['price'];
            $projectFilter->sell = $data['sell'];

            // Upload project image in project filter
            if($request->hasfile('images')) {
                $image_tmp = $request->file('images');
                if ($image_tmp->isValid()) {
                    // Get Original Image Name
                    $image_name = $image_tmp->getClientOriginalName();
                    // Get Image Extension
                    $extension = $image_tmp->getClientOriginalExtension();
                    // Generate new image name
                    $imageName = $image_name.'-'.rand(111,99999).'.'.$extension;
                    $large_image_path = 'images/projectFilters_images/'.$imageName;
                    // Upload Large Image
                    Image::make($image_tmp)->save($large_image_path);
                    // Save Banner Image in Banners Table
                    $projectFilter->images = $imageName;
                }
            }

            $projectFilter->save();
            session::flash('success_message', $message, $title);
            return redirect('admin/projectFilter');
        }
//        dd($banner);
        return view('admin.project_filter.add_edit_projectFilter',["projectFilter" => $projectFilter, "title"=>$title]);
    }

    public function updateProjectFilterStatus(Request $request) {
        if($request->ajax()) {
            $data = $request->all();
//            echo "<pre>"; print_r($data);die;
            if($data['status']=="Active") {
                $status = 0;
            }else {
                $status = 1;
            }
            ProjectFilter::where('id', $data['projectFilter_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status, 'projectFilter_id'=>$data['projectFilter_id']]);
        }
    }
    public function deleteProjectFilter($id) {
        $projectFilter = ProjectFilter::where('id',$id)->first();
//        dd($projectFilter);

        // Get Project Filter Image Path
        $projectFilter_image_path = 'images/project_filter_images/';

        // Delete Project Filter Image if exists in project filter folder
        if(file_exists($projectFilter_image_path.$projectFilter->image)) {
            unlink($projectFilter_image_path.$projectFilter->image);
        }
        // Delete Project filter from projectFilter table
        ProjectFilter::where('id',$id)->delete();
        session::flash('success_message', 'ფილტრი წარმატებით წაიშალა');
        return redirect()->back();
    }
}
