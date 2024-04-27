@extends('layouts.master')
@section('title', 'Admin|Challenge')
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
                                    <th>User</th>
                                    <th>ChallengeId</th>
                                    <!-- <th>SocketId</th> -->
                                    <th>Time</th>
                                    <th>Status</th>
                                    <th class="text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($challenge as $challenges)
                                    <tr>
                                        <td><input type="hidden" id="id" name="id" value="{{ $challenges->id }}" /></td>
                                        <td>{{ $challenges->user }}</td>
                                        <td>{{ $challenges->ChallengeID }}</td>
                                        <td class="">{{ $challenges->time }}</td>
                                        <td class="">
                                            <span class="status" style="background-color: 
                                                @if($challenges->status == 'confirmed')
                                                    blue
                                                @elseif($challenges->status == 'pending')
                                                    green
                                                @else
                                                    red
                                                @endif">
                                                @if($challenges->status == 'confirmed')
                                                    confirmed
                                                @elseif($challenges->status == 'pending')
                                                    pending
                                                @else
                                                    canceled
                                                @endif
                                            </span>
                                        </td>
                                        <td class="">
                                            <!-- <a href="">
                                                <span class="badge bg-success"><i class="fa fa-edit"></i></span>
                                            </a>  -->
                                            <a style="margin-left:20px;" href="{{ url('delete/challenge/'.$challenges->id) }}" onclick="return confirm('Are you sure to want to delete it?')">
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
