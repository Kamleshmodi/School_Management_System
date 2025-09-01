@if(!@empty(session('success')))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endempty

@if(!@empty(session('error')))
    <div class="alert alert-danger" role="alert">
        {{ session('error') }}
    </div>
@endempty

@if(!@empty(session('payment-error')))
    <div class="alert alert-danger" role="alert">
        {{ session('payment-error') }}
    </div>
@endempty

@if(!@empty(session('info')))
    <div class="alert alert-info" role="alert">
        {{ session('info') }}
    </div>
@endempty

@if(!@empty(session('warning')))
    <div class="alert alert-warning" role="alert">
        {{ session('warning') }}
    </div>
@endempty

@if(!@empty(session('secondary')))
    <div class="alert alert-secondary" role="alert">
        {{ session('secondary') }}
    </div>
@endempty

@if(!@empty(session('primary')))
    <div class="alert alert-primary" role="alert">
        {{ session('primary') }}
    </div>
@endempty

@if(!@empty(session('light')))
    <div class="alert alert-light" role="alert">
        {{ session('light') }}
    </div>
@endempty