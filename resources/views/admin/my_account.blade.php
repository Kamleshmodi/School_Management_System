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
            <!-- general form elements -->
            <div class="card card-primary">
              <form method="post" action="">
                {{ csrf_field() }}
                {{-- <div class="card-body">
                    <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" value="{{ old('name') }}" name = "name" required placeholder="Name">
                    </div>
                    <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" class="form-control" value="{{ old('last_name') }}" name = "last_name" required placeholder="Last Name">
                     <div style="color: red">{{ $errors->first('last_name') }}</div>   
                    </div>
                    <div class="form-group">
                    <label>Email address</label>
                    <input type="email" class="form-control"  value="{{ old('email') }}" name = "email" required placeholder="Email">
                     <div style="color: red">{{ $errors->first('email') }}</div>   
                    </div>
                </div> --}}

                <div class="card-body">
                  <div class="form-group">
                      <label>Name</label>
                      <input type="text" class="form-control" 
                             value="{{ $getRecord->name ?? old('name') }}" 
                             name="name" required placeholder="Name">
                  </div>
                  <div class="form-group">
                      <label>Last Name</label>
                      <input type="text" class="form-control" 
                             value="{{ $getRecord->last_name ?? old('last_name') }}" 
                             name="last_name" required placeholder="Last Name">
                      <div style="color: red">{{ $errors->first('last_name') }}</div>   
                  </div>
                  <div class="form-group">
                      <label>Email address</label>
                      <input type="email" class="form-control"  
                             value="{{ $getRecord->email ?? old('email') }}" 
                             name="email" required placeholder="Email">
                      <div style="color: red">{{ $errors->first('email') }}</div>   
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