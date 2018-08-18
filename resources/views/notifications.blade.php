@if(session()->has('notification.success'))
    <div class="alert alert-success">
        {{ session()->get('notification.success') }}
    </div>
@endif
@if(session()->has('notification.error'))
    <div class="alert alert-warning">
        {{ session()->get('notification.error') }}
    </div>
@endif