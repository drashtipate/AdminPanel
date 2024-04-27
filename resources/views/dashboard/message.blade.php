@extends('layouts.master')
@section('title', 'Admin|Message')
@section('content')
<div class="main-body">
    <div class="container-fluid main">

        <div class="">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                </div>
                <div class="col-sm-12 col-md-6">
                    <!-- <a href="#" id="messageModalOpener" class="btn-primary add-btn" > -->
                    <!-- <a href="{{ url('addmessage') }}"  class="btn-primary add-btn" >
                        <i class="fa fa-plus">Add</i>
                    </a> -->
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table mb-0 datatable">
                            <thead>
                                <tr>
                                    <th class="no-sort"></th>
                                    <th>Sender/Player</th>
                                    <th>Receiver/ReceiverPlayer</th>
                                    <th>Message</th>
                                    <th>TimeStamp</th>
                                    <th class="text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @forelse ($messages as $message)
                                    <tr>
                                        <td><input type="hidden" id="id" name="id" value="{{ $message->id }}" /></td>
                                        <td>{{ $message->sender ?? $message->playerid }}</td>
                                        <td>{{ $message->receiver ?? $message->receiverPlayerid }}</td>
                                        <td>{{ $message->message }}</td>
                                        <td>{{ \Carbon\Carbon::createFromTimestampMs($message->timestamp)->format('Y-m-d\TH:i:s.vP') }}</td>

                                        <td class="">
                                            <!-- <a href="{{ url('edit/message/'.$message->id) }}">
                                                <span class="badge bg-success"><i class="fa fa-edit"></i></span>
                                            </a>  -->
                                            <a style="margin-left:19px;" href="{{ url('delete/message/'.$message->id) }}" onclick="return confirm('Are you sure to want to delete it?')">
                                                <span class="badge bg-danger">
                                                    <i class="fa fa-trash"></i>
                                                </span>
                                            </a> 
                                        </td>
                                    </tr>
                                @empty
                                <div class="empty-data">
                                    <img src="{{ asset('admin_assets/images/empty.png') }}">
                                    <h5>No data found</h5>
                                </div>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

                        <!-- Modal for feedback -->
                            <div class="modal" id="messageModal" tabindex="-1" role="dialog">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content" style="width:110%;">
                                        <div class="modal-header">
                                            <h5 class="modal-title" style="font-weight:bold; font-size:18px;" id="messageModal">{{ __('Message') }}</h5>
                                            <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button> -->
                                        </div>
                                        <div class="modal-body">
                                            <form method="post" action="{{ url('store/message') }}" enctype="multipart/form-data">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <!-- <div class="input-group"> -->
                                                                <label for="password" class=" col-form-label" style="font-weight:bold;">Sender</label>
                                                                <input type="text" class="form-control @error('sender') is-invalid @enderror" name="sender"  placeholder="Enter sender name...">

                                                            <!-- </div> -->
                                                                @error('sender')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-12 mt-3">
                                                        <div class="form-group">
                                                                <label for="" class=" col-form-label" style="font-weight:bold;">Receiver</label>
                                                                <input type="text" class="form-control @error('receiver') is-invalid @enderror" name="receiver"   placeholder="Enter receiver name...">

                                                                @error('receiver')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-12 mt-3">
                                                        <div class="form-group">
                                                                <label for="message" class=" col-form-label" style="font-weight:bold;">Message</label>
                                                                <input type="text" class="form-control @error('message') is-invalid @enderror" name="message"   placeholder="Enter message...">

                                                                @error('message')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                        </div>
                                                    </div>

                                                </div>
                    
                                                <div class="form-group row mb-0 mt-4" style="border-top: 1px solid #f5f5f5;">
                                                    <div class="col-md-8 offset-md-4 pt-3">
                                                        <button type="submit" class="btn btn-primary" style="margin:0px; float:right; padding: 8px 20px; font-size: 15px;">
                                                            {{ __('Save') }}
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
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
