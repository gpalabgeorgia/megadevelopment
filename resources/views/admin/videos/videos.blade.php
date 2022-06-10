@extends('layouts.admin_layout.admin_layout')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>ვიდეო ბლოკი</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url("/") }}">მთავარი</a></li>
                            <li class="breadcrumb-item active">ვიდეო ბლოკი</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-12">
                    @if(Session::has('success_message'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ Session::get('success_message') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">ვიდეო ბლოკი</h3>
                            <a href="{{ url('admin/add-edit-our-videos') }}" style="max-width: 250px; float: right; display: inline-block;" class="btn btn-block btn-success">
                                ვიდეოს დამატება
                            </a>
                        </div>
                        <div class="card-body">
                            <table id="ourVideo" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>სათაური</th>
                                    <th>ფოტო</th>
                                    <th>ვიდეო</th>
                                    <th>მოქმედებები</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($videos as $video)
                                    <tr>
                                        <td>{{ $video['id'] }}</td>
                                        <td>{{ $video['title'] }}</td>
                                        <td>
                                            <img src="{{ asset('images/ourVideos_images/'.$video['image']) }}" style="width: 250px;" alt="">
                                        </td>
                                        <td>
                                            <video src="{{ asset('images/ourVideos_video/'.$video['video']) }}" controls style="width: 250px;"></video>
                                        </td>
                                        <td>
                                            <a href="{{ url('admin/add-edit-our-videos/'.$video['id']) }}" title="Edit Our Videos"><i class="fas fa-edit"></i></a>
                                            &nbsp;&nbsp;
                                            <a href="javascript:void(0)" title="Delete Our Video" class="confirmDelete" record="ourVideo"
                                               recordid="{{ $video['id'] }}">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                            &nbsp;&nbsp;
                                            @if($video['status']==1)
                                                <a class="updateVideoStatus" id="ourVideo-{{ $video['id'] }}"
                                                   ourVideo_id="{{ $video['id'] }}" href="javascript:void(0)">
                                                    Active
                                                </a>
                                            @else
                                                <a class="updateVideoStatus" id="ourVideo-{{ $video['id'] }}"
                                                   ourVideo_id="{{ $video['id'] }}" href="javascript:void(0)">
                                                    Inactive
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
