<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html"> <img alt="image" src="assets/img/logo.png" class="header-logo" />
                <span class="logo-name">Admin Panel</span>
            </a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="dropdown">
                <a href="{{ route('home') }}" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
            </li>
            <li class="dropdown">
                <a href="{{ route('admin.pages.index') }}" class="nav-link"><i data-feather="monitor"></i><span>Pages</span></a>
            </li>
            <li class="dropdown">
                <a href="{{ route('admin.categories.index') }}" class="nav-link"><i data-feather="monitor"></i><span>Categories</span></a>
            </li>
            <li class="dropdown">
                <a href="{{ route('admin.products.index') }}" class="nav-link"><i data-feather="monitor"></i><span>Products</span></a>
            </li>

        </ul>
    </aside>
</div>
