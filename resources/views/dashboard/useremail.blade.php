@extends('layouts.master')
@section('title', 'Admin|Email')
@section('content')
<div class="main-body">
    <div class="container-fluid main">

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

            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table mb-0 datatable">
                            <thead>
                                <tr>
                                    <th class="no-sort"></th>
                                    <th>Name</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th>Otp</th>
                                    <th>Subject</th>
                                    <th>Message</th>
                                    <th>Html</th>
                                    <th>Image</th>
                                    <th>Date</th>
                                    <th class="text-center">Status</th>
                                    <th>Time</th>
                                    <th class="text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $data)
                                    <tr>
                                        <!-- <input type="text" id="id" name="id" value="{{ $data->id }}" /> -->
                                        <td><input type="hidden" id="id" name="id" value="{{ $data->id }}" /></td>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data->from }}</td>
                                        <td>{{ $data->to }}</td>
                                        <td>{{ $data->otp }}</td>
                                        <td>{{ $data->subject }}</td>
                                        <td>{{ $data->message }}</td>
                                        <td>{{ $data->html }}</td>
                                        <td >{{ $data->image }}</td>
                                        <td >{{ sprintf('%02d', $data->day)."/".sprintf('%02d', $data->month)."/".sprintf('%04d', $data->year) }}</td>
                                  
                                        <td class="text-center"> 
                                            <span class="status" style="background-color: {{ $data->status ? 'green' : 'red' }}">{{ $data->status ? 'true' : 'false' }}</span>
                                        </td>
                                        <td >{{ $data->time }}</td>
                                        <td class="text-center">
                                            <a href="{{ url('delete/email/' .$data->id) }}" onclick="return confirm('Are you sure to want to delete it?')">
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
