@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


{{--@error('title')--}}
{{--<div class="alert alert-danger">{{ $message }}</div>--}}
{{--@enderror--}}
