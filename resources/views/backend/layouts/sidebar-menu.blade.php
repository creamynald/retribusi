@hasrole('super admin|admin|opd')
    <li class="nav-main-heading">Master Data</li>
    <li class="nav-main-item {{ request()->segment(2) == 'pemerintah-daerah' ? 'open' : '' }}">
        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false"
            href="#">
            <i class="nav-main-link-icon fa fa-money-bill-transfer"></i>
            <span class="nav-main-link-name">Pemerintah Daerah</span>
        </a>
        <ul class="nav-main-submenu">
            @hasrole('super admin|admin')
                <li class="nav-main-item">
                    <a class="nav-main-link {{ request()->segment(3) == 'data-umum' ? 'active' : '' }}"
                        href="{{ route('pemda.index') }}">
                        <span class="nav-main-link-name">Data Umum Pemda</span>
                    </a>
                </li>
            @endhasrole
            @hasrole('super admin|admin|opd')
                <li class="nav-main-item">
                    <a class="nav-main-link {{ request()->segment(3) == 'pengguna' ? 'active' : '' }}"
                        href="{{ route('pengguna.index') }}">
                        <span class="nav-main-link-name">Pengguna Aplikasi</span>
                    </a>
                </li>
            @endhasrole
            @hasrole('super admin|admin')
                <li class="nav-main-item">
                    <a class="nav-main-link {{ request()->segment(3) == 'opd' ? 'active' : '' }}"
                        href="{{ route('opd.index') }}">
                        <span class="nav-main-link-name">Data OPD</span>
                    </a>
                </li>
            @endhasrole
            @hasrole('super admin|admin|opd')
                <li class="nav-main-item">
                    <a class="nav-main-link {{ request()->segment(3) == 'upt' ? 'active' : '' }}"
                        href="{{ route('upt.index') }}">
                        <span class="nav-main-link-name">Data UPT</span>
                    </a>
                </li>
            @endhasrole
        </ul>
    </li>
@endhasrole
@hasrole('super admin|admin')
    <li class="nav-main-item">
        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false"
            href="#">
            <i class="nav-main-link-icon fa fa-bank"></i>
            <span class="nav-main-link-name">Rekening</span>
        </a>
        <ul class="nav-main-submenu">
            <li class="nav-main-item">
                <a class="nav-main-link" href="#">
                    <span class="nav-main-link-name">Input Kode Rekening</span>
                </a>
            </li>
        </ul>
    </li>
    <li class="nav-main-item {{ request()->segment(2) == 'jenis-pajak-daerah' ? 'open' : '' }}">
        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false"
            href="#">
            <i class="nav-main-link-icon fa fa-sort"></i>
            <span class="nav-main-link-name">Jenis Pajak Daerah</span>
        </a>
        <ul class="nav-main-submenu">
            <li class="nav-main-item">
                <a class="nav-main-link {{ request()->segment(3) == 'retribusi' ? 'active' : '' }}"
                    href="{{ route('retribusi.index') }}">
                    <span class="nav-main-link-name">Retribusi</span>
                </a>
            </li>
            <li class="nav-main-item">
                <a class="nav-main-link {{ request()->segment(3) == 'objek-retribusi' ? 'active' : '' }}"
                    href="{{ route('objek-retribusi.index') }}">
                    <span class="nav-main-link-name">Objek Retribusi</span>
                </a>
            </li>
            <li class="nav-main-item">
                <a class="nav-main-link {{ request()->segment(3) == 'rincian-objek' ? 'active' : '' }}"
                    href="{{ route('rincian-objek.index') }}">
                    <span class="nav-main-link-name">Rincian Objek</span>
                </a>
            </li>
        </ul>
    </li>
@endhasrole
<li class="nav-main-heading">Transaksi</li>
<li class="nav-main-item {{ request()->segment(2) == 'transaksi' ? 'open' : '' }}">
    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false"
        href="#">
        <i class="nav-main-link-icon fa fa-money-bill-transfer"></i>
        <span class="nav-main-link-name">Penerimaan</span>
    </a>
    <ul class="nav-main-submenu">
        <li class="nav-main-item">
            <a class="nav-main-link {{ request()->segment(3) == 'penerimaan' ? 'active' : '' }}" href="{{ route('penerimaan.index') }}">
                <span class="nav-main-link-name">Retribusi</span>
            </a>
        </li>
    </ul>
</li>
<li class="nav-main-heading">Laporan</li>
<li class="nav-main-item {{ request()->segment(2) == 'laporan' ? 'open' : '' }}">
    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false"
        href="#">
        <i class="nav-main-link-icon fa fa-money-bill-transfer"></i>
        <span class="nav-main-link-name">Penerimaan Retribusi</span>
    </a>
    <ul class="nav-main-submenu">
        <li class="nav-main-item">
            <a class="nav-main-link {{ request()->segment(3) == 'harian' ? 'active' : '' }}" href="{{ route('harian.index') }}">
                <span class="nav-main-link-name">Harian</span>
            </a>
        </li>
        <li class="nav-main-item">
            <a class="nav-main-link {{ request()->segment(3) == 'bulanan' ? 'active' : '' }}" href="{{ route('monthly_report') }}">
                <span class="nav-main-link-name">Bulanan</span>
            </a>
        </li>
        <li class="nav-main-item">
            <a class="nav-main-link {{ request()->segment(3) == 'tahunan' ? 'active' : '' }}" href="{{ route('annual_report') }}">
                <span class="nav-main-link-name">Tahunan</span>
            </a>
        </li>
        <li class="nav-main-item">
            <a class="nav-main-link {{ request()->segment(3) == 'target-dan-realisasi' ? 'active' : '' }}" href="{{ route('target') }}">
                <span class="nav-main-link-name">Target & Realisasi</span>
            </a>
        </li>
        <li class="nav-main-item">
            <a class="nav-main-link {{ request()->segment(3) == 'rekap' ? 'active' : '' }}" href="{{ route('rekap') }}">
                <span class="nav-main-link-name">Rekapitulasi</span>
            </a>
        </li>
    </ul>
</li>
@role('super admin')
    <li class="nav-main-heading">Administrator</li>
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
                <a class="nav-main-link {{ request()->segment(3) == 'permissions' ? 'active' : '' }}"
                    href="{{ route('permissions.index') }}">
                    <span class="nav-main-link-name">Permissions</span>
                </a>
            </li>
            <li class="nav-main-item">
                <a class="nav-main-link {{ request()->segment(3) == 'assignable' ? 'active' : '' }}"
                    href="{{ route('assignable.index') }}">
                    <span class="nav-main-link-name">Assign Permission</span>
                </a>
            </li>
            <li class="nav-main-item">
                <a class="nav-main-link {{ request()->segment(3) == 'assign' ? 'active' : '' }}"
                    href="{{ route('user.index') }}">
                    <span class="nav-main-link-name">Permission to Users</span>
                </a>
            </li>
        </ul>
    </li>
@endrole
