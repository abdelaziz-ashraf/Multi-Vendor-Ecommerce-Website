<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Stisla</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="dropdown active">
                <a href="{{ route('admin.dashboard') }}" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>

            <li class="menu-header">Starter</li>
            <li class="dropdown {{ setSidebarActive(['admin.categories.*', 'admin.sub-categories*', 'admin.child-categories.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Mange Categories</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ setSidebarActive(['admin.categories.*']) }}"><a class="nav-link" href="{{ route('admin.categories.index') }}">Category</a></li>
                    <li class="{{ setSidebarActive(['admin.sub-categories.*']) }}"><a class="nav-link" href="{{ route('admin.sub-categories.index') }}">Sub Categories</a></li>
                    <li class="{{ setSidebarActive(['admin.child-categories.*']) }}" ><a class="nav-link" href="{{ route('admin.child-categories.index') }}">Child Categories</a></li>
                </ul>
            </li>
            <li class="dropdown {{ setSidebarActive(['admin.slider.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Mange Website</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ setSidebarActive(['admin.slider.*']) }}"><a class="nav-link" href="{{ route('admin.slider.index') }}">Slider</a></li>
                </ul>
            </li>

            <li class="dropdown {{ setSidebarActive(['admin.brands.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Mange Product</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ setSidebarActive(['admin.brands.*']) }}"><a class="nav-link" href="{{ route('admin.brands.index') }}">Brands</a></li>
                </ul>
            </li>

{{--            <li class="menu-header">Starter</li>--}}
{{--            <li class="dropdown">--}}
{{--                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Layout</span></a>--}}
{{--                <ul class="dropdown-menu">--}}
{{--                    <li><a class="nav-link" href="layout-default.html">Default Layout</a></li>--}}
{{--                    <li><a class="nav-link" href="layout-transparent.html">Transparent Sidebar</a></li>--}}
{{--                    <li><a class="nav-link" href="layout-top-navigation.html">Top Navigation</a></li>--}}
{{--                </ul>--}}
{{--            </li>--}}
{{--            <li><a class="nav-link" href="blank.html"><i class="far fa-square"></i> <span>Blank Page</span></a></li>--}}

        </ul>
    </aside>
</div>
