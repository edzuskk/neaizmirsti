<nav class="navbar">
    <div class="navbar-container">
        <div class="navbar-brand">
            <a href="/" style="text-decoration: none">💎Neaizmirsti!</a>
        </div>
        <ul class="navbar-menu">
            @guest
                <li><a href="/">Sākums</a></li>
                <li><a href="/login" class="nav-btn-login">Pieslēgties</a></li>
                <li><a href="/register" class="nav-btn-register" >Reģistrēties</a></li>
            @endguest
            @auth
                <li><a href="/dashboard">Jūsu neaizmirstuļi</a>&nbsp |</li>
                <li class="helper"><a href="/helper">Palīgs</a>&nbsp |</li>
                <li class="nav-user"><a href="/profile">{{ Auth::user()->name }}</a> &nbsp |</li>
                <li>
                    <form method="POST" action="/logout" style="display:inline;"> 
                        @csrf
                        <a href="/logout" onclick="event.preventDefault(); this.closest('form').submit();">⍈Iziet</a>
                    </form>
                </li>
            @endauth
        </ul>
    </div>
</nav>