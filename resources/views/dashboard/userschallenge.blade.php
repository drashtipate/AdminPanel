@extends('layouts.master')
@section('title', 'Admin|UserChallenge')
@section('content')
<div class="main-body">
    <div class="container-fluid main">

        <div class="">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                </div>
                <div class="col-sm-12 col-md-6">
                    <!-- <button type="button" class="btn-primary add-btn" >
                        <i class="fa fa-plus">Add</i>
                    </button> -->
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table mb-0 datatable">
                            <thead>
                                <tr>
                                    <th class="no-sort"></th>
                                    <th>User_Id</th>
                                    <th>FromEmail</th>
                                    <th>Date/Time</th>
                                    <th>SocketId</th>
                                    <th class="">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($user as $datas)
                                    <tr>
                                        <td><input type="hidden" id="id" name="id" value="{{ $datas->id }}" /></td>
                                        <td>
                                            <a href="{{ url('/viewmembers') }}" class="td-link" style="color:#2c82bf;">{{ $datas->user['_id'] }}</a>
                                        </td>
                                        <td>{{ $datas->fromemail }}</td>
                                        <td>{{ \Carbon\Carbon::createFromTimestampMs($datas->timestamp)->format('Y-m-d\TH:i:s.vP') }}</td>
                                        <td >{{ $datas->socketId }}</td>
                                        <td class="">
                                            <!-- <a href="">
                                                <span class="badge bg-success"><i class="fa fa-edit"></i></span>
                                            </a>  -->
                                            <a style="margin-left:20px;" href="{{ url('delete/userchallenge/'.$datas->id) }}" onclick="return confirm('Are you sure to want to delete it?')">
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
