@extends('layouts.admin_layout.admin_layout')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>ბანერები</h1>
                    </div>
                    <div class="col-sm-6">
                        <ul class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">მთავარი</a></li>
                            <li class="breadcrumb-item active">ბანერები</li>
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
                    <form name="bannerForm" id="bannerForm" @if(empty($banner['id'])) action="{{ url('admin/add-edit-banner') }}"
                          @else action="{{ url('admin/add-edit-banner/'.$banner['id']) }}" @endif method="post" enctype="multipart/form-data">@csrf
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">ბანერები</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                    <div class="row">
                                        <div class="col-12 col-sm-6">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label for="title">ბანერის სახელი</label>
                                                <input type="text" class="form-control" id="title" name="title" @if(!empty($banner['title'])) value="{{ $banner['title'] }}"
                                                       @else value="{{ old('title') }}" @endif placeholder="ბანერის სახელი">
                                            </div>
                                            <div class="form-group">
                                                <label for="description">ბანერის აღწერა</label>
                                                <textarea class="form-control" rows="3" placeholder="ბანერის აღწერა" id="description" name="description">
                                                    @if(!empty($banner['description'])) {{ $banner['description'] }}
                                                    @else {{ old('description') }} @endif
                                                </textarea>
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-6">
                                            <!-- textarea -->
                                            <div class="form-group">
                                                <label for="image">ბანერის ფოტო</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="image" name="image">
                                                        <label class="custom-file-label" for="image">არჩევა</label>
                                                    </div>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text" id="">ატვირთვა</span>
                                                    </div>
                                                </div>
                                                <div>რეკომენდირებული ზომა: Width: 1903, Height: 1047</div>
                                                @if(!empty($banner['image']))
                                                    <div>
                                                        <img src="{{ asset('images/banner_images/'.$banner['image']) }}" style="width: 150px;" alt="">
                                                    &nbsp;
                                                        <a href="javascript:void(0)" class="confirdDelete" record="banner-image" recordid="{{ $banner['id'] }}">
                                                            წაშლა
                                                        </a>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label class="col-form-label" for="price">ბანერის ფასი</label>
                                                <input type="text" class="form-control" @if(!empty($banner['price'])) value="{{ $banner['price'] }}"
                                                       @else value="{{ old('price') }}" @endif placeholder="ბანერის ფასი" id="price" name="price">
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
