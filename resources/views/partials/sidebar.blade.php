<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
      <img src="/assets/images/logo/logo_kpu.png" alt="SI - KUL" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">SI- KUL</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/assets/images/pengguna/{{ $user->photo }}" class="img-circle elevation-2" alt="{{ $user->username }}">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ $user->username }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul
            class="nav nav-pills nav-sidebar flex-column"
            data-widget="treeview"
            role="menu"
            data-accordion="false"
        >
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          {{-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../../index.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v1</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../../index2.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v2</p>
                </a>
              </li>
            </ul>
          </li> --}}


          @foreach ($user->role->menus as $menu)
            <li class="nav-item mb-2 <?php if($menu->name == Session::get('activeMenu'))  echo 'menu-is-opening menu-open'; ?>">
                <a
                    href="#"
                    class="nav-link"
                >
                        <i class="nav-icon {{ $menu->icon }}"></i>
                        <p>
                            {{ $menu->name }}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                </a>
                <ul class="nav nav-treeview">
                    @foreach ($menu->submenus as $submenu)
                        @if($submenu->is_active == 1)
                            <li class="nav-item">
                                <a href="{{ $submenu->link }}" class="nav-link ml-3">
                                    <i class="{{ $submenu->icon }}"></i>
                                    <p class="ml-2">{{ $submenu->name }}</p>
                                </a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </li>
          @endforeach
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

