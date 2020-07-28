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
                    <a href="#" onClick="return false;" class="menu-toggle">
                        <i class="fas fa-map"></i>
                        <span>Data Lahan</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="/admin/datalahanmasuk">Data Lahan Masuk</a>
                        </li>
                        <li>
                            <a href="/admin/datalahandijual">Data Lahan Dijual</a>
                        </li>
                        <li>
                            <a href="/admin/datalahansoldout">Data Lahan Soldout</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="#" onClick="return false;" class="menu-toggle">
                        <i class="fas fa-paw"></i>
                        <span>Report Website</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="/admin/penjual">Report Penjual</a>
                        </li>
                        <li>
                            <a href="/admin/pembeli">Report Pembeli</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="/admin/survei">
                        <i class="fas fa-flag"></i>
                        <span>Data Survei</span>
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