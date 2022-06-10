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
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">მთავარი</a></li>
                            <li class="breadcrumb-item active">კონტაქტის ბლოკი</li>
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
                            <h3 class="card-title">კონტაქტის ბლოკი</h3>
                            <a href="{{ url('admin/add-edit-contactBlock') }}" style="max-width: 250px; float: right; display: inline-block;" class="btn btn-block btn-success">
                                კონტაქტის დამატება
                            </a>
                        </div>
                        <div class="card-body">
                            <table id="ourContactBlock" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>სათაური</th>
                                    <th>მისამართი</th>
                                    <th>ტელეფონი</th>
                                    <th>ელ.ფოსტა</th>
                                    <th>მეორე სათაური</th>
                                    <th>მოქმედებები</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($contactBlock as $block)
                                    <tr>
                                        <td>{{ $block['id'] }}</td>
                                        <td>{{ $block['title'] }}</td>
                                        <td>{{ $block['address'] }}</td>
                                        <td>{{ $block['phone'] }}</td>
                                        <td>{{ $block['email'] }}</td>
                                        <td>{{ $block['secondTitle'] }}</td>
                                        <td>
                                            <a href="{{ url('admin/add-edit-contactBlock/'.$block['id']) }}" title="Contact Block"><i class="fas fa-edit"></i></a>
                                            &nbsp;&nbsp;
                                            <a href="javascript:void(0)" title="Delete Contact Block" class="confirmDelete" record="contactBlock"
                                               recordid="{{ $block['id'] }}">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                            &nbsp;&nbsp;
                                            @if($block['status']==1)
                                                <a class="updateContactBlockStatus" id="contactBlock-{{ $block['id'] }}"
                                                   contactBlock_id="{{ $block['id'] }}" href="javascript:void(0)">
                                                    Active
                                                </a>
                                            @else
                                                <a class="updateContactBlockStatus" id="contactBlock-{{ $block['id'] }}"
                                                   contactBlock_id="{{ $block['id'] }}" href="javascript:void(0)">
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
