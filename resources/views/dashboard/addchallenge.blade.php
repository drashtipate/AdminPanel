@extends('layouts.master')
@section('title', 'Admin|Message')
@section('content')
<div class="main-body">
    <div class="container-fluid">

        <div class="">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <h4 class="page-title" style="color:#2f2e2e; font-size:20px;">Add Challenge</h4>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-sm-12">
                    <div class="white-box">
                        <h3 class="box-title mb-4 fw-bold">Challenge</h3>
                            <form method="post" action="{{ url('store/challenge') }}" enctype="multipart/form-data">
                                @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <!-- <div class="input-group"> -->
                                                <label for="password" class=" col-form-label" style="font-weight:bold;">User</label>
                                                <input type="email" class="form-control @error('useremail') is-invalid @enderror" name="useremail"  placeholder="Enter user email...">

                                                <!-- </div> -->
                                                @error('useremail')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-12 mt-3">
                                            <div class="form-group">
                                                <label for="" class=" col-form-label" style="font-weight:bold;">ChallengeId</label>
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
                                        <div class="col-md-8 md-4 pt-3">
                                            <button type="submit" class="btn btn-primary" style="margin:0px; float:left; padding: 8px 20px; font-size: 15px;">
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
