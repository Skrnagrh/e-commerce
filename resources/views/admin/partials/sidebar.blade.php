<aside class="main-sidebar sidebar-light-success elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="/images/shop.png" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Sayur Shop</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/admin/dist/img/user2-160x160.jpg" class="img-circle elevation-2">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      {{-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> --}}

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="/home" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                {{-- <i class="right fas fa-angle-right"></i> --}}
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/admin/category" class="nav-link {{ Request::is('admin/category') ? 'active' : '' }}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Category
                {{-- <span class="right badge badge-danger">New</span> --}}
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/admin/product" class="nav-link {{ Request::is('admin/product') ? 'active' : '' }}">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Product
                {{-- <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span> --}}
              </p>
            </a>
            {{-- <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/layout/top-nav.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Top Navigation</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Top Navigation + Sidebar</p>
                </a>
              </li>
            </ul> --}}
          </li>
          <li class="nav-item">
            <a href="/admin/order" class="nav-link {{ Request::is('admin/order') ? 'active' : '' }}">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Order
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/admin/order" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Order Proses</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Order Selesai</p>
                </a>
              </li>
            </ul>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>