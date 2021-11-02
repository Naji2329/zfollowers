
@include('admins.layouts.header')

@if(!isset($nosidebar))
@include('admins.layouts.sidebar')
@endif

@if(!isset($nonav))
@include('admins.layouts.navbar')
@endif

@yield('content')



@if(!isset($nofooter))

@include('admins.layouts.footer')
@endif

