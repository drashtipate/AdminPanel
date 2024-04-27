@extends('layouts.master')
@section('title', 'Admin|Feedback')
@section('content')
<div class="main-body">
    <div class="container-fluid main">

        <div class="">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                </div>
                <div class="col-sm-12 col-md-6 mt-3">
                    <a href="#" id="feedbackModalOpener" class="btn-primary add-btn" >
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
                                    <th>Email</th>
                                    <th>Message</th>
                                    <th>DateTime</th>
                                    <th class="text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($feedback as $feedbacks)
                                    <tr>
                                        <td><input type="hidden" id="id" name="id" value="{{ $feedbacks->id }}" /></td>
                                        <td>{{ $feedbacks->email }}</td>
                                        <td >{{ $feedbacks->message }}</td>
                                        <td class="">
                                            {{ $feedbacks->datetime }}
                                        </td>

                                        <td class="">
                                            <a href="{{ url('edit/feedback/'.$feedbacks->id) }}">
                                                <span class="badge bg-success"><i class="fa fa-edit"></i></span>
                                            </a> 
                                            <a href="{{ url('delete/feedback/'.$feedbacks->id) }}" onclick="return confirm('Are you sure to want to delete it?')">
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


                        <!-- Modal for feedback -->
                            <div class="modal" id="feedbackModal" tabindex="-1" role="dialog">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content" style="width:110%;">
                                        <div class="modal-header">
                                            <h5 class="modal-title" style="font-weight:bold; font-size:18px;" id="feedbackModal">{{ __('Feedback') }}</h5>
                                            <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button> -->
                                        </div>
                                        <div class="modal-body">
                                            <form method="post" action="{{ url('store/feedback') }}" enctype="multipart/form-data">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <!-- <div class="input-group"> -->
                                                                <label for="password" class=" col-form-label" style="font-weight:bold;">Email</label>
                                                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"  autocomplete="email" placeholder="Enter email...">

                                                            <!-- </div> -->
                                                                @error('email')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-12 mt-3">
                                                        <div class="form-group">
                                                                <label for="password" class=" col-form-label" style="font-weight:bold;">Message</label>
                                                                <input type="text" class="form-control @error('message') is-invalid @enderror" name="message"  autocomplete="" placeholder="Enter message...">

                                                                @error('message')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                        </div>
                                                    </div>

                                                    <!-- <div class="col-12 mt-3">
                                                        <div class="form-group">
                                                                <label for="password" class=" col-form-label" style="font-weight:bold;">Date/Time</label>
                                                                <input type="datetime-local"  id="datetime" class="form-control @error('datetime') is-invalid @enderror" name="datetime"  autocomplete="" >
                                                            
                                                                @error('datetime')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                        </div>
                                                    </div> -->

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
