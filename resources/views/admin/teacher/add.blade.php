@extends('layouts.app')
  @section('content')
 

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6"> 
            <h1>Add New Teacher </h1>
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
                            <input type="text" class="form-control" value="{{ old('name') }}" name = "name" required placeholder="First Name">
                            <div style="color: red">{{ $errors->first('name') }}</div>
                          </div> 

                    <div class="form-group col-md-6">
                        <label>Last Name <span style="color: red;"></span></label>
                        <input type="text" class="form-control" value="{{ old('last_name') }}" name = "last_name" required placeholder="Last Name">
                        <div style="color: red">{{ $errors->first('last_name') }}</div>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Gendar<span style="color: red;">*</span></label>
                        <select class="form-control" name="gender" required>
                            <option value="">Select Gendar</option>
                            <option {{ (old('gendar') == 'Male') ? 'selected' : ''}} value="Male" >Male</option>
                            <option {{ (old('gendar') == 'Female') ? 'selected' : ''}} value="Female" >Female</option>
                            <option {{ (old('gendar') == 'Other') ? 'selected' : ''}} value="Other" >Other</option>
                        </select>
                        <div style="color: red">{{ $errors->first('gender') }} </div>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Date of Birth <span style="color: red;">*</span></label>
                        <input type="date" class="form-control" value="{{ old('date_of_birth') }}" name = "date_of_birth" required >
                        <div style="color: red">{{ $errors->first('date_of_birth') }}</div>
                    </div>

                    <div class="form-group col-md-6">
                        <label> Date of Joining <span style="color: red;">*</span></label>
                        <input type="date" class="form-control" value="{{ old('admission_date') }}" name = "admission_date" required >
                        <div style="color: red">{{ $errors->first('admission_date') }}</div>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Mobile Number <span style="color: red;">*</span></label>
                        <input type="text" class="form-control" value="{{ old('mobile_number') }}" name = "mobile_number" required placeholder="Mobile Number">
                        <div style="color: red">{{ $errors->first('mobile_number') }}</div>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Marital Status <span style="color: red;">*</span></label>
                        <input type="text" class="form-control" value="{{ old('marital_status') }}" name = "marital_status" required placeholder="Marital Status">
                        <div style="color: red">{{ $errors->first('marital_status') }}</div>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Profile Picture <span style="color: red;"></span></label>
                        <input type="file" class="form-control"  name = "profile_pic">
                        <div style="color: red">{{ $errors->first('profile_pic') }}</div>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Current Address <span style="color: red;">*</span></label>
                        <input type="text" class="form-control" value="{{ old('address') }}" name = "address" required placeholder="Address">
                        <div style="color: red">{{ $errors->first('address') }}</div>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Permanent Address <span style="color: red;">*</span></label>
                        <input type="text" class="form-control" value="{{ old('permanent_address') }}" name = "permanent_address" required placeholder="Permanent Address">
                        <div style="color: red">{{ $errors->first('permanent_address') }}</div>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Qualification <span style="color: red;">*</span></label>
                        <input type="text" class="form-control" value="{{ old('qualification') }}" name = "qualification" required placeholder="Qualification">
                        <div style="color: red">{{ $errors->first('qualification') }}</div>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Work Experience <span style="color: red;">*</span></label>
                        <input type="text" class="form-control" value="{{ old('work_experience') }}" name = "work_experience" required placeholder="Work Experience">
                        <div style="color: red">{{ $errors->first('work_experience') }}</div>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Note <span style="color: red;"></span></label>
                        <input type="text" class="form-control" value="{{ old('note') }}" name = "note" placeholder="Note">
                        <div style="color: red">{{ $errors->first('note') }}</div>
                    </div>

                  <div class="form-group col-md-6">
                    <label>Select Status <span style="color: red;">*</span></label>
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