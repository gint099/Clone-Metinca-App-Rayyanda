<li class="sidebar-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
    <a href="/dashboard" class='sidebar-link'>
        <i class="bi bi-grid-fill"></i>
        <span>Dashboard</span>
    </a>
</li>
<li class="sidebar-item {{ request()->routeIs('#') ? 'active' : '' }}">
    <a href="{{ route('pic.item.index') }}" class='sidebar-link'>
        <i class="bi bi-grid-fill"></i>
        <span>Manage Item</span>
    </a>
</li>
<li class="sidebar-item  ">
    <a href="#" class='sidebar-link'>
        <i class="bi bi-grid-1x2-fill"></i>
        <span>standalone menu</span>
    </a>
</li>
<li class="sidebar-item  has-sub">
    <a href="#" class='sidebar-link'>
        <i class="bi bi-stack"></i>
        <span>Menu with sub</span>
    </a>
    <ul class="submenu ">
        <li class="submenu-item  ">
            <a href="#" class="submenu-link">sub-menu</a>
        </li>
    </ul>
</li>
