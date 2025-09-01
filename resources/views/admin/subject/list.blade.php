@extends('layouts.app')
  @section('content')
 



<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Subject List</h1>
          </div>
          <div class="col-sm-6 " style="text-align: right;">
            <a href="{{ asset('admin/subject/add') }}" class="btn btn-primary">Add New Subject</a>
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
                      <h3 class="card-title">Search Subject</h3>
                    </div>
                    <!-- /.card-header -->
                    <form method="get" action="">
                        <div class="card-body">
                          <div class="row">
                          <div class="form-group col-md-3">
                              <label>Name</label>
                              <select class="form-control" name="name">
                                <option value="">Selected Type</option>
                                <option value="ARTS">ARTS</option>
                                <option value="BASIC SCIENCE AND TECHNOLOGY">BASIC SCIENCE AND TECHNOLOGY</option>
                                <option value="BASIC TECHNOLOGY">BASIC TECHNOLOGY</option>
                                <option value="COMMERCE">COMMERCE</option>
                                <option value="MATHEMATICS">MATHEMATICS</option>
                                <option value="BIOLOGY">BIOLOGY</option>
                                <option value="SOCIAL MEDIA">SOCIAL MEDIA</option>
                                <option value="AGRICULTURE">AGRICULTURE</option>
                                <option value="HEALTH">HEALTH</option>
                                <option value="OTHERS">OTHERS</option>
                            </select>
                          </div>
                          <div class="form-group col-md-3">
                            <label>Subject Type</label>
                                <select class="form-control" name="type">
                                    <option value="">Selected Type</option>
                                    <option  {{ (Request::get('type') == 'THEORY') ? 'selected' : '' }} value="THEORY">THEORY</option>
                                    <option  {{ (Request::get('type') == 'PRACTICAL') ? 'selected' : '' }} value="PRACTICAL">PRACTICAL</option>
                                </select>
                          </div>
                          <div class="form-group col-md-3">
                                <label>Date</label>
                                <input type="date" class="form-control"  value=" {{ Request::get('date') }}" name = "date" placeholder="Date">
                            <div style="color: red">{{ $errors->first('date') }}</div>   
                            </div>
                        <div class="form-group col-md-3">
                            <button type="submit" class="btn btn-primary" style="margin-top: 32px">Search</button>
                            <a href="{{ asset('admin/subject/list') }}" class="btn btn-success" style="margin-top: 32px">Clear</a>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>

              @include('message')

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Subject List</h3>
                </div>
                <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>SR No.</th>
                      <th>Subject Name</th>
                      <th>Subject Type</th>
                      <th>status</th>
                      <th>Create By</th>
                      <th>Create Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($getRecord as $value)
                      <tr>
                        <td>{{ $loop -> iteration }}</td>
                        <td>{{ $value->name }}</td>
                        <td>{{ $value->type }}</td>
                        <td>
                            @if($value->status == 0)
                                Active
                            @else
                                Inactive
                            @endif
                        </td>
                        <td>{{ $value->created_by_name }} {{ $value->created_by_last_name }}</td>
                        <td>{{ date('d-m-Y H:i A', strtotime($value->created_at)) }}</td>
                        <td>
                            <a href="{{ asset('admin/subject/edit/'.$value->id) }}" class="btn btn-primary">Edit</a>
                            <a href="{{ asset('admin/subject/delete/'.$value->id) }}" class="btn btn-danger">Delete</a>
                          </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
                <div style="padding: 10px; float: right;">
                 
                <div style="padding: 10px; float: right;">
                    {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
                  </div>
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