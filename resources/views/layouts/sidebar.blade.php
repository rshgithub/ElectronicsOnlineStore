<nav class="sidebar sidebar-offcanvas" id="sidebar">

    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link"  href="{{ route('dashboard') }}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Electronic</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('users.index') }}">
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">Users</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('categories.index') }}">
                <i class="icon-columns menu-icon"></i>
                <span class="menu-title">Categories</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('products.index') }}">
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">Products</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('ads.index') }}">
                <i class="icon-columns menu-icon"></i>
                <span class="menu-title">Ads</span>
            </a>
        </li>

    </ul>
</nav>
