@can('create post')
<li class="nav-main-heading">Menu</li>
<li class="nav-main-item">
    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false"
        href="#">
        <i class="nav-main-link-icon far fa-note-sticky"></i>
        <span class="nav-main-link-name">Post</span>
    </a>
    <ul class="nav-main-submenu">
        <li class="nav-main-item">
            <a class="nav-main-link" href="javascript:void(0)">
                <span class="nav-main-link-name">Link #1</span>
            </a>
        </li>
        <li class="nav-main-item">
            <a class="nav-main-link" href="javascript:void(0)">
                <span class="nav-main-link-name">Link #2</span>
            </a>
        </li>
    </ul>
</li>
@endcan
<li class="nav-main-heading">Administrator</li>
@can('assign permission')
<li class="nav-main-item {{ request()->segment(2) == 'role-and-permission' ? 'open' : '' }}">
    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false"
        href="#">
        <i class="nav-main-link-icon fa fa-road-lock"></i>
        <span class="nav-main-link-name">Role & Permission</span>
    </a>
    <ul class="nav-main-submenu">
        <li class="nav-main-item">
            <a class="nav-main-link {{ request()->segment(3) == 'roles' ? 'active' : '' }}"
                href="{{ route('roles.index') }}">
                <span class="nav-main-link-name">Roles</span>
            </a>
        </li>
        <li class="nav-main-item">
            <a class="nav-main-link" href="#">
                <span class="nav-main-link-name">Permissions</span>
            </a>
        </li>
        <li class="nav-main-item">
            <a class="nav-main-link" href="#">
                <span class="nav-main-link-name">Assign Role</span>
            </a>
        </li>
    </ul>
</li>
@endcan