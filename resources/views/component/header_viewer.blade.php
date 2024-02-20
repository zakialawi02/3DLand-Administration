<style>
    @media (max-width: 1184px) {
        header nav .nav-menu {
            display: flex;
        }
    }

    @media (max-width: 994px) {
        .nav-menu-group.show {
            top: 2rem !important;
        }
    }
</style>

<header>
    <nav>
        <div class="nav-logo">
            <div class="name-logo">
                <h1>RRR Representation <br> in 3D Land Administration Prototype</h1>
            </div>
        </div>
        <div class="nav-menu">
            <ul class="nav-menu-group">
                <li><a href="/" title="">Home</a></li>
                @guest
                    <li><a href="{{ route('login') }}" title="Login">Login</a></li>
                @else
                    <li><a href="{{ route('logout') }}" title="Logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                </li> @endguest
            </ul>
            <div id="hamb"><i class="bi bi-list"></i></div>
        </div>
    </nav>
</header>
