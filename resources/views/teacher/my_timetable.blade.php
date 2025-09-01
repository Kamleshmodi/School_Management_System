@extends('layouts.app')
@section('content')
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1>My Timetable ({{  $getClass->name }} - {{ $getSubject->name }})</h1>
            </div>
         </div>
      </div>
   </section>
   <!-- Main content -->
   <section class="content">
      <div class="container-fluid">
         <div class="row">
            <div class="col-md-12">
               <div class="card">
                  <div class="card-header">
                     <h3 class="card-title">{{  $getClass->name }} - {{ $getSubject->name }}</h3>
                  </div>
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
                           @foreach($getRecord as $valueW)
                           <tr>
                              <td> {{ $valueW['week_name'] }} </td>
                              <td> {{ !empty($valueW['start_time']) ? date('H:i', strtotime($valueW['start_time'])) : '' }} </td>
                              <td> {{ !empty($valueW['end_time']) ? date('H:i', strtotime($valueW['end_time'])) : '' }} </td>
                              <td> {{ $valueW['room_number'] }} </td>
                           </tr>
                           @endforeach
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div> <!-- Closing container-fluid properly -->
   </section>
</div>  
@endsection
