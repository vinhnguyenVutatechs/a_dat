@if (Session::get('alert_error'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        {{ Session::get('alert_error') }}
    </div>
@endif

@if (Session::get('alert_suscess'))
    <div class="alert alert-success" role="alert">
        {{ Session::get('alert_suscess') }}
    </div>
@endif
