@if($errors->any())
    @foreach ($errors->all() as $error)
        <div class='error-mess'>
            {{ $error }}
        </div>
    @endforeach
@endif

@if(session('success'))
    <div class='success-mess'>{{ session('success') }}</div>
@endif

@if(session('error'))
    <div class='error-mess'>{{ session('error') }}</div>
@endif