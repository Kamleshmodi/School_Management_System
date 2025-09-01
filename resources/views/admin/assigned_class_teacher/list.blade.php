@extends('layouts.app')
@section('content')
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1>Assigned Class Teacher ({{ $getRecord->count() }})</h1>
            </div>
            <div class="col-sm-6 " style="text-align: right;">
               <a href="{{ asset('admin/assigned_class_teacher/add') }}" class="btn btn-primary">Add New Assigned Class Teacher</a>
            </div>
         </div>
      </div>
      <!-- /.container-fluid -->
   </section>
   <!-- Main content -->
   <section class="content">
      <div class="container-fluid">
         <div class="row">
            <div class="col-md-12">
               <!-- general form elements -->
               <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Search Assigned Class Teacher</h3>
                  </div>
                  <!-- /.card-header -->
                  <form method="get" action="">
                      <div class="card-body">
                        <div class="row">
                        <div class="form-group col-md-3">
                            <label>Class Name</label>
                            <input type="text" class="form-control" value=" {{ Request::get('class_name') }}" name = "class_name" placeholder="Class Name">
                        </div>
                        <div class="form-group col-md-3">
                          <label>Teacher Name</label>
                          <input type="text" class="form-control" value=" {{ Request::get('teacher_name') }}" name = "teacher_name" placeholder="Teacher Name">
                        </div>
                        <div class="form-group col-md-2">
                            <label>Status</label>
                            <select class="form-control" name="status">
                              <option {{ (Request::get('status') == 100) ? 'selected' : '' }} value="0">Active</option>
                              <option {{ (Request::get('status') == 1) ? 'selected' : '' }} value="1">Inactive</option>
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                              <label>Date</label>
                              <input type="date" class="form-control"  value=" {{ Request::get('date') }}" name = "date" placeholder="Date">
                              <div style="color: red">{{ $errors->first('date') }}</div>   
                        </div>
                        <div class="form-group col-md-2">
                          <button type="submit" class="btn btn-primary" style="margin-top: 32px">Search</button>
                          <a href="{{ asset('admin/assigned_class_teacher/list') }}" class="btn btn-success" style="margin-top: 32px">Clear</a>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>


               @include('message')
               <div class="card">
                  <div class="card-header">
                     <h3 class="card-title">Assigned Class</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body p-0">
                     <table class="table table-striped">
                        <thead>
                           <tr>
                              <th>SR. No</th>
                              <th> Class Name</th>
                              <th> Teacher Name</th>
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
                                <td>{{ $value->class_name }}</td>
                                <td>{{ $value->teacher_name}} {{ $value->teacher_last_name }}</td>
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
                                  <a href="{{ asset('admin/assigned_class_teacher/edit/'.$value->id) }}" class="btn btn-primary">Edit</a>
                                  <a href="{{ asset('admin/assigned_class_teacher/edit_single/'.$value->id) }}" class="btn btn-primary">Edit Single</a>
                                  <a href="{{ asset('admin/assigned_class_teacher/delete/'.$value->id) }}" class="btn btn-danger">Delete</a>
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
      </div>
      <!-- /.container-fluid -->
   </section>
   <!-- /.content -->
</div>
@endsection