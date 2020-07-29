<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <h10>PENJUALAN LAHAN</h10>
        <ul class="nav navbar-nav navbar-right">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="/penjual/beranda" class="" style="color: white">
                            Beranda
                        </a>
                    </li>
                    <li>
                        <a href="/penjual/datasaya" class="" style="color: white">
                            Data Saya
                        </a>
                    </li>
                    <li>
                        <a href="/penjual/survei" class="" style="color: white">
                            Data Survei
                        </a>
                    </li>
                    
                    <li class="dropdown user_profile">
                        <a href="#" style="color: white" onClick="return false;" class="dropdown-toggle"
                            data-toggle="dropdown" role="button">
                            {{Auth::user()->name}}
                            @if(Auth::user()->image !== null)
                            <img src="{{ asset(Auth::user()->image) }}" width="32" height="32" alt="User">
                            @else
                            <img src="{{ asset('assets/images/user_default.png') }}" width="32" height="32" alt="User">
                            @endif
                        </a>
                        <ul class="dropdown-menu pullDown">
                            <li class="body">
                                <ul class="user_dw_menu">
                                    <li>
                                        <a href="/penjual/profile">
                                            <i class="material-icons">person</i>Profile
                                        </a>
                                    </li>
                                    <li>
                                        <form id="logout-form" action="{{ route('penjual.logout') }}" method="POST"
                                            style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                        <a href="#" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                            <i class="material-icons">power_settings_new</i>Logout
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </ul>
    </div>
</nav>