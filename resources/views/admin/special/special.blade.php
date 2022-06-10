@extends('layouts.admin_layout.admin_layout')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>განსაკუთრებულობები</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">მთავარი</a></li>
                            <li class="breadcrumb-item active">განსაკუთრებულობები</li>
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
                            <h3 class="card-title">განსაკუთრებულობები</h3>
                            <a href="{{ url('admin/add-edit-special') }}" style="max-width: 250px; float: right; display: inline-block;" class="btn btn-block btn-success">
                                დამატება
                            </a>
                        </div>
                        <div class="card-body">
                            <table id="special" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>სათაური</th>
                                    <th>აღწერა</th>
                                    <th>მოქმედებები</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($special as $special)
                                    <tr>
                                        <td>{{ $special['id'] }}</td>
                                        <td>{{ $special['title'] }}</td>
                                        <td>{{ $special['description'] }}</td>
                                        <td>
                                            <a href="{{ url('admin/add-edit-special/'.$special['id']) }}" title="Edit special"><i class="fas fa-edit"></i></a>
                                            &nbsp;&nbsp;
                                            <a href="javascript:void(0)" title="Delete Special" class="confirmDelete" record="special"
                                               recordid="{{ $special['id'] }}">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                            &nbsp;&nbsp;
                                            @if($special['status']==1)
                                                <a class="updateSpecialStatus" id="special-{{ $special['id'] }}"
                                                   special_id="{{ $special['id'] }}" href="javascript:void(0)">
                                                    Active
                                                </a>
                                            @else
                                                <a class="updateSpecialStatus" id="special-{{ $special['id'] }}"
                                                   special_id="{{ $special['id'] }}" href="javascript:void(0)">
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
