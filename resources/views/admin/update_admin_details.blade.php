@extends('layouts.admin_layout.admin_layout')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">მონაცემები</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">მთავარი</a></li>
                        <li class="breadcrumb-item active">ადმინისტრატორის მონაცემები</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                    @if(Session::has('error_message'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ Session::get('error_message') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
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
                    @if($errors->any())
                         <div class="alert alert-danger">
                             <ul>
                                @foreach($errors->all() as $error)
                                   <li>{{ $error }}</li>
                                @endforeach
                             </ul>
                         </div>
                    @endif
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">ადმინისტრატორის მონაცემების გაახლება</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" method="post" action="{{ url('/admin/update-admin-details') }}" name="updateAdminDetails"
                              id="updateAdminDetails" enctype="multipart/form-data">@csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">ელ.ფოსტა</label>
                                    <input class="form-control" value="{{ Auth::guard('admin')->user()->email }}" readonly="">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">ადმინისტრატორის ტიპი</label>
                                    <input class="form-control" value="{{ Auth::guard('admin')->user()->type }}" readonly="">
                                </div>
                                <div class="form-group">
                                    <label for="admin_name">სახელი/გვარი</label>
                                    <input type="text" class="form-control" name="admin_name" id="admin_name" placeholder="სახელი/გვარი"
                                           value="{{ Auth::guard('admin')->user()->name }}" required="">
                                </div>
                                <div class="form-group">
                                    <label for="admin_mobile">ტელეფონის ნომერი</label>
                                    <input type="text" class="form-control" id="admin_mobile" name="admin_mobile" placeholder="ტელეფონის ნომერი"
                                           value="{{ Auth::guard('admin')->user()->mobile }}" required="">
                                </div>
                                <div class="form-group">
                                    <label for="admin_image">ფოტო</label>
                                    <input type="file" class="form-control" name="admin_image" id="admin_image" accept="image/*">
                                    @if(!empty(Auth::guard('admin')->user()->image))
                                        <a target="_blank" href="{{ url('images/admin_images/admin_photos/'.Auth::guard('admin')->user()->image) }}">
                                            ფოტოს ნახვა
                                        </a>
                                        <input type="hidden" name="current_admin_image" value="{{ Auth::guard('admin')->user()->image }}">
                                    @endif
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">დადასტურება</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
