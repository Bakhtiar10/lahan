<div>
    <aside id="leftsidebar" class="sidebar">
        <div class="menu">
            <ul class="list">
                <li class="sidebar-user-panel active">
                    <div class="user-panel">
                        <div class=" image">
                            <img src="{{ asset('assets/images/bakhtiar.jpg') }}" class="img-circle user-img-circle"
                                alt="User Image" />
                        </div>
                    </div>
                </li>

                <li class="">
                    <a href="/admin/beranda">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                <li>

                <li>
                    <a href="#" onClick="return false;" class="menu-toggle">
                        <i class="fas fa-paw"></i>
                        <span>Data User</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="/admin/datapenjual">Data Penjual</a>
                        </li>
                        <li>
                            <a href="/admin/datapembeli">Data Pembeli</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="/admin/datalahan">
                        <i class="fas fa-map"></i>
                        <span>Data Lahan</span>
                    </a>
                </li>

                <li>
                    <a href="#" onClick="return false;" class="menu-toggle">
                        <i class="fas fa-paw"></i>
                        <span>Komentar Website</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="/admin/penjual">Komentar Penjual</a>
                        </li>
                        <li>
                            <a href="/admin/pembeli">Komentar Pembeli</a>
                        </li>
                    </ul>
                </li>
                
                <li>
                    <a href="">
                        <i class="fas fa-flag"></i>
                        <span>Pemesanan</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Logout</span>
                    </a>


                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
        </div>
    </aside>
</div>