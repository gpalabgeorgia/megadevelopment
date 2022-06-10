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
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">პაროლის გაახლება</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" method="post" action="{{ url('/admin/update-current-pwd') }}" name="updatePasswordForm" id="updatePasswordForm">@csrf
                            <div class="card-body">
                                <?php /* <div class="form-group">
                                    <label for="exampleInputEmail1">სახელი/გვარი</label>
                                    <input type="text" class="form-control" value="{{ $adminDetails->name }}" placeholder="სახელი/გვარი" id="admin_name" name="admin_name">
                                </div> */ ?>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">ელ.ფოსტა</label>
                                    <input class="form-control" value="{{ $adminDetails->email }}" readonly="">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">ადმინისტრატორის ტიპი</label>
                                    <input class="form-control" value="{{ $adminDetails->type }}" readonly="">
                                </div>
                                <div class="form-group">
                                    <label for="current_pwd">მიმდინარე პაროლი</label>
                                    <input type="password" class="form-control" name="current_pwd" id="current_pwd" placeholder="მიმდინარე პაროლი" required="">
                                    <span id="chkCurrentPwd"></span>
                                </div>
                                <div class="form-group">
                                    <label for="new_pwd">ახალი პაროლი</label>
                                    <input type="password" class="form-control" id="new_pwd" name="new_pwd" placeholder="ახალი პაროლი" required="">
                                </div>
                                <div class="form-group">
                                    <label for="confirm_pwd">გაიმეორეთ პაროლი</label>
                                    <input type="password" class="form-control" name="confirm_pwd" id="confirm_pwd" placeholder="გაიმეორეთ პაროლი" required="">
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
