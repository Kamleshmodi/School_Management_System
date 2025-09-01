@extends('layouts.app')
@section('content')


<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6"> 
          <h1>Add New Parent</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <div class="card card-primary">
            <form method="post" action="" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="card-body">
                  <div class="row">
                <div class="form-group col-md-6">
                    <label>First Name <span style="color: red;">*</span></label>
                    <input type="text" class="form-control" value="{{ old('name') }}" name = "name" required placeholder="Name">
                    <div style="color: red">{{ $errors->first('name') }}</div>
                </div> 

                <div class="form-group col-md-6">
                    <label>Last Name <span style="color: red;">*</span></label>
                    <input type="text" class="form-control" value="{{ old('last_name') }}" name = "last_name" required placeholder="Last Name">
                    <div style="color: red">{{ $errors->first('last_name') }}</div>
                </div> 

                  <div class="form-group col-md-6 ">
                      <label>Gendar <span style="color: red;">*</span></label> 
                      <select class="form-control" name="gender" required>
                          <option value="">Select Gendar</option>
                          <option {{ (old('gendar') == 'Male') ? 'selected' : ''}} value="Male" >Male</option>
                          <option {{ (old('gendar') == 'Female') ? 'selected' : ''}} value="Female" >Female</option>
                          <option {{ (old('gendar') == 'Other') ? 'selected' : ''}} value="Other" >Other</option>
                      </select>
                      <div style="color: red">{{ $errors->first('gender') }} </div>
                  </div>

                  <div class="form-group col-md-6">
                    <label>Occupation <span style="color: red;">*</span></label>
                    <input type="text" class="form-control" value="{{ old('occupation') }}" name = "occupation" placeholder="Occupation" required> 
                    <div style="color: red">{{ $errors->first('occupation') }}</div>
                    </div>

                  <div class="form-group col-md-6 ">
                      <label>Mobile Number <span style="color: red;">*</span></label>
                      <input type="text" class="form-control" value="{{ old('mobile_number') }}" name = "mobile_number" required placeholder="Mobile Number">
                      <div style="color: red">{{ $errors->first('mobile_number') }}</div>
                  </div>

                  <div class="form-group col-md-6 ">
                    <label>Address <span style="color: red;">*</span></label>
                    <input type="text" class="form-control" value="{{ old('address') }}" name = "address" placeholder="Address" required> 
                    <div style="color: red">{{ $errors->first('address') }}</div>
                  </div>

                  <div class="form-group col-md-6">
                      <label>Profile Picture <span style="color: red;">*</span></label>
                      <input type="file" class="form-control"  name = "profile_pic" required>
                      <div style="color: red">{{ $errors->first('profile_pic') }}</div>
                  </div>

                <div class="form-group col-md-6">
                  <label>Status <span style="color: red;">*</span></label>
                    <select class="form-control" name="status" required>
                      <option {{ (old('status') == 0) ? 'selected' : '' }} value="0">Active</option>
                      <option {{ (old('status') == 1) ? 'selected' : '' }} value="1">Inactive</option>
                    </select>
                    <div style="color: red">{{ $errors->first('status') }}</div>
                </div>

              </div>  
              <hr>

                  <div class="form-group">
                    <label>Email Address <span style="color: red;">*</span></label>
                    <input type="email" class="form-control"  value="{{ old('email') }}" name = "email" required placeholder="Email">
                    <div style="color: red">{{ $errors->first('email') }}</div>   
                  </div>
                  <div class="form-group">
                    <label>Password <span style="color: red;">*</span></label>
                    <input type="password" class="form-control"  name = "password" required placeholder="Password">
                    <div style="color: red">{{ $errors->first('password') }}</div>
                  </div>
              </div>
              
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>

@endsection