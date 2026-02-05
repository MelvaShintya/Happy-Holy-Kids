<!-- SIDEBAR -->
<div class="col-md-2 sidebar p-0">
    <div class="sidebar-header">
        <h5 class="text-white m-0">
            <i class="fa-solid fa-graduation-cap"></i><br>
            <span style="font-size: 0.9rem; letter-spacing: 1px;">Happy Holy Kids</span>
        </h5>
    </div>

    <div class="nav-menu">
        <div class="menu-label">Main Menu</div>
        <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}"><i class="fa-solid fa-tachometer-alt"></i> Dashboard</a>
        <a href="{{ route('registration.list') }}" class="{{ request()->routeIs('registration.*') ? 'active' : '' }}"><i class="fa-solid fa-users"></i> Data Pendaftar</a>
        <a href="{{ route('report.list') }}" class="{{ request()->routeIs('report.*') ? 'active' : '' }}"><i class="fa-solid fa-file"></i> Laporan</a>

        <hr>

        <a href="{{ route('logout') }}" class="text-warning"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
    </div>
</div>
