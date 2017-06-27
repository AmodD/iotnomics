
<header class="nav">
<div class="columns container">
<div class="column is-one-quarter">
<div class="nav-left nav-menu">
	<a class="nav-item is-tab" href="/"><span class="icon"><i class="fa fa-home"></i></span>&nbsp; CRYPTOINR</a>
        @if (Auth::check())
<!--	<a class="nav-item is-tab" href="#">Create Tournament</a>
	<a class="nav-item is-tab" href="#">Create Profile</a> -->
	@endif
</div>
</div>
<div class="column is-half">
</div>
<div class="column is-one-quarter">
<div class="nav-right nav-menu">
        @if (Auth::guest())
	<a class="nav-item is-tab" href=""><span class="icon"><i class="fa fa-user-plus"></i></span>&nbsp; Register</a>
	<a class="nav-item is-tab" href=""><span class="icon"><i class="fa fa-sign-in"></i></span>&nbsp; LogIn</a>
	@else
	<a class="nav-item is-tab" href="{{ route('register') }}"><span class="icon"><i class="fa fa-user-circle"></i></span>&nbsp; {{ Auth::user()->name }}</a>
	<a class="nav-item is-tab" href="{{ route('logout') }}" 
		onclick="event.preventDefault();document.getElementById('logout-form').submit();"><span class="icon"><i class="fa fa-sign-out"></i></span>&nbsp; LogOut</a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                 {{ csrf_field() }}
        </form>
        @endif
</div>

</div>

</div>

</header>

