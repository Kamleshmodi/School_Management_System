@extends('layouts.app')
@section('content')
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1>Exam Shedule</h1>
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
                     <h3 class="card-title">Search Exam Schedule</h3>
                  </div>
                  <!-- /.card-header -->
                  <form method="get" action="">
                     <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-2">
                                <label>Exam</label>
                                <select class="form-control" name="exam_id">
                                    <option value="">Select</option>
                                    @foreach($getExam as $exam)
                                    <option {{ (Request::get('exam_id') == $exam->id) ? 'selected' : '' }} value="{{ $exam->id }}">{{ $exam->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                
                            <div class="form-group col-md-2">
                                <label>Class</label>
                                <select class="form-control" name="class_id">
                                    <option value="">Select</option>
                                    @foreach($getClass as $class)
                                    <option {{ (Request::get('class_id') == $class->id) ? 'selected' : '' }} value="{{ $class->id }}">{{ $class->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                
                            <div class="form-group col-md-2">
                                <button type="submit" class="btn btn-primary" style="margin-top: 32px">Search</button>
                                <a href="{{ asset('admin/examination/exam_schedule') }}" class="btn btn-success" style="margin-top: 32px">Clear</a>
                            </div>
                        </div>
                    </div>
                  </form>
               </div>
               @include('message')
               <form method="post" action="{{ url('admin/examination/exam_schedule_insert') }}">
                  @csrf
                  <input type="hidden" name="exam_id" value="{{ Request::get('exam_id') }}">
                  <input type="hidden" name="class_id" value="{{ Request::get('class_id') }}">
                  <!-- Table and other inputs go here -->

                  <div class="card">
                     <div class="card-header">
                        <h3 class="card-title">Exam Schedule</h3>
                     </div>
                     <div class="card-body p-0">
                        <table class="table table-striped">
                           <thead> 
                              <tr>
                                 <th>Subject Name</th>
                                 <th>Exam Date</th>
                                 <th>Start Time</th>
                                 <th>End Time</th>
                                 <th>Room No.</th>
                                 <th>Full Marks</th>
                                 <th>Passing Marks</th>
                              </tr>
                           </thead>
                           <tbody>
                              @php $i = 1; @endphp
                              @foreach($getRecord as $value)
                              <tr>
                                 <td>{{ $value['subject_name'] }} 
                                    <input type="hidden" class="form-control" name="schedule[{{ $i }}][subject_id]" value="{{ $value['subject_id'] }}">
                                 </td>
                                 <td>
                                    <input type="date" class="form-control" name="schedule[{{ $i }}][exam_date]" value="{{ $value['exam_date'] }}">
                                 </td>
                                 <td>
                                    <input type="time" class="form-control" name="schedule[{{ $i }}][start_time]" value="{{ $value['start_time'] }}">
                                 </td>
                                 <td>
                                    <input type="time" class="form-control" name="schedule[{{ $i }}][end_time]" value="{{ $value['end_time'] }}">
                                 </td>
                                 <td>
                                    <input type="number" class="form-control" name="schedule[{{ $i }}][room_no]" value="{{ $value['room_no'] }}">
                                 </td>
                                 <td> 
                                    <input type="number" class="form-control" name="schedule[{{ $i }}][full_marks]" value="{{ $value['full_marks'] }}">
                                 </td> 
                                 <td>
                                    <input type="number" class="form-control" name="schedule[{{ $i }}][passing_marks]" value="{{ $value['passing_marks'] }}">
                                 </td> 
                                 @php
                                    $i++;
                                 @endphp
                              </tr>
                              @endforeach
                           </tbody>
                        </table>
                        <div style="text-align: center; padding: 20px;">
                           <button type="submit" class="btn btn-primary" style="margin-top: 32px">Save</button>
                        </div>
                     </div>
                     <!-- /.card-body -->
                  </div>

               </form>
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