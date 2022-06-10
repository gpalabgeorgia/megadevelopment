@extends('layouts.admin_layout.admin_layout')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>ჩვენი გუნდი</h1>
                    </div>
                    <div class="col-sm-6">
                        <ul class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">მთავარი</a></li>
                            <li class="breadcrumb-item active">ჩვენი გუნდი</li>
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
                <form name="stafForm" id="stafForm" @if(empty($staf['id'])) action="{{ url('admin/add-edit-staf') }}"
                      @else action="{{ url('admin/add-edit-staf/'.$staf['id']) }}" @endif method="post" enctype="multipart/form-data">@csrf
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">ჩვენი გუნდი</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label for="fullName">სახელი/გვარი</label>
                                        <input type="text" class="form-control" id="fullName" name="fullName" @if(!empty($staf['fullName']))
                                        value="{{ $staf['fullName'] }}" @else value="{{ old('fullName') }}" @endif placeholder="სახელი/გვარი">
                                    </div>
                                    <div class="form-group">
                                        <label for="post">თანამდებობა</label>
                                        <input type="text" class="form-control" id="post" name="post" @if(!empty($staf['post']))
                                        value="{{ $staf['post'] }}" @else value="{{ old('post') }}" @endif placeholder="თანამდებობა">
                                    </div>
                                    <div class="form-group">
                                        <label for="description">აღწერა</label>
                                        <textarea class="form-control" rows="3" placeholder="აღწერა" id="description" name="description">
                                                    @if(!empty($staf['description'])) {{ $staf['description'] }}
                                            @else {{ old('description') }} @endif
                                                </textarea>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-6">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label for="image">პროექტის ფოტო</label>
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
                                        @if(!empty($staf['image']))
                                            <div>
                                                <img src="{{ asset('images/staf_images/'.$staf['image']) }}" style="width: 150px;" alt="">
                                                &nbsp;
                                                <a href="javascript:void(0)" class="confirdDelete" record="ourProjects-image" recordid="{{ $staf['id'] }}">
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
