@extends('layouts.app')
  @section('content')
 



<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Admin List (Total : {{ $getRecord->total() }})</h1>
          </div>
          <div class="col-sm-6 " style="text-align: right;">
            <a href="{{ asset('admin/admin/add') }}" class="btn btn-primary">Add New Admin</a>
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
                      <h3 class="card-title">Search Admin</h3>
                    </div>
                    <!-- /.card-header -->
                    <form method="get" action="">
                        <div class="card-body">
                          <div class="row">
                          <div class="form-group col-md-2">
                              <label>Name</label>
                              <input type="text" class="form-control" value=" {{ Request::get('name') }}" name = "name" placeholder="Name">
                              <div style="color: red">{{ $errors->first('name') }}</div>
                          </div>
                          <div class="form-group col-md-2">
                            <label>Last Name</label>
                            <input type="text" class="form-control" value="{{ Request::get('last_name') }}" name = "last_name" placeholder="Last Name">
                             <div style="color: red">{{ $errors->first('last_name') }}</div>   
                            </div>
                          <div class="form-group col-md-3">
                          <label>Email Address</label>
                          <input type="text" class="form-control"  value=" {{ Request::get('email') }}" name = "email" required placeholder="Email address">
                           <div style="color: red">{{ $errors->first('email') }}</div>   
                          </div>
                          <div class="form-group col-md-2">
                            <label>Date</label>
                            <input type="date" class="form-control"  value=" {{ Request::get('date') }}" name = "date" placeholder="Date">
                             <div style="color: red">{{ $errors->first('date') }}</div>   
                            </div>
                          <div class="form-group col-md-2">
                            <button type="submit" class="btn btn-primary" style="margin-top: 32px">Search</button>
                            <a href="{{ asset('admin/admin/list') }}" class="btn btn-success" style="margin-top: 32px">Clear</a>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>

              @include('message')
 

            <div class="card">
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Last Name</th>
                      <th>Email</th>
                      <th>Create Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($getRecord as $value)
                      <tr>
                        <td>{{ $loop -> iteration }}</td>
                        <td>{{ $value->name }}</td>
                        <td>{{ $value->last_name }}</td>
                        <td>{{ $value->email }}</td>
                        <td>{{ date('d-m-Y H:i:A',strtotime($value->created_at)) }}</td>
                        <td>
                          <a href="{{ asset('admin/admin/edit/'.$value->id) }}" class="btn btn-primary">Edit</a>
                          <a href="{{ asset('admin/admin/delete/'.$value->id) }}" class="btn btn-danger">Delete</a>
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