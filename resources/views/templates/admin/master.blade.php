@include('templates.admin.header')

<div class="space"></div>
<div class="container">
	@if(Auth::check())
	<h4 class="text-success">Xin chào, {{ Auth::user()->fullname }}</h4>
	@endif
</div>
@yield('content')

@include('templates.admin.footer')