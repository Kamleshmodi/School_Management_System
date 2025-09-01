@extends('layouts.app')
@section('content')
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1>Exam Timetable</h1>
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
    
    @include('message')

    @foreach ($getRecord as $value)
               <div class="card">
                  <div class="card-header">
                     <h3 class="card-title">{{ $value['name'] }}</h3>
                  </div>

                <!-- /.card-header -->
                    <div class="card-body p-0">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Subject Name</th>
                                    <th>Day</th>
                                    <th>Exam Date</th>
                                    <th>Start Time</th>
                                    <th>End Time</th>
                                    <th>Room Number</th>
                                    <th>Full Marks</th>
                                    <th>Passing Marks</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($value['exam'] as $valueW)
                                <tr>
                                    <td>{{ $valueW['subject_name'] }}</td>
                                    <td>{{ date('l', strtotime($valueW['exam_date'])) }}</td>
                                    <td>{{ date('d/m/Y', strtotime($valueW['exam_date'])) }}</td>
                                    <td>{{ !empty($valueW['start_time']) ? date('H:i', strtotime($valueW['start_time'])) : '' }}</td>   
                                    <td>{{ !empty($valueW['end_time']) ? date('H:i', strtotime($valueW['end_time'])) : '' }}</td>
                                    <td>{{ $valueW['room_no'] }}</td>
                                    <td>{{ $valueW['full_marks'] }}</td>
                                    <td>{{ $valueW['passing_marks'] }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
        @endforeach
                </div>
                  <!-- /.card-body -->
               </div>
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
