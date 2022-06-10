@extends('layouts.admin_layout.admin_layout')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>გუნდის დევიზი</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">მთავარი</a></li>
                            <li class="breadcrumb-item active">გუნდის დევიზი</li>
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
                            <h3 class="card-title">გუნდის დევიზი</h3>
                            <a href="{{ url('admin/add-edit-motto') }}" style="max-width: 250px; float: right; display: inline-block;" class="btn btn-block btn-success">
                                დევიზის დამატება
                            </a>
                        </div>
                        <div class="card-body">
                            <table id="motto" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>დასათაურება</th>
                                    <th>აღწერა</th>
                                    <th>მოქმედებები</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($motto as $moto)
                                    <tr>
                                        <td>{{ $moto['id'] }}</td>
                                        <td>{{ $moto['title'] }}</td>
                                        <td>{{ $moto['description'] }}</td>
                                        <td>
                                            <a href="{{ url('admin/add-edit-motto/'.$moto['id']) }}" title="Staf"><i class="fas fa-edit"></i></a>
                                            &nbsp;&nbsp;
                                            <a href="javascript:void(0)" title="Delete Motto" class="confirmDelete" record="motto"
                                               recordid="{{ $moto['id'] }}">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                            &nbsp;&nbsp;
                                            @if($moto['status']==1)
                                                <a class="updateMottoStatus" id="motto-{{ $moto['id'] }}"
                                                   motto_id="{{ $moto['id'] }}" href="javascript:void(0)">
                                                    Active
                                                </a>
                                            @else
                                                <a class="updateMottoStatus" id="motto-{{ $moto['id'] }}"
                                                   motto_id="{{ $moto['id'] }}" href="javascript:void(0)">
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
