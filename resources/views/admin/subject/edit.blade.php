@extends('layouts.app')
@section('content')

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6"> 
          <h1>Update Subject</h1>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <form method="post" action="">
              {{ csrf_field() }}
              <div class="card-body">

                <!-- Subject Name Dropdown -->
                <div class="form-group">
                  <label>Subject Name</label>
                  <select id="subject_name" class="form-control" name="name">
                      <option value="">Select Type</option>
                      @php
                          $subjects = [
                              "ARTS", "BASIC SCIENCE AND TECHNOLOGY", "BASIC TECHNOLOGY",
                              "COMMERCE", "MATHEMATICS", "BIOLOGY", "SOCIAL MEDIA",
                              "AGRICULTURE", "HEALTH"
                          ];
                          $existingSubject = $getRecord->name;
                      @endphp

                      @foreach($subjects as $subject)
                          <option value="{{ $subject }}" {{ $existingSubject == $subject ? 'selected' : '' }}>
                              {{ $subject }}
                          </option>
                      @endforeach

                      @if(!in_array($existingSubject, $subjects) && !empty($existingSubject))
                          <option value="{{ $existingSubject }}" selected>{{ $existingSubject }}</option>
                      @endif

                      <option value="OTHERS">Others</option>
                  </select>
                </div>

                <!-- Others Text Box (Hidden by Default) -->
                <div class="form-group" id="other_subject_div" style="display: none;">
                  <label>Enter New Subject</label>
                  <input type="text" id="other_subject" name="other_subject" class="form-control" placeholder="Enter new subject">
                </div>

                <!-- Subject Type -->
                <div class="form-group">
                  <label>Subject Type</label>
                  <select class="form-control" name="type" required>
                      <option value="">Select Type</option>
                      <option {{ (old('type', $getRecord->type) == 'THEORY') ? 'selected' : '' }} value="THEORY">THEORY</option>
                      <option {{ (old('type', $getRecord->type) == 'PRACTICAL') ? 'selected' : '' }} value="PRACTICAL">PRACTICAL</option>
                  </select>
                </div>

                <!-- Status -->
                <div class="form-group">
                  <label>Status</label>
                  <select class="form-control" name="status" required>
                      <option {{ (old('status', $getRecord->status) == 0) ? 'selected' : '' }} value="0">Active</option>
                      <option {{ (old('status', $getRecord->status) == 1) ? 'selected' : '' }} value="1">Inactive</option>
                  </select>
                </div>

              </div>

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<!-- JavaScript for Showing Others Input Field -->
<script>
document.addEventListener("DOMContentLoaded", function () {
    var subjectSelect = document.getElementById('subject_name');
    var otherSubjectDiv = document.getElementById('other_subject_div');
    var otherSubjectInput = document.getElementById('other_subject');

    function toggleOtherSubjectField() {
        if (subjectSelect.value === 'OTHERS') {
            otherSubjectDiv.style.display = 'block';
            otherSubjectInput.setAttribute('required', 'true');
        } else {
            otherSubjectDiv.style.display = 'none';
            otherSubjectInput.removeAttribute('required');
        }
    }

    subjectSelect.addEventListener('change', toggleOtherSubjectField);
    toggleOtherSubjectField(); // Ensure correct state on page load
});
</script>

@endsection
