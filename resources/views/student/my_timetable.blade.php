@extends('layouts.app')
@section('content')
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1>My Timetable</h1>
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
                                    <th>Week Name</th>
                                    <th>Start Time</th>
                                    <th>End Time</th>
                                    <th>Room Number</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($value['week'] as $valueW)
                                <tr>                                   
                                    <th> {{ $valueW['week_name'] }} </th>
                                    <td> {{ !empty($valueW['start_time']) ? date('H:i', strtotime($valueW['start_time'])) : '' }} </td>
                                    <td> {{ !empty($valueW['end_time']) ? date('H:i', strtotime($valueW['end_time'])) : '' }} </td>
                                    <td> {{ $valueW['room_number'] }} </td>
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
@section('script')
<script type="text/javascript">
   $(document).ready(function() {
       $('.getClass').change(function() {
           var class_id = $(this).val();
           
           $.ajax({
               url: "{{ url('admin/class_timetable/get_subject') }}",
               type: "POST",
               data: {
                   "_token": "{{ csrf_token() }}",
                   "class_id": class_id
               },
               dataType: "json",
               success: function(response) {
                   $('.getSubject').html(response.html);
               },
               error: function(xhr) {
                   console.log(xhr.responseText);
               }
           });
       });
   });
</script>
@endsection