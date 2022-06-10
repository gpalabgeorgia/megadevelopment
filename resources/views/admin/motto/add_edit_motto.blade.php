@extends('layouts.admin_layout.admin_layout')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>დევიზები</h1>
                    </div>
                    <div class="col-sm-6">
                        <ul class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">მთავარი</a></li>
                            <li class="breadcrumb-item active">დევიზები</li>
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
                <form name="mottoForm" id="mottoForm" @if(empty($motto['id'])) action="{{ url('admin/add-edit-motto') }}"
                      @else action="{{ url('admin/add-edit-motto/'.$motto['id']) }}" @endif method="post" enctype="multipart/form-data">@csrf
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">დევიზები</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label for="title">დევიზები</label>
                                        <input type="text" class="form-control" id="title" name="title" @if(!empty($motto['title'])) value="{{ $motto['title'] }}"
                                               @else value="{{ old('title') }}" @endif placeholder="დევიზი">
                                    </div>
                                    <div class="form-group">
                                        <label for="description">აღწერა</label>
                                        <textarea class="form-control" rows="3" placeholder="აღწერა" id="description" name="description">
                                                    @if(!empty($motto['description'])) {{ $motto['description'] }}
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
