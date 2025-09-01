@extends('layouts.app')
@section('content')


<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6"> 
          <h1>My Account</h1>
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
            @include('message')
          <div class="card card-primary">
            <form method="post" action="" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="card-body">
                  <div class="row"> 
                <div class="form-group col-md-6">
                    <label>First Name <span style="color: red;">*</span></label>
                    <input type="text" class="form-control" value="{{ old('name', $getRecord->name) }}" name = "name" required placeholder="Name">
                    <div style="color: red">{{ $errors->first('name') }}</div>
                </div> 

                <div class="form-group col-md-6"> 
                    <label>Last Name <span style="color: red;"></span></label>
                    <input type="text" class="form-control" value="{{ old('last_name' , $getRecord->last_name) }}" name = "last_name" placeholder="Last Name">
                    <div style="color: red">{{ $errors->first('last_name') }}</div>
                </div> 

                  <div class="form-group col-md-6 ">
                      <label>Gendar <span style="color: red;">*</span></label>
                      <select class="form-control" name="gender" required>
                          <option value="">Select Gendar</option>
                          <option {{ (old('gendar' , $getRecord->gender) == 'Male') ? 'selected' : ''}} value="Male" >Male</option>
                          <option {{ (old('gendar' , $getRecord->gender) == 'Female') ? 'selected' : ''}} value="Female" >Female</option>
                          <option {{ (old('gendar' , $getRecord->gender) == 'Other') ? 'selected' : ''}} value="Other" >Other</option>
                      </select>
                      <div style="color: red">{{ $errors->first('gender') }} </div>
                  </div>

                  <div class="form-group col-md-6">
                    <label>Occupation <span style="color: red;">*</span></label>
                    <input type="text" class="form-control" value="{{ old('occupation', $getRecord->occupation) }}" name = "occupation" placeholder="Occupation" required>
                    <div style="color: red">{{ $errors->first('occupation') }}</div>
                    </div>

                  <div class="form-group col-md-6 ">
                      <label>Mobile Number <span style="color: red;">*</span></label>
                      <input type="text" class="form-control" value="{{ old('mobile_number', $getRecord->mobile_number) }}" name = "mobile_number" required placeholder="Mobile Number">
                      <div style="color: red">{{ $errors->first('mobile_number') }}</div>
                  </div>

                  <div class="form-group col-md-6 ">
                    <label>Address <span style="color: red;">*</span></label>
                    <input type="text" class="form-control" value="{{ old('address', $getRecord->address) }}" name = "address" placeholder="Address" required>
                    <div style="color: red">{{ $errors->first('address') }}</div>
                  </div>

                  <div class="form-group col-md-6">
                      <label>Profile Picture <span style="color: red;"></span></label>
                      <input type="file" class="form-control"  name = "profile_pic" >
                      <div style="color: red">{{ $errors->first('profile_pic') }}</div>
                      @if(!empty($getRecord->profile_pic))
                      <img src="{{ $getRecord->getProfile() }}" style="width:100px;">
                      @endif
                  </div>
              </div>  
              <hr>

                  <div class="form-group">
                    <label>Email Address <span style="color: red;">*</span></label>
                    <input type="email" class="form-control"  value="{{ old('email' , $getRecord->email) }}" name = "email" placeholder="Email" required>
                    <div style="color: red">{{ $errors->first('email') }}</div>   
                  </div>
              </div>
              
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
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