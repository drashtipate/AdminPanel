@extends('layouts.master')
@section('title', 'Admin|Message')
@section('content')
<div class="main-body">
    <div class="container-fluid">

        <div class="">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <h4 class="page-title" style="color:#2f2e2e; font-size:20px;">Edit Message</h4>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-sm-12">
                    <div class="white-box">
                        <h3 class="box-title mb-4 fw-bold">Message</h3>
                            <form method="post" action="{{ url('update/message/'. $message->id)}}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="id"  value="{{ $message->id }}">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <!-- <div class="input-group"> -->
                                                <label for="password" class=" col-form-label" style="font-weight:bold;">Sender</label>
                                                <input type="text" class="form-control @error('sender') is-invalid @enderror" name="sender" value="{{ $message->sender}}"  placeholder="Enter sender name...">

                                            </div>
                                        </div>

                                        <div class="col-12 mt-3">
                                            <div class="form-group">
                                                <label for="" class=" col-form-label" style="font-weight:bold;">Receiver</label>
                                                <input type="text" class="form-control @error('receiver') is-invalid @enderror" name="receiver"   value="{{ $message->receiver}}" placeholder="Enter receiver name...">

                                            </div>
                                        </div>

                                        <div class="col-12 mt-3">
                                            <div class="form-group">
                                                <label for="message" class=" col-form-label" style="font-weight:bold;">Message</label>
                                                <input type="text" class="form-control @error('message') is-invalid @enderror" name="message"  value="{{ $message->message}}" placeholder="Enter message...">

                                            </div>
                                        </div>

                                    </div>
                    
                                    <div class="form-group row mb-0 mt-4" style="border-top: 1px solid #f5f5f5;">
                                        <div class="col-md-8 md-4 pt-3">
                                            <button type="submit" class="btn btn-primary" style="margin:0px; float:left; padding: 8px 20px; font-size: 15px;">
                                                    {{ __('Update') }}
                                            </button>
                                            <a href="{{ url('/message') }}" class="submit-back me-1 mb-1">Back</a>
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
