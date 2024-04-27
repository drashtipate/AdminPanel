@extends('layouts.master')
@section('title', 'Admin|Message')
@section('content')
<div class="main-body">
    <div class="container-fluid">

        <div class="">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <h4 class="page-title" style="color:#2f2e2e; font-size:20px;">Edit Feedback</h4>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-sm-12">
                    <div class="white-box">
                        <h3 class="box-title mb-4 fw-bold">Feedback</h3>
                            <form method="post" action="{{ url('update/feedback/'. $feedback->id)}}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="id"  value="{{ $feedback->id }}">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <!-- <div class="input-group"> -->
                                                <label for="password" class=" col-form-label" style="font-weight:bold;">Email</label>
                                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"  value="{{ $feedback->email }}" placeholder="Enter email...">

                                                <!-- </div> -->
                                            </div>
                                        </div>

                                        <div class="col-12 mt-3">
                                            <div class="form-group">
                                                <label for="" class=" col-form-label" style="font-weight:bold;">Message</label>
                                                <input type="text" class="form-control @error('message') is-invalid @enderror" name="message" value="{{ $feedback->message }}"  placeholder="Enter message...">

                                            </div>
                                        </div>

                                        <!-- <div class="col-12 mt-3">
                                            <div class="form-group">
                                                <label for="message" class=" col-form-label" style="font-weight:bold;">Date/Time</label>
                                                <input type="datetime-local" class="form-control @error('datetime') is-invalid @enderror" name="datetime"   value="{{ $feedback->datetime }}" >

                                            </div>
                                        </div> -->

                                    </div>
                    
                                    <div class="form-group row mb-0 mt-4" style="border-top: 1px solid #f5f5f5;">
                                        <div class="col-md-8 md-4 pt-3">
                                            <button type="submit" class="btn btn-primary" style="margin:0px; float:left; padding: 8px 20px; font-size: 15px;">
                                                    {{ __('Update') }}
                                            </button>
                                            <a href="{{ url('/feedback') }}" class="submit-back me-1 mb-1">Back</a>
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
