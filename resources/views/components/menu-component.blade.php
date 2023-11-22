<div class="col-lg-6 col-md-6">
    <nav class="header__menu mobile-menu">
        <ul>
            @foreach ($menus as $menu)
                <li class=""><a href="{{ route($menu->route) }}">{{ $menu->name }}</a></li>
            @endforeach
        </ul>
    </nav>
</div>
