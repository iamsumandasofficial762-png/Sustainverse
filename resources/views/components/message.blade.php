@if(session('error'))
<div class="error-toast error">
    <div class="toast-box">
        <h2><strong>Error</strong></h2>
        <p>{{ session('error') }}</p>
    </div>
</div>
@endif

@if(session('success'))
<div class="error-toast success">
    <div class="toast-box">
        <h2><strong>Success</strong></h2>
        <p>{{ session('success') }}</p>
    </div>
</div>
@endif
