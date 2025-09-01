@extends('layouts.app')
  @section('content')
 

 

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Teacher List (Total : {{ $getRecord->total() }})</h1>
          </div>
          <div class="col-sm-6 " style="text-align: right;">
            <a href="{{ asset('admin/teacher/add') }}" class="btn btn-primary">Add New Teacher</a>
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
              <h3 class="card-title">Search Teacher</h3>
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
                    <label>Email Address</label>
                    <input type="text" class="form-control"  value=" {{ Request::get('email') }}" name = "email" placeholder="Email address"> <div style="color: red">{{ $errors->first('email') }}</div> 
                  </div>

                  <div class="form-group col-md-2">
                    <label>Gender</label>
                      <select class="form-control" name="gender">
                        <option value="">Select Gender</option>
                        <option {{ (Request::get('gender') == 'Male') ? 'selected' : '' }} value="Male" >Male</option>
                        <option {{ (Request::get('gender') == 'Female') ? 'selected' : '' }} value="Female" >Female</option>
                        <option {{ (Request::get('gender') == 'Other') ? 'selected' : '' }} value="Other" >Other</option>
                      </select> 
                  </div>
                  
                  <div class="form-group col-md-2">
                    <label>Mobile Number</label>
                    <input type="text" class="form-control"  value=" {{ Request::get('mobile_number') }}" name = "mobile_number" placeholder="Mobile Number"> <div style="color: red">{{ $errors->first('mobile_number') }}</div> 
                  </div>

                  <div class="form-group col-md-2">
                    <label>Marital Status</label>
                    <input type="text" class="form-control"  value=" {{ Request::get('marital_status') }}" name = "marital_status" placeholder="Marital Status"> <div style="color: red">{{ $errors->first('marital_status') }}</div>
                  </div>

                  <div class="form-group col-md-2">
                    <label>Address</label>
                    <input type="text" class="form-control"  value=" {{ Request::get('address') }}" name = "address" placeholder="Address"> <div style="color: red">{{ $errors->first('address') }}</div>   
                  </div>

                  <div class="form-group col-md-2">
                    <label>Date of Joining</label>
                    <input type="date" class="form-control"  value=" {{ Request::get('admission_date') }}" name = "admission_date" placeholder="Date of Joining"> <div style="color: red">{{ $errors->first('admission_date') }}</div> 
                  </div>

                  <div class="form-group col-md-2">
                    <label>Qualification</label>
                    <input type="text" class="form-control"  value=" {{ Request::get('qualification') }}" name = "qualification" placeholder="Qualification"> <div style="color: red">{{ $errors->first('qualification') }}</div> 
                  </div>

                  <div class="form-group col-md-2">
                    <label>Work Experience</label>
                    <input type="text" class="form-control"  value=" {{ Request::get('work_experience') }}" name = "work_experience" placeholder="Work Experience"> <div style="color: red">{{ $errors->first('work_experience') }}</div> 
                  </div>

                  <div class="form-group col-md-2">
                    <label>Status</label>
                    <select class="form-control" name="status">
                      <option value="">Select Status</option>
                      <option {{ (Request::get('status') == 100) ? 'selected' : '' }} value="0">Active</option>
                      <option {{ (Request::get('status') == 1) ? 'selected' : '' }} value="1">Inactive</option>
                    </select>
                  </div>
                  
                  <div class="form-group col-md-2">
                    <label>Created Date</label>
                    <input type="date" class="form-control"  value=" {{ Request::get('date') }}" name = "date" placeholder="Date"> <div style="color: red">{{ $errors->first('date') }}</div>
                  </div>

                  <div class="form-group col-md-2">
                    <button type="submit" class="btn btn-primary" style="margin-top: 32px">Search</button>
                    <a href="{{ asset('admin/teacher/list') }}" class="btn btn-success" style="margin-top: 32px">Clear</a>  
                  </div>
                </div>
              </div>
            </form> 
          </div>
              @include('message')
 
 
            <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Teacher List</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0" style="overflow-x: scroll;">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>SR No.</th>
                          <th>Profile Pic.</th>
                          <th>Teacher_Name</th>
                          <th>Email</th>
                          <th>Gender</th>
                          <th>Date_of_Birth</th>   
                          <th>Date_of_Joining</th>
                          <th>Mobile No.</th>
                          <th>Marital Status</th>
                          <th>Current Address</th>
                          <th>Permanent Address</th>
                          <th>Qualification</th>
                          <th>Work Experience</th>
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
                            <td>{{ $value->email }}</td>
                            <td>{{ $value->gender }}</td>
                            <td> 
                                @if(!empty($value->date_of_birth))
                                {{ date('d-m-Y', strtotime($value->date_of_birth)) }}
                                @endif
                            </td>
                            <td> 
                                @if(!empty($value->admission_date))
                                {{ date('d-m-Y', strtotime($value->admission_date)) }}
                                @endif
                            </td>
                            <td>{{ $value->mobile_number }}</td>
                            <td>{{ $value->marital_status }}</td>
                            <td>{{ $value->address }}</td>
                            <td>{{ $value->permanent_address }}</td>
                            <td>{{ $value->qualification }}</td>
                            <td>{{ $value->work_experience }}</td>
                            <td>{{ ($value->status == 0)?'Active':'Inactive' }}</td>
                            
                            <td>{{ date('d-m-Y',strtotime($value->created_at)) }}</td>
                            <td style="min-width: 150px;">
                              <a href="{{ asset('admin/teacher/edit/'.$value->id) }}" class="btn btn-primary btn-sm">Edit</a>
                              <a href="{{ asset('admin/teacher/delete/'.$value->id) }}" class="btn btn-danger btn-sm">Delete</a>
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