@extends('layouts.admin_layout.admin_layout')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>კონტაქტის ბლოკი</h1>
                    </div>
                    <div class="col-sm-6">
                        <ul class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">მთავარი</a></li>
                            <li class="breadcrumb-item active">კონტაქტის ბლოკი</li>
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
                <form name="contactBlockForm" id="contactBlockForm" @if(empty($contactBlock['id'])) action="{{ url('admin/add-edit-contactBlock') }}"
                      @else action="{{ url('admin/add-edit-contactBlock/'.$contactBlock['id']) }}" @endif method="post" enctype="multipart/form-data">@csrf
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">კონტაქტის ბლოკი</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label for="title">დასათაურება</label>
                                        <input type="text" class="form-control" id="title" name="title" @if(!empty($contactBlock['title']))
                                        value="{{ $contactBlock['title'] }}"
                                               @else value="{{ old('title') }}" @endif placeholder="დასათაურება">
                                    </div>
                                    <div class="form-group">
                                        <label for="address">მისამართი</label>
                                        <input type="text" class="form-control" id="address" name="address" @if(!empty($contactBlock['address']))
                                        value="{{ $contactBlock['title'] }}"
                                               @else value="{{ old('title') }}" @endif placeholder="სახელი">
                                    </div>
                                    <div class="form-group">
                                        <label for="secondTitle">მეორე დასათაურება</label>
                                        <input type="text" class="form-control" id="secondTitle" name="secondTitle" @if(!empty($contactBlock['secondTitle']))
                                        value="{{ $contactBlock['secondTitle'] }}"
                                               @else value="{{ old('secondTitle') }}" @endif placeholder="მეორე დასათაურება">
                                    </div>
                                </div>

                                <div class="col-12 col-sm-6">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label for="phone">ტელეფონი</label>
                                        <input type="text" class="form-control" id="phone" name="phone" @if(!empty($contactBlock['phone']))
                                        value="{{ $contactBlock['phone'] }}"
                                               @else value="{{ old('phone') }}" @endif placeholder="ტელეფონი">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">ელ.ფოსტა</label>
                                        <input type="text" class="form-control" id="email" name="email" @if(!empty($contactBlock['email']))
                                        value="{{ $contactBlock['email'] }}"
                                               @else value="{{ old('email') }}" @endif placeholder="ელ.ფოსტა">
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
