<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3 mt-2"><h4><b>SICLEAN</b></h4></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('/') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Master Data
    </div>
    
    <!-- Nav Item - Pelanggan -->
    <li class="nav-item {{ request()->is('pelanggan*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('pelanggan') }}">
            <i class="fas fa-users"></i>
            <span>Pelanggan</span></a>
    </li>
    
    <!-- Nav Item - Layanan -->
    <li class="nav-item {{ request()->is('layanan*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('layanan') }}">
            <i class="fas fa-concierge-bell"></i>
            <span>Layanan</span></a>
    </li>
    
    <!-- Nav Item - Transaksi -->
    <li class="nav-item {{ request()->is('transaksi*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('transaksi') }}">
            <i class="fas fa-exchange-alt"></i>
            <span>Transaksi</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Laporan
    </div>

    <!-- Nav Item - Laporan -->
    <li class="nav-item {{ request()->is('laporan*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('laporan') }}">
            <i class="fas fa-file-alt"></i>
            <span>Laporan</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>

