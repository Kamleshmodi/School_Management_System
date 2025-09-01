@extends('layouts.app')
  @section('content')
 

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6"> 
            <h1>Edit Exam</h1>
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
            <!-- general form elements -->
            <div class="card card-primary">
              <form method="post" action="">
                {{ csrf_field() }}
                <div class="card-body">
                    <div class="form-group">
                        <label>Exam Name</label>
                        <input type="text" class="form-control" value="{{ $getRecord->name }}" name="name" required placeholder="Name">
                        <div style="color: red">{{ $errors->first('name') }}</div>
                    </div>
                    <div class="form-group">
                        <label>Note</label>
                            <textarea class="form-control" name="note" rows="3" placeholder="Note">{{ $getRecord->note }}</textarea>
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