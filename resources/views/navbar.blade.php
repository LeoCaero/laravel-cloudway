<!-- Navigation -->
<nav>@if (Auth::user())
    <a>Has fet login com a <strong>{{auth()->user()->name}}</strong></a>
    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a><br><br>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    @else
    <a href="{{ route('login') }}">Login</a>
    &nbsp;&nbsp;&nbsp;
    <a href="{{ route('register') }}">Register</a><br><br>
    @endif
    <a href="{{ route('home') }}">Inici</a>
    &nbsp;&nbsp;&nbsp;
    <a href="{{ route('llibre_list') }}">Llibres</a>
    &nbsp;&nbsp;&nbsp;
    <a href="{{ route('autor_list') }}">Autors</a>
    &nbsp;&nbsp;&nbsp;
</nav>