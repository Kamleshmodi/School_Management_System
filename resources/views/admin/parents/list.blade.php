@extends('layouts.app')
  @section('content')
 



<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Parents List (Total : {{ $getRecord->total() }})</h1>
          </div>
          <div class="col-sm-6 " style="text-align: right;">
            <a href="{{ asset('admin/parents/add') }}" class="btn btn-primary">Add New Parent</a>
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
                      <h3 class="card-title">Search Parent</h3>
                    </div>
                    <!-- /.card-header -->
                    <form method="get" action="">
                        <div class="card-body">
                          <div class="row">
                          <div class="form-group col-md-2"> 
                              <label>Name</label>
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
                            <label>Gender</label>
                            <select class="form-control" name="gender">
                              <option value="">Select Gender</option>
                              <option {{ (old('gender') == 'Male') ? 'selected' : '' }} value="Male" >Male</option>
                              <option {{ (old('gender') == 'Female') ? 'selected' : '' }} value="Female" >Female</option>
                              <option {{ (old('gender') == 'Other') ? 'selected' : '' }} value="Other" >Other</option>
                            </select>
                             <div style="color: red">{{ $errors->first('gender') }}</div>
                          </div>
                          <div class="form-group col-md-2">
                            <label>Mobile Number</label>
                            <input type="text" class="form-control"  value=" {{ Request::get('mobile_number') }}" name = "mobile_number" placeholder="Mobile Number">
                             <div style="color: red">{{ $errors->first('mobile_number') }}</div>   
                          </div>
                          <div class="form-group col-md-2">
                            <label>Occupation</label>
                            <input type="text" class="form-control"  value=" {{ Request::get('occupation') }}" name = "occupation" placeholder="Occupation">
                             <div style="color: red">{{ $errors->first('occupation') }}</div>   
                          </div>
                          <div class="form-group col-md-2">
                            <label>Address</label>
                            <input type="text" class="form-control"  value=" {{ Request::get('address') }}" name = "address" placeholder="Address">
                             <div style="color: red">{{ $errors->first('address') }}</div>   
                          </div>
                          <div class="form-group col-md-2">
                            <label>Status</label>
                            <select class="form-control" name="status">
                              <option value="">Select Status</option>
                              <option {{ (old('status') == 0) ? 'selected' : '' }} value="0">Active</option>
                              <option {{ (old('status') == 1) ? 'selected' : '' }} value="1">Inactive</option>
                            </select>
                             <div style="color: red">{{ $errors->first('status') }}</div>   
                          </div>
                          <div class="form-group col-md-2">
                            <label>Create Date</label>
                            <input type="date" class="form-control"  value=" {{ Request::get('date') }}" name = "date" placeholder="Create Date">
                             <div style="color: red">{{ $errors->first('date') }}</div>
                            </div>
                          <div class="form-group col-md-2">
                            <button type="submit" class="btn btn-primary" style="margin-top: 32px">Search</button>
                            <a href="{{ asset('admin/parents/list') }}" class="btn btn-success" style="margin-top: 32px">Clear</a>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>

              @include('message')
 

            <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Parents List</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0" style="overflow-x: scroll;">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>SR No.</th>
                          <th>Profile Pic</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Gendar</th>
                          <th>Mobile NO.</th>
                          <th>Occupation</th>
                          <th>Address</th>
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
                            <td>{{ $value->mobile_number }}</td>
                            <td>{{ $value->occupation}}</td>
                            <td>{{ $value->address }}</td>
                            <td>{{ ($value->status == 0)?'Active':'Inactive' }}</td>
                            <td>{{ date('d-m-Y',strtotime($value->created_at)) }}</td>
                            <td style="min-width: 250px;">
                              <a href="{{ asset('admin/parents/edit/'.$value->id) }}" class="btn btn-primary btn-sm">Edit</a>
                              <a href="{{ asset('admin/parents/delete/'.$value->id) }}" class="btn btn-danger btn-sm">Delete</a>
                              <a href="{{ asset('admin/parents/my_student/'.$value->id) }}" class="btn btn-primary btn-sm">My Student</a>
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