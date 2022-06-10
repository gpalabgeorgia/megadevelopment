<?php
use App\BlogBanner;

$getBlogBanner = BlogBanner::getBlogBanner();
?>
@extends('layouts.admin_layout.admin_layout')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>სიახლეების ბანერი</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">მთავარი</a></li>
                            <li class="breadcrumb-item active">სიახლეების ბანერი</li>
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
                            <h3 class="card-title">სიახლეების ბანერი</h3>
                            <a href="{{ url('admin/add-edit-blogBanner') }}" style="max-width: 250px; float: right; display: inline-block;" class="btn btn-block btn-success">
                                ფოტოს დამატება
                            </a>
                        </div>
                        <div class="card-body">
                            <table id="ourBlogBanner" class="table table-bordered table-striped">
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
                                @foreach($getBlogBanner as $banner)
                                    <tr>
                                        <td>{{ $banner['id'] }}</td>
                                        <td>{{ $banner['title'] }}</td>
                                        <td>{{ $banner['description'] }}</td>
                                        <td>
                                            <img src="{{ asset('images/blogBanner_images/'.$banner['image']) }}" style="width: 250px;" alt="">
                                        </td>
                                        <td>
                                            <a href="{{ url('admin/add-edit-blogBanner/'.$banner['id']) }}" title="Blog Banner"><i class="fas fa-edit"></i></a>
                                            &nbsp;&nbsp;
                                            <a href="javascript:void(0)" title="Delete Blog Banner Photo" class="confirmDelete" record="blogBanner"
                                               recordid="{{ $banner['id'] }}">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                            &nbsp;&nbsp;
                                            @if($banner['status']==1)
                                                <a class="updateBlogBannerStatus" id="blogBanner-{{ $banner['id'] }}"
                                                   blogBanner_id="{{ $banner['id'] }}" href="javascript:void(0)">
                                                    Active
                                                </a>
                                            @else
                                                <a class="updateBlogBannerStatus" id="blogBanner-{{ $banner['id'] }}"
                                                   blogBanner_id="{{ $banner['id'] }}" href="javascript:void(0)">
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
