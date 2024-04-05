
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif

<!-- Button to clear session -->
<form action="{{ route('clear.session') }}" method="POST">
    @csrf
    <button type="submit" class="btn btn-danger">Clear Session</button>
</form>
