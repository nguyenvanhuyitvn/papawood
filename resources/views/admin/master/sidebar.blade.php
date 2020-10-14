
  


  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="uploads/images/logo.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Papawood</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            {{-- Get menu from view composer --}}
                    @forelse($menuDashboard as $menu)
                        <li class="nav-item {{ $menu['class'] }}">
                            <a class="nav-link {{ $menu['active'] }}"
                               href="{{ $menu['url'] }}">
                                {!! $menu['icon'] !!}
                                <span>{{ $menu['label'] }} @if(isset($menu['children'])) <i class="float-right fas fa-angle-left right"></i> @endif </span>
                            </a>
                            @if(isset($menu['children']))
                                <ul class="nav nav-treeview">
                                    @forelse($menu['children'] as $child)
                                        <li class="nav-item ml_5">
                                            <a href="{{ $child['url'] }}"
                                               class="nav-link text-sm {{ $child['active'] }}">
                                                {!! $child['icon'] !!}
                                                <p>{{ $child['label'] }}</p>
                                            </a>
                                        </li>
                                    @empty
                                    @endforelse
                                </ul>
                            @endif
                        </li>
                    @empty
                    @endforelse
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
