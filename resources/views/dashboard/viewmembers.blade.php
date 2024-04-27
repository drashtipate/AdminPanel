@extends('layouts.master')
@section('title', 'Admin|Members')
@section('content')
<div class="main-body">
    <div class="container-fluid main">
                        <!-- <section class="section">
                            <div class="cards">
                            
                                <div class="card-body">
                                    <table class="table" id="tables">
                                        <thead>
                                            <tr class="bg-color" style="background:#9e9e9e57">
                                                <th class="tbl no">NO</th>
                                                <th class="tbl name"> NAME</th>
                                                <th class="tbl brand">Email</th>
                                                <th class="tbl brand">Number</th>
                                                <th class="tbl brand">Images</th>
                                            </tr>    
                                        </thead>
                                        <tbody>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </section> -->

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

            <!-- <div class="row center-contect">
                <table class="table" id="table">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">First Name</th>
                            <th class="text-center">Last Name</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Gender</th>
                            <th class="text-center">Country</th>
                            <th class="text-center">Salary ($)</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div> -->
            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table mb-0 datatable">
                            <thead>
                                <tr>
                                    <th class="no-sort"></th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <!-- <th>Image</th> -->
                                    <th>Gold</th>
                                    <th>Tickets</th>
                                    <th>Cash</th>
                                    <th>Dice</th>
                                    <th>otp</th>
                                    <th>Graphics</th>
                                    <th>Shadows</th>
                                    <th>Effects</th>
                                    <!-- <th>socketId</th> -->
                                    <th class="text-center">Status</th>
                                    <th>Volume</th>
                                    <th>sfx</th>
                                    <th>Role</th>
                                    <th>Appsfx</th>
                                    <th class="text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key => $item)
                                    <tr>
                                        <td><input type="hidden" id="id" name="id" value="{{ $item->id }}" /></td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <!-- <td>{{ $item->image }}<td> -->
                                        <td>{{ $item->Gold }}</td>
                                        <td class="text-center">{{ $item->Tickets }}</td>
                                        <td>{{ $item->Cash }}</td>
                                        <td class="text-center">{{ $item->Dice }}</td>
                                        <td class="text-center">{{ $item->otp }}</td>
                                        <td class="text-center">{{ $item->Graphics }}</td>
                                        <td class="text-center">{{ $item->Shadows }}</td>
                                        <td class="text-center">{{ $item->Effects }}</td>
                                        <!-- <td>{{ $item->socketId }}</td> -->
                                        <td class="text-center"> 
                                            <span class="status" style="background-color: {{ $item->status ? 'green' : 'red' }}">{{ $item->status ? 'true' : 'false' }}</span>
                                        </td>
                                        <td class="text-center">{{ $item->volume }}</td>
                                        <td class="text-center">
                                            <span class="status" style="background-color: {{ $item->sfx ? 'green' : 'red' }}">{{  $item->sfx  ? 'true' : 'false' }}</span>
                                        </td>
                                        <td class="text-center">{{ $item->role }}</td>
                                        <td class="text-center">
                                        <span class="status" style="background-color: {{ $item->appsfx ? 'green' : 'red' }}">{{  $item->appsfx  ? 'true' : 'false' }}</span>
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ url('delete/members/'.$item->id) }}" onclick="return confirm('Are you sure to want to delete it?')">
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
@endsection
