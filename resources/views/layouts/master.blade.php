
@include('layouts.header')

@if(session()->has('success'))
<div class="alert alert-success text-center success-message"> 
{{session('success')}}    
</div>
@endif
@if(!isset($nonavbar))
@include('layouts.navbar')
@endif

@yield('content')



@if(!isset($nofoot))
@include('layouts.foot')
@endif

@include('layouts.footer')
