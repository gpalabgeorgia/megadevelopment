@extends('layouts.admin_layout.admin_layout')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>პროექტების ფილტრი</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">მთავარი</a></li>
                            <li class="breadcrumb-item active">პროექტების ფილტრი</li>
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
                            <h3 class="card-title">პროექტების ფილტრი</h3>
                            <a href="{{ url('admin/add-edit-projectFilter') }}" style="max-width: 250px; float: right; display: inline-block;" class="btn btn-block btn-success">
                                ფილტრის დამატება
                            </a>
                        </div>
                        <div class="card-body">
                            <table id="ourProjectsBlock" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>პროექტის სახელი</th>
                                    <th>სართული</th>
                                    <th>კვადრატულობა</th>
                                    <th>მდგომარეობა</th>
                                    <th>აღწერა</th>
                                    <th>ფასი</th>
                                    <th>სტატუსი</th>
                                    <th>ფოტოები</th>
                                    <th>მოქმედებები</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($projectFilter as $filter)
                                    <tr>
                                        <td>{{ $filter['id'] }}</td>
                                        <td>{{ $filter['project'] }}</td>
                                        <td>{{ $filter['floor'] }}</td>
                                        <td>{{ $filter['meter'] }}</td>
                                        <td>{{ $filter['position'] }}</td>
                                        <td>{{ $filter['description'] }}</td>
                                        <td>{{ $filter['price'] }}</td>
                                        <td>{{ $filter['sell'] }}</td>
                                        <td>
                                            <img src="{{ asset('images/projectFilters_images/'.$filter['images']) }}" style="width: 250px;" alt="">
                                        </td>
                                        <td>
                                            <a href="{{ url('admin/add-edit-projectFilter/'.$filter['id']) }}" title="Projects Filter"><i class="fas fa-edit"></i></a>
                                            &nbsp;&nbsp;
                                            <a href="javascript:void(0)" title="Delete project Filter" class="confirmDelete" record="projectFilter"
                                               recordid="{{ $filter['id'] }}">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                            &nbsp;&nbsp;
                                            @if($filter['status']==1)
                                                <a class="updateProjectFilterStatus" id="updateProjectFilterStatus-{{ $filter['id'] }}"
                                                   projectFilter_id="{{ $filter['id'] }}" href="javascript:void(0)">
                                                    Active
                                                </a>
                                            @else
                                                <a class="updateProjectFilterStatus" id="updateProjectFilterStatus-{{ $filter['id'] }}"
                                                   projectFilter_id="{{ $filter['id'] }}" href="javascript:void(0)">
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
