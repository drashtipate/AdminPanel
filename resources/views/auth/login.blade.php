@extends('layouts.app')
@section('title', 'Admin|Login')
@section('content')

<div class="row justify-content-center h-100 align-items-center">
    <div class="col-lg-5 mx-auto ">
        <div class="authincation-content">
            <div class="row no-gutters">
                <div class="col-xl-12">
                    <div class="auth-form">
                        <h1 class="text-center mt-2">SignIn</h1>
                        <p class="text-center mb-4">Hello there, Sign in and start managing your Admin.</p>
                        <!-- @if(Session::has('success'))
                            <div class="alert alert-success" role="alert">
                                {{Session::get('success')}}
                            </div>
                        @endif -->
                        <form action="{{ url('/loginchek')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="fa fa-user"></span>
                                    </div>
                                    <input type="text" class="form-control" name="email" value="{{old('email')}}" placeholder="Email Id">
                                </div>
                                <span class="text-danger">
                                    @error('email')
                                        {{$message}}
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group mb-3">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="fa fa-lock"></span>
                                    </div>
                                    <input type="password" class="form-control" name="password" id="passwordInput" value="" placeholder="********"> 
                                    <i id="toggleIcon" class="togglePassword fas fa-eye field-icon" onclick="togglePassword()"></i>
                                </div>
                                <span class="text-danger">
                                    @error('password')
                                        {{$message}}
                                    @enderror
                                </span>
                            </div>
                            <div class="row">
                                <div class="text-center">
                                    <button name="login" type="submit" class="btn btn-primary mt-2">Login</button>
                                </div>
                            </div>
                            
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

