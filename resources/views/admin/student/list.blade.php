@extends('layouts.app')
  @section('content')
 

 

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Student List (Total : {{ $getRecord->total() }})</h1>
          </div>
          <div class="col-sm-6 " style="text-align: right;">
            <a href="{{ asset('admin/student/add') }}" class="btn btn-primary">Add New Student</a>
          </div>

        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content --> 
    <section class="content">
      <div class="container-fluid">
        <div class="row">


          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Search Student</h3>
            </div>
            <!-- /.card-header -->
            <form method="get" action="">
                <div class="card-body">
                  <div class="row">
                  <div class="form-group col-md-2">
                      <label>Name</label>
                      <input type="text" class="form-control" value=" {{ Request::get('name') }}" name = "name" placeholder="First Name">
                  </div>
                  <div class="form-group col-md-2">
                    <label>Last Name</label>
                    <input type="text" class="form-control" value=" {{ Request::get('last_name') }}" name = "last_name" placeholder="Last Name">
                </div>
                  <div class="form-group col-md-2">
                    <label>Email Address</label>
                    <input type="text" class="form-control"  value=" {{ Request::get('email') }}" name = "email" placeholder="Email address"> <div style="color: red">{{ $errors->first('email') }}</div> 
                  </div>    
                  <div class="form-group col-md-2">
                    <label>Admission Number</label>
                    <input type="text" class="form-control"  value=" {{ Request::get('admission_number') }}" name = "admission_number" placeholder="Admission Number"> <div style="color: red">{{ $errors->first('admission_number') }}</div> 
                  </div>
                  <div class="form-group col-md-2">
                    <label>Roll Number</label>
                    <input type="text" class="form-control"  value=" {{ Request::get('roll_number') }}" name = "roll_number" placeholder="Roll Number"> <div style="color: red">{{ $errors->first('roll_number') }}</div> 
                  </div>
                  <div class="form-group col-md-2">
                    <label>Class</label>
                    <input type="text" class="form-control"  value=" {{ Request::get('class') }}" name = "class" placeholder="Class"> <div style="color: red">{{ $errors->first('class') }}</div> 
                  </div>
                  <div class="form-group col-md-2">
                    <label>Gender</label>
                      <select class="form-control" name="gender">
                        <option value="">Select Gender</option>
                        <option {{ (old('gender') == 'Male') ? 'selected' : '' }} value="Male" >Male</option>
                        <option {{ (old('gender') == 'Female') ? 'selected' : '' }} value="Female" >Female</option>
                        <option {{ (old('gender') == 'Other') ? 'selected' : '' }} value="Other" >Other</option>
                      </select>
                  </div>
                  <div class="form-group col-md-2">
                    <label>Mobile Number</label>
                    <input type="text" class="form-control"  value=" {{ Request::get('mobile_number') }}" name = "mobile_number" placeholder="Mobile Number"> <div style="color: red">{{ $errors->first('mobile_number') }}</div> 
                  </div>
                  <div class="form-group col-md-2">
                    <label>Religion</label>
                    <input type="text" class="form-control"  value=" {{ Request::get('religion') }}" name = "religion" placeholder="Religion"> <div style="color: red">{{ $errors->first('religion') }}</div>
                  </div>
                  <div class="form-group col-md-2">
                    <label>Blood Group</label>
                    <input type="text" class="form-control"  value=" {{ Request::get('blood_group') }}" name = "blood_group" placeholder="Blood Group"> <div style="color: red">{{ $errors->first('blood_group') }}</div>
                  </div>
                  <div class="form-group col-md-2">
                    <label>Status</label>
                    <select class="form-control" name="status">
                      <option value="">Select Status</option>
                      <option {{ (old('status') == 0) ? 'selected' : '' }} value="0">Active</option>
                      <option {{ (old('status') == 1) ? 'selected' : '' }} value="1">Inactive</option>
                    </select>
                  </div>
                  <div class="form-group col-md-2">
                    <label>Admission Date</label>
                    <input type="date" class="form-control"  value=" {{ Request::get('admission_date') }}" name = "admission_date" placeholder="Admission Date"> <div style="color: red">{{ $errors->first('admission_date') }}</div> 
                  </div>
                  <div class="form-group col-md-2">
                    <button type="submit" class="btn btn-primary" style="margin-top: 32px">Search</button>
                    <a href="{{ asset('admin/student/list') }}" class="btn btn-success" style="margin-top: 32px">Clear</a>  
                  </div>
                </div>
              </div>
            </form>
          </div>
              @include('message')
 
 
            <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Student List</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0" style="overflow: auto;">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>SR No.</th>
                          <th>Profile Pic.</th>
                          <th>Student Name</th>
                          <th>Parent Name</th>
                          <th>Email</th>
                          <th>Adminssion No.</th>
                          <th>Roll No.</th>
                          <th>Class</th>
                          <th>Gendar</th>
                          <th>Date_of_Birth</th>
                          <th>Caste</th>
                          <th>Religion</th>
                          <th>Mobile No.</th>
                          <th>Adminssion Date</th>
                          <th>Blood Group</th>
                          <th>Height</th>
                          <th>Weight</th>
                          <th>Status</th>
                          <th>Create_Date</th> 
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($getRecord as $value)
                          <tr>
                            <td>{{ $loop -> iteration }}</td>
                            <td> 
                              @if(!empty($value->getProfile()))
                                <img src="{{ $value->getProfile() }}" style = "height:50px; width:50px; border-radius:50px;">
                              @endif
                            </td>
                            <td>{{ $value->name }} {{ $value->last_name }}</td>
                            <td>{{ $value->parent_name }} {{ $value->parent_last_name }}</td>
                            <td>{{ $value->email }}</td>
                            <td>{{ $value->admission_number }}</td>
                            <td>{{ $value->id }}</td>
                            <td>{{ $value->class_name}}</td>
                            <td>{{ $value->gender }}</td>
                            <td>
                              @if(!empty($value->date_of_birth))
                              {{ date('d-m-Y', strtotime($value->date_of_birth)) }}
                              @endif
                            </td>
                            <td>{{ $value->caste }}</td>
                            <td>{{ $value->religion }}</td>
                            <td>{{ $value->mobile_number }}</td>
                            <td>
                              @if(!empty($value->admission_date))
                                {{ date('d-m-Y', strtotime($value->admission_date)) }}
                              @endif
                            </td>
                            <td>{{ $value->blood_group }}</td>
                            <td>{{ $value->height }}</td>
                            <td>{{ $value->weight }}</td>
                            <td>{{ ($value->status == 0)?'Active':'Inactive' }}</td>
                            <td>{{ date('d-m-Y',strtotime($value->created_at)) }}</td>
                            <td style="min-width: 150px;">
                              <a href="{{ asset('admin/student/edit/'.$value->id) }}" class="btn btn-primary btn-sm">Edit</a>
                              <a href="{{ asset('admin/student/delete/'.$value->id) }}" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                </table>

                <div style="padding: 10px; float: right;">
                  {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
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