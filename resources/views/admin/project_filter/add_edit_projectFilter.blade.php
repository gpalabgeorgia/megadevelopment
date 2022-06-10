@extends('layouts.admin_layout.admin_layout')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>პროექტების ფილტრები</h1>
                    </div>
                    <div class="col-sm-6">
                        <ul class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">მთავარი</a></li>
                            <li class="breadcrumb-item active">პროექტების ფილტრები</li>
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
                <form name="projectFilterForm" id="projectFilterForm" @if(empty($projectFilter['id'])) action="{{ url('admin/add-edit-projectFilter') }}"
                      @else action="{{ url('admin/add-edit-projectFilter/'.$projectFilter['id']) }}" @endif method="post" enctype="multipart/form-data">@csrf
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">პროექტების ფილტრები</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label for="project">პროექტის სახელი</label>
                                        <input type="text" class="form-control" id="project" name="project" @if(!empty($projectFilter['project']))
                                        value="{{ $projectFilter['project'] }}"
                                               @else value="{{ old('project') }}" @endif placeholder="პროექტის სახელი">
                                    </div>
                                    <div class="form-group">
                                        <label for="floor">სართული</label>
                                        <input type="text" class="form-control" id="floor" name="floor" @if(!empty($projectFilter['floor']))
                                        value="{{ $projectFilter['floor'] }}"
                                               @else value="{{ old('floor') }}" @endif placeholder="სართული">
                                    </div>
                                    <div class="form-group">
                                        <label for="meter">კვადრატულობა</label>
                                        <input type="text" class="form-control" id="meter" name="meter" @if(!empty($projectFilter['meter']))
                                        value="{{ $projectFilter['meter'] }}"
                                               @else value="{{ old('meter') }}" @endif placeholder="კვადრატულობა">
                                    </div>
                                    <div class="form-group">
                                        <label for="position">მდგომარეობა</label>
                                        <input type="text" class="form-control" id="position" name="position" @if(!empty($projectFilter['position']))
                                        value="{{ $projectFilter['position'] }}"
                                               @else value="{{ old('position') }}" @endif placeholder="მდგომარეობა">
                                    </div>

                                </div>

                                <div class="col-12 col-sm-6">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label for="price">ფასი</label>
                                        <input type="text" class="form-control" id="price" name="price" @if(!empty($projectFilter['price']))
                                        value="{{ $projectFilter['price'] }}"
                                               @else value="{{ old('price') }}" @endif placeholder="ფასი">
                                    </div>
                                    <div class="form-group">
                                        <label for="sell">სტატუსი</label>
                                        <input type="text" class="form-control" id="sell" name="sell" @if(!empty($projectFilter['sell']))
                                        value="{{ $projectFilter['sell'] }}"
                                               @else value="{{ old('sell') }}" @endif placeholder="სტატუსი">
                                    </div>
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
                                        <div>რეკომენდირებული ზომა: Width: 363, Height: 292</div>
                                        @if(!empty($projectFilter['images']))
                                            <div>
                                                <img src="{{ asset('images/projectFilters_images/'.$projectFilter['images']) }}" style="width: 150px;" alt="">
                                                &nbsp;
                                                <a href="javascript:void(0)" class="confirmdDelete" record="projectFilter-images"
                                                   recordid="{{ $projectFilter['id'] }}">
                                                    წაშლა
                                                </a>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="description">აღწერა</label>
                                        <textarea class="form-control" rows="3" placeholder="აღწერა" id="description" name="description">
                                                    @if(!empty($projectFilter['description'])) {{ $projectFilter['description'] }}
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
