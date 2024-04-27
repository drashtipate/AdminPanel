@extends('layouts.master')
@section('title', 'Admin|AddStore')
@section('content')
<div class="main-body">
    <div class="container-fluid">

        <div class="">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <h4 class="page-title" style="color:#2f2e2e; font-size:20px;">Add Data</h4>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-sm-12">
                    <div class="white-box">
                        <h3 class="box-title mb-4 fw-bold">Store Data</h3>
                            <form method="post" action="{{ url('store/data') }}" enctype="multipart/form-data">
                                @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <!-- <div class="input-group"> -->
                                                <label for="name" class=" col-form-label" style="font-weight:bold;">Item</label>
                                                <input type="text" class="form-control @error('item') is-invalid @enderror" name="item"  placeholder="Enter item name...">

                                                <!-- </div> -->
                                                @error('item')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-12 mt-3">
                                            <div class="form-group">
                                                <label for="" class=" col-form-label" style="font-weight:bold;">Type</label>
                                                <input type="text" class="form-control @error('type') is-invalid @enderror" name="type"   placeholder="Enter type name...">

                                                    @error('type')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                            </div>
                                        </div>

                                        <div class="col-12 mt-3">
                                            <div class="form-group">
                                                <label for="" class=" col-form-label" style="font-weight:bold;">Price</label>
                                                <input type="text" class="form-control @error('amount') is-invalid @enderror" name="amount"   placeholder="Enter amount...">

                                                    @error('amount')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                            </div>
                                        </div>

                                        <div class="col-12 mt-3">
                                            <div class="form-group">
                                                <label for="" class=" col-form-label" style="font-weight:bold;">IOS</label>
                                                <input type="text" class="form-control @error('ios_id') is-invalid @enderror" name="ios_id"   placeholder="Enter ios id...">

                                                    @error('ios_id')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                            </div>
                                        </div>

                                        <div class="col-12 mt-3">
                                            <div class="form-group">
                                                <label for="" class=" col-form-label" style="font-weight:bold;">Android</label>
                                                <input type="text" class="form-control @error('android_id') is-invalid @enderror" name="android_id"   placeholder="Enter android id...">

                                                    @error('android_id')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                            </div>
                                        </div>

                                        <div class="col-12 mt-3">
                                            <div class="form-group">
                                                <label for="" class=" col-form-label" style="font-weight:bold;">Image</label>
                                                <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" id="imageInput">

                                                    @error('image')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 mt-3">
                                            <img id="imagePreview" src="#" alt="Image Preview" style="max-width: 150px; max-height: 150px;">
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
    .invalid-feedback {
        display: none;
        width: 100%;
        margin-top: 0.25rem;
        font-size: 10px;
        font-weight: 400;
        color: #f72b50;
    }
</style>
@endsection
