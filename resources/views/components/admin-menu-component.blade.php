<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="/admin/index">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      @foreach ($admin_menus as $menu)
            @if ($menu->parent === 0)
                <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#{{ $menu->target_parent }}" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-menu-button-wide"></i><span>{{ $menu->name }}</span><i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="{{ $menu->target_parent }}" class="nav-content collapse " data-bs-parent="#{{ $menu->target_parent }}">
                        @foreach ($admin_menus as $menu_child)
                            @if ($menu_child->parent === $menu->id)
                                <li>
                                    <a href="{{ route($menu_child->route) }}">
                                        <i class="bi bi-circle"></i><span>{{ $menu_child->name }}</span>
                                    </a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </li>
            @endif
      @endforeach


    </ul>

  </aside><!-- End Sidebar-->
