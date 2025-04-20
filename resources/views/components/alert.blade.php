@if (session('success'))
<p style="color: green">
    {{ session('success') }}
</p>
@endif

@if (session('error'))
<p style="color: red   ">
    {{ session('success') }}
</p>
@endif

@if ($errors->any())
<span style="color: red">
    @foreach ($errors->all() as $error)
        {{ $error }}<br>
    @endforeach
</span>
@endif