@extends('layouts.app')
@section('content')
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1>Exam List (Total : {{ $getRecord->total() }})</h1>
            </div>
            <div class="col-sm-6 " style="text-align: right;">
               <a href="{{ asset('admin/examination/exam/add') }}" class="btn btn-primary">Add New Exam</a>
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
                     <h3 class="card-title">Search Exam</h3>
                  </div>
                  <!-- /.card-header -->
                  <form method="get" action="">
                     <div class="card-body">
                        <div class="row">
                           <div class="form-group col-md-2">
                              <label>Exam Name</label>
                              <input type="text" class="form-control" value=" {{ Request::get('name') }}" name = "name" placeholder="Exam Name">
                              <div style="color: red">{{ $errors->first('name') }}</div>
                           </div>

                           <div class="form-group col-md-2">
                              <label>Date</label>
                              <input type="date" class="form-control"  value=" {{ Request::get('date') }}" name = "date" placeholder="Exam Date">
                              <div style="color: red">{{ $errors->first('date') }}</div>
                           </div>
                           
                           <div class="form-group col-md-2">
                              <button type="submit" class="btn btn-primary" style="margin-top: 32px">Search</button>
                              <a href="{{ asset('admin/examination/exam/list') }}" class="btn btn-success" style="margin-top: 32px">Clear</a>
                           </div>
                        </div>
                     </div>
                  </form>
               </div>
               @include('message')
               <div class="card">
                  <div class="card-header">
                     <h3 class="card-title">Exam List</h3>
                  </div>
                  <div class="card-body p-0">
                     <table class="table table-striped">
                        <thead>
                           <tr>
                              <th>SR. No</th>
                              <th>Exam Name</th>
                              <th>Note</th>
                              <th>Created By</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach($getRecord as $value)
                           <tr>
                              <td>{{ $loop -> iteration }}</td>
                              <td>{{ $value->name }}</td>
                              <td>{{ $value->note }}</td>
                              <td>{{ $value->created_by_name }} {{ $value->created_by_last_name }}</td>
                              <td>
                                <a href="{{ asset('admin/examination/exam/edit/'.$value->id) }}" class="btn btn-primary">Edit Exam</a>
                                <a href="{{ asset('admin/examination/exam/delete/'.$value->id) }}" class="btn btn-danger">Delete</a> 
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