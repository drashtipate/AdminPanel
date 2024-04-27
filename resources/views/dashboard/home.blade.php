@extends('layouts.master')
@section('title', 'Admin|Dashboard')
@section('content')
<div class="main-body">
    <div class="container-fluid">
        <div class="">
            <div class="row">
                <div class="col-lg-3 col-md-4">
                    <div class="card dashboard-count-card">
                        <div class="">
                            <img src="{{ asset('admin_assets/images/users1.png') }}"></img>
                            <h5 class="mt-2">Total Users</h5>
                            <h6 class="mb-0" style="font-size:18px;">{{ $totals }}</h6>
                            
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4">
                    <div class="card dashboard-count-card">
                        <div class="">
                            <img src="{{ asset('admin_assets/images/users2.png') }}"></img>
                            <h5 class="mt-2">Total Online Users</h5>
                            <h6 class="mb-0" style="font-size:18px;">0</h6>
                        </div>
                    </div>
                </div>
            </div>

            
        </div>
    </div>
</div>
@endsection
