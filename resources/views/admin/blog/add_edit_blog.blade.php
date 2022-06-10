@extends('layouts.admin_layout.admin_layout')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>სიახლეები</h1>
                    </div>
                    <div class="col-sm-6">
                        <ul class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">მთავარი</a></li>
                            <li class="breadcrumb-item active">სიახლეები</li>
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
                <form name="blogForm" id="blogForm" @if(empty($blog['id'])) action="{{ url('admin/add-edit-blog') }}"
                      @else action="{{ url('admin/add-edit-blog/'.$blog['id']) }}" @endif method="post" enctype="multipart/form-data">@csrf
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">სიახლეები</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label for="image">სიახლის ფოტო</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="image" name="image">
                                                <label class="custom-file-label" for="image">არჩევა</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="">ატვირთვა</span>
                                            </div>
                                        </div>
                                        <div>რეკომენდირებული ზომა: Width: 363, Height: 292</div>
                                        @if(!empty($blog['image']))
                                            <div>
                                                <img src="{{ asset('images/blog_images/'.$blog['image']) }}" style="width: 150px;" alt="">
                                                &nbsp;
                                                <a href="javascript:void(0)" class="confirdDelete" record="ourProjects-image" recordid="{{ $blog['id'] }}">
                                                    წაშლა
                                                </a>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label for="datetime">დამატების თარიღი</label>
                                        <input type="text" class="form-control" id="datetime" name="datetime" @if(!empty($blog['datetime']))
                                        value="{{ $blog['datetime'] }}"  @else value="{{ old('datetime') }}" @endif placeholder="დამატების თარიღი">
                                    </div>
                                    <div class="form-group">
                                        <label for="title">დასათაურება</label>
                                        <input type="text" class="form-control" id="title" name="title" @if(!empty($blog['title']))
                                        value="{{ $blog['title'] }}"  @else value="{{ old('title') }}" @endif placeholder="დასათაურება">
                                    </div>
                                    <div class="form-group">
                                        <label for="description">აღწერა</label>
                                        <textarea class="form-control" rows="3" placeholder="აღწერა" id="description" name="description">
                                                    @if(!empty($blog['description'])) {{ $blog['description'] }}
                                            @else {{ old('description') }} @endif
                                                </textarea>
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
