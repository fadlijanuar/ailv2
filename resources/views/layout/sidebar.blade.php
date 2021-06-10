    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
          <img src="{{asset('assets')}}/img/logo_pln.png" alt="Logo PLN" width="36px">
        </div>
        <div class="sidebar-brand-text mx-3">AIL</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="index.html">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Menu
      </div>

      <!-- Nav Item - User -->
      <li class="nav-item">
        <a class="nav-link" href="{{ route('user') }}">
          <i class="fas fa-fw fa-user"></i>
          <span>Users</span></a>
      </li>

      <!-- Nav Item - Unit -->
      <li class="nav-item">
        <a class="nav-link" href="{{ route('unit') }}">
          <i class="fas fa-fw fa-building"></i>
          <span>Unit</span></a>
      </li>

      <!-- Nav Item - Pelanggan -->
      <li class="nav-item">
        <a class="nav-link" href="{{ route('customer') }}">
          <i class="fas fa-fw fa-users"></i>
          <span>Pelanggan</span></a>
      </li>

      <!-- Nav Item - Dokumen Pelanggan -->
      <li class="nav-item">
        <a class="nav-link" href="{{ route('dokumen_pelanggan') }}">
          <i class="fas fa-fw fa-book"></i>
          <span>Dokumen Pelanggan</span></a>
      </li>

      <!-- Nav Item Verify -->
      <li class="nav-item">
        <a class="nav-link" href="{{ route('verifikasi') }}">
        <i class="fas fa-fw fa-clipboard-check"></i>
          <span>Verifikasi</span></a>
      </li>

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->
