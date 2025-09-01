@extends('layouts.app')
  @section('content')
 



<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Parent Student List ({{ $getParent->name }} {{ $getParent->last_name }})</h1>
            {{-- <h1> Parent Student List ( Total : {{ $getRecord->total() }})</h1> --}}
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                  <!-- general form elements -->
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Search Student</h3>
                    </div>
                    <!-- /.card-header -->
                    <form method="get" action="">
                        <div class="card-body">
                          <div class="row">

                            <div class="form-group col-md-2">
                                <label>Student ID</label>
                                <input type="text" class="form-control" value=" {{ Request::get('id') }}" name = "id" placeholder="ID">
                            </div>    

                            <div class="form-group col-md-2">
                              <label>First Name</label>
                              <input type="text" class="form-control" value=" {{ Request::get('name') }}" name = "name" placeholder="Name">
                            </div>

                            <div class="form-group col-md-2">
                                <label>Last Name</label>
                                <input type="text" class="form-control"  value=" {{ Request::get('last_name') }}" name = "last_name" placeholder="Last Name">
                                <div style="color: red">{{ $errors->first('last_name') }}</div>   
                            </div>

                            <div class="form-group col-md-2">
                                <label>Email Address</label>
                                <input type="text" class="form-control"  value=" {{ Request::get('email') }}" name = "email" placeholder="Email address">
                                <div style="color: red">{{ $errors->first('email') }}</div>   
                            </div>

                            <div class="form-group col-md-2">
                                <button type="submit" class="btn btn-primary" style="margin-top: 32px">Search</button>
                                <a href="{{ asset('admin/parents/my_student/'.$parent_id) }}" class="btn btn-success" style="margin-top: 32px">Clear</a>
                            </div>
                        </div>
                      </div>
                    </form>
                  </div>
 
              @include('message') 
 
@if(!empty($getSearchStudent))
            <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Student List</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>ID No.</th>
                          <th>Profile Pic.</th>
                          <th>Student Name</th>
                          <th>Email ID</th>
                          <th>Parent Name</th>
                          <th>Create_Date</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($getSearchStudent as $value)
                          <tr>
                            <td>{{$value->id}}</td>
                            <td> 
                                @if(!empty($value->getProfile()))
                                  <img src="{{ $value->getProfile() }}" style = "height:50px; width:50px; border-radius:50px;">
                                @endif
                            </td>
                            <td>{{ $value->name }} {{ $value->last_name }}</td>
                            <td>{{ $value->email }}</td>
                            <td>{{ $value->parent_name }}</td>
                            <td>{{ date('d-m-Y',strtotime($value->created_at)) }}</td>
                            <td style="min-width: 250px;">
                                <a href="{{ asset('admin/parents/assign_student_parent/'.$value->id.'/'.$parent_id) }}" class="btn btn-primary btn-sm">Add Student to Parent</a>
                              </td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>

                <div style="padding: 10px; float: right;">
                </div>
              </div>
              
              <!-- /.card-body -->
            </div>
@endif
            <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Parent Student List</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0" style="overflow-x: scroll;">
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>ID No.</th>
                            <th>Profile Pic.</th>
                            <th>Student Name</th>
                            <th>Email ID</th>
                            <th>Parent Name</th>
                            <th>Create_Date</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($getRecord as $value)
                            <tr>
                              <td>{{$value->id}}</td>
                              <td> 
                                  @if(!empty($value->getProfile()))
                                    <img src="{{ $value->getProfile() }}" style = "height:50px; width:50px; border-radius:50px;">
                                  @endif
                              </td>
                              <td>{{ $value->name }} {{ $value->last_name }}</td>
                              <td>{{ $value->email }}</td>
                              <td>{{ $value->parent_name }}</td>
                              <td>{{ date('d-m-Y',strtotime($value->created_at)) }}</td>
                              <td>
                                  <a href="{{ asset('admin/parents/assign_student_parent_delete/'.$value->id) }}" class="btn btn-danger">Delete</a>
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>

                <div style="padding: 10px; float: right;">
                </div>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

@endsection