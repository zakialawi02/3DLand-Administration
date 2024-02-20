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
                <h1>DASHBOARD</h1>
                <!-- <span>RRR Representation in 3D Land Administration Prototype</span> -->
            </div>
        </div>
        <div class="nav-menu">
            <ul class="nav-menu-group">
                <li><a href="/" title="">Home</a></li>
                <!-- <li><a href="/data/uri" title="">URI Data</a></li>
                    <li><a href="/data/parcel" title="">Parcel Data</a></li> -->
                @guest
                    <li><a href="{{ route('login') }}" title="Login">Login</a></li>
                @else
                    <li><a href="/dashboard" title="">Dashboard</a></li>
                    <li><a href="{{ route('logout') }}" title="Logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                @endguest
            </ul>
            <div id="hamb"><i class="bi bi-list"></i></div>
        </div>
    </nav>
</header>
