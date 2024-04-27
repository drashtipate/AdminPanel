@extends('layouts.master')
@section('title', 'Admin|AddStore')
@section('content')
<div class="main-body">
    <div class="container-fluid">

        <div class="">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <h4 class="page-title" style="color:#2f2e2e; font-size:20px;">Edit Data</h4>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-sm-12">
                    <div class="white-box">
                        <h3 class="box-title mb-4 fw-bold">Store Data</h3>
                            <form method="post" action="{{ url('update/store/'. $store->id)}}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="id"  value="{{ $store->id }}">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <!-- <div class="input-group"> -->
                                                <label for="password" class=" col-form-label" style="font-weight:bold;">Item</label>
                                                <input type="text" class="form-control @error('item') is-invalid @enderror" name="item"  value="{{ $store->item }}" placeholder="Enter item name...">

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
                                                <input type="text" class="form-control @error('type') is-invalid @enderror" name="type" value="{{ $store->type }}"  placeholder="Enter type name...">

                                                    @error('type')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                            </div>
                                        </div>

                                        <div class="col-12 mt-3">
                                            <div class="form-group">
                                                <label for="message" class=" col-form-label" style="font-weight:bold;">Price</label>
                                                <input type="text" class="form-control @error('amount') is-invalid @enderror" name="amount" value="{{ $store->Price }}"  placeholder="Enter amount...">

                                                    @error('amount')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                            </div>
                                        </div>

                                        <div class="col-12 mt-3">
                                            <div class="form-group">
                                                <label for="message" class=" col-form-label" style="font-weight:bold;">IOS</label>
                                                <input type="text" class="form-control @error('ios') is-invalid @enderror" name="ios" value="{{ $store->ios }}"  placeholder="Enter...">

                                                    @error('ios')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                            </div>
                                        </div>

                                        <div class="col-12 mt-3">
                                            <div class="form-group">
                                                <label for="message" class=" col-form-label" style="font-weight:bold;">Android</label>
                                                <input type="text" class="form-control @error('android') is-invalid @enderror" name="android" value="{{ $store->android }}"  placeholder="Enter...">

                                                    @error('android')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                            </div>
                                        </div>

                                        <div class="col-12 mt-3">
                                            <div class="form-group">
                                                <label for="message" class=" col-form-label" style="font-weight:bold;">Image</label>
                                                <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" id="imageInput" value="">
                                                <br>
                                                <img src="{{ asset('Uploads/User_image_store/' .$store->image) }}" style="max-width: 150px; max-height: 150px;" alt="image" id="imagePreview"> </td>

                                                    @error('image')
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
                                                    {{ __('Update') }}
                                            </button>
                                            <a href="{{ url('/stores') }}" class="submit-back me-1 mb-1">Back</a>
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
