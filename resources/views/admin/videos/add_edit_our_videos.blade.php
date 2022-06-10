@extends('layouts.admin_layout.admin_layout')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>ვიდეოები</h1>
                    </div>
                    <div class="col-sm-6">
                        <ul class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">მთავარი</a></li>
                            <li class="breadcrumb-item active">ვიდეოები</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if(Session::has('success_message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ Session::get('success_message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                {{--                    {{ dd($banner['description']) }}--}}
                <form name="ourVideos" id="ourVideos" @if(empty($ourVideos['id'])) action="{{ url('admin/add-edit-our-videos') }}"
                      @else action="{{ url('admin/add-edit-our-videos/'.$ourVideos['id']) }}" @endif method="post" enctype="multipart/form-data">@csrf
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">ვიდეოები</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label for="title">სახელი</label>
                                        <input type="text" class="form-control" id="title" name="title" @if(!empty($ourVideos['title'])) value="{{ $ourVideos['title'] }}"
                                               @else value="{{ old('title') }}" @endif placeholder="სახელი">
                                    </div>
                                </div>

                                <div class="col-12 col-sm-6">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label for="image">ფოტო</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="image" name="image">
                                                <label class="custom-file-label" for="image">არჩევა</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="">ატვირთვა</span>
                                            </div>
                                        </div>
                                        <div>რეკომენდირებული ზომა: Width: 655, Height: 436</div>
                                        @if(!empty($ourVideos['image']))
                                            <div>
                                                <img src="{{ asset('images/ourVideos_images/'.$ourVideos['image']) }}" style="width: 150px;" alt="">
                                                &nbsp;
                                                <a href="javascript:void(0)" class="confirdDelete" record="ourVideo-image" recordid="{{ $ourVideos['id'] }}">
                                                    წაშლა
                                                </a>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="ourVideos">ვიდეო</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="video" name="video">
                                                <label class="custom-file-label" for="ourVideos">არჩევა</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="">ატვირთვა</span>
                                            </div>
                                        </div>
                                        <div>რეკომენდირებული ზომა: 40 მეგაბაიტი</div>
                                        @if(!empty($ourVideos['video']))
                                            <div>
                                                <video src="{{ asset('images/ourVideos_video/'.$ourVideos['video']) }}" style="width: 150px;"></video>
                                                &nbsp;
                                                <a href="javascript:void(0)" class="confirmDelete" record="video" recordid="{{ $ourVideos['id'] }}">
                                                    წაშლა
                                                </a>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">დადასტურება</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection
