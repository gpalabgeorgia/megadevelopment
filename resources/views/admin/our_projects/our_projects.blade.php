@extends('layouts.admin_layout.admin_layout')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>ჩვენი პროექტები</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">მთავარი</a></li>
                            <li class="breadcrumb-item active">ჩვენი პროექტები</li>
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
                            <h3 class="card-title">ჩვენი პროექტები</h3>
                            <a href="{{ url('admin/add-edit-ourProjects') }}" style="max-width: 250px; float: right; display: inline-block;" class="btn btn-block btn-success">
                                პროექტის დამატება
                            </a>
                        </div>
                        <div class="card-body">
                            <table id="banners" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>სათაური</th>
                                    <th>აღწერა</th>
                                    <th>ფოტო</th>
                                    <th>მოქმედებები</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($ourProjects as $ourProject)
                                    <tr>
                                        <td>{{ $ourProject['id'] }}</td>
                                        <td>{{ $ourProject['title'] }}</td>
                                        <td>{{ $ourProject['description'] }}</td>
                                        <td>
                                            <img src="{{ asset('images/ourProjects_images/'.$ourProject['image']) }}" style="width: 250px;" alt="">
                                        </td>
                                        <td>
                                            <a href="{{ url('admin/add-edit-ourProjects/'.$ourProject['id']) }}" title="Edit Our projects"><i class="fas fa-edit"></i></a>
                                            &nbsp;&nbsp;
                                            <a href="javascript:void(0)" title="Delete Our Projects" class="confirmDelete" record="ourProjects" recordid="{{ $ourProject['id'] }}">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                            &nbsp;&nbsp;
                                            @if($ourProject['status']==1)
                                                <a class="updateOurProjectsStatus" id="ourProjects-{{ $ourProject['id'] }}" ourProjects_id="{{ $ourProject['id'] }}" href="javascript:void(0)">
                                                    Active
                                                </a>
                                            @else
                                                <a class="updateOurProjectsStatus" id="ourProjects-{{ $ourProject['id'] }}" ourProjects_id="{{ $ourProject['id'] }}" href="javascript:void(0)">
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
