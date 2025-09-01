@extends('layouts.app')
@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6"> 
          <h1>Add New Subject</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  @include('message')

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
                  <label>Subject Name</label>
                  <select class="form-control" id="subject_name" name="name" required>
                      <option value="">Select Type</option>
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

                  {{-- Others Text Box --}}
                  <input type="text" id="other_subject" name="other_subject" class="form-control mt-2" 
                        placeholder="Enter your subject" style="display: none;">
                </div>

                <div class="form-group">
                  <label>Subject Type</label>
                  <select class="form-control" name="type" required>
                      <option value="">Select Type</option>
                      <option value="THEORY">THEORY</option>
                      <option value="PRACTICAL">PRACTICAL</option>
                  </select>
                </div>

                <div class="form-group">
                  <label>Status</label>
                    <select class="form-control" name="status" required>
                        <option value="0">Active</option>
                        <option value="1">Inactive</option>
                    </select>
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

{{-- JavaScript to Show/Hide "Other Subject" Input --}}
<script>
    document.getElementById('subject_name').addEventListener('change', function() {
        var otherSubjectInput = document.getElementById('other_subject');
        if (this.value === 'OTHERS') {
            otherSubjectInput.style.display = 'block';
            otherSubjectInput.setAttribute('required', 'true');
        } else {
            otherSubjectInput.style.display = 'none';
            otherSubjectInput.removeAttribute('required');
        }
    });
</script>

@endsection
