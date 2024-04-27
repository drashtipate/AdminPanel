@extends('layouts.master')
@section('title', 'Admin|Store')
@section('content')
<div class="main-body">
    <div class="container-fluid main">

        <div class="">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                </div>
                <div class="col-sm-12 col-md-6 mt-3">
                    <a href="{{ url('store') }}"  class="btn-primary add-btn" >
                        <i class="fa fa-plus">Add</i>
                    </a>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table mb-0 datatable">
                            <thead>
                                <tr>
                                    <th class="no-sort"></th>
                                    <th>Item</th>
                                    <th>Type</th>
                                    <th>Price</th>
                                    <th>IOS</th>
                                    <th>Android</th>
                                    <th>Image</th>
                                    <th class="text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($store as $items)
                                    <tr>
                                        <td><input type="hidden" id="id" name="id" value="{{ $items->id }}" /></td>
                                        <td>{{ $items->item }}</td>
                                        <td>{{ $items->type }}</td>
                                        <td >{{ $items->Price }}</td>
                                        <td class="">{{ $items->ios }}</td>
                                        <td class="">{{ $items->android }}</td>
                                        <td>{{ $items->image }}</td>
                                        <!-- <td> <img src="{{ asset('Uploads/User_image_store/' .$items->image) }}" width="70px;" height="70px;" alt="image"> </td>   -->
                                        <td class="">
                                            <a href="{{ url('edit/store/' .$items->id) }}">
                                                <span class="badge bg-success"><i class="fa fa-edit"></i></span>
                                            </a> 
                                            <a href="{{ url('delete/store/' .$items->id) }}" onclick="return confirm('Are you sure to want to delete it?')">
                                                <span class="badge bg-danger">
                                                    <i class="fa fa-trash"></i>
                                                </span>
                                            </a> 
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<style>
    .td-link:hover{
        text-decoration:underline;
    }
</style>
@endsection
