@extends('layouts.admin_layout.admin_layout')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>გუნდის სლიდერი</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">მთავარი</a></li>
                            <li class="breadcrumb-item active">გუნდის სლაიდერი</li>
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
                            <h3 class="card-title">გუნდის სლაიდერი</h3>
                            <a href="{{ url('admin/add-edit-aboutSlider') }}" style="max-width: 250px; float: right; display: inline-block;" class="btn btn-block btn-success">
                                ფოტოს დამატება
                            </a>
                        </div>
                        <div class="card-body">
                            <table id="ourProjectsSlider" class="table table-bordered table-striped">
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
                                @foreach($aboutSlider as $aboutSlider)
                                    <tr>
                                        <td>{{ $aboutSlider['id'] }}</td>
                                        <td>{{ $aboutSlider['title'] }}</td>
                                        <td>{{ $aboutSlider['description'] }}</td>
                                        <td>
                                            <img src="{{ asset('images/aboutSlider_images/'.$aboutSlider['image']) }}" style="width: 250px;" alt="">
                                        </td>
                                        <td>
                                            <a href="{{ url('admin/add-edit-aboutSlider/'.$aboutSlider['id']) }}" title="About Slider"><i class="fas fa-edit"></i></a>
                                            &nbsp;&nbsp;
                                            <a href="javascript:void(0)" title="Delete About Slider Photo" class="confirmDelete" record="aboutSlider"
                                               recordid="{{ $aboutSlider['id'] }}">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                            &nbsp;&nbsp;
                                            @if($aboutSlider['status']==1)
                                                <a class="updateAboutSliderStatus" id="aboutSlider-{{ $aboutSlider['id'] }}"
                                                   aboutSlider_id="{{ $aboutSlider['id'] }}" href="javascript:void(0)">
                                                    Active
                                                </a>
                                            @else
                                                <a class="updateAboutSliderStatus" id="aboutSlider-{{ $aboutSlider['id'] }}"
                                                   aboutSlider_id="{{ $aboutSlider['id'] }}" href="javascript:void(0)">
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
