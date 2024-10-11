@if(session('success'))
        <div class="alert alert-success">
            <i class="fa-solid fa-check fa-bounce"></i>&nbsp;{!! session('success') !!}
        </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        <i class="fa-solid fa-xmark fa-beat"></i>&nbsp;{!! session('error') !!}
    </div>
@endif

@if(session('warning'))
    <div class="alert alert-warning">
        <i class="fa-solid fa-exclamation fa-shake"></i>&nbsp;{!! session('warning') !!}
    </div>
@endif