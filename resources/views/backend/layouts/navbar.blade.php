<div class="content-header">
    <!-- Left Section -->
    <div class="space-x-1">
        <!-- Toggle Sidebar -->
        <!-- Layout API, functionality initialized in Codebase() -> uiApiLayout() -->
        <button type="button" class="btn btn-sm btn-alt-secondary" data-toggle="layout" data-action="sidebar_toggle">
            <i class="fa fa-fw fa-bars"></i>
        </button>
        <!-- END Toggle Sidebar -->

        <!-- Open Search Section -->
        <!-- Layout API, functionality initialized in Codebase() -> uiApiLayout() -->
        <span>{{ config('app.subname') }}</span>
        <!-- END Open Search Section -->
    </div>
    <!-- END Left Section -->

    <!-- Right Section -->
    <div class="space-x-1">
        <!-- User Dropdown -->
        <div class="dropdown d-inline-block">
            <button type="button" class="btn btn-sm btn-alt-secondary" id="page-header-user-dropdown"
                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-user d-sm-none"></i>
                <span class="d-none d-sm-inline-block fw-semibold">{{ Auth::user()->name }}</span>
                <i class="fa fa-angle-down opacity-50 ms-1"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-md dropdown-menu-end p-0"
                aria-labelledby="page-header-user-dropdown">
                <div class="p-2">
                    <a class="dropdown-item d-flex align-items-center justify-content-between space-x-1"
                        href="{{ route('profile.index') }}">
                        <span>Profile</span>
                        <i class="fa fa-fw fa-user opacity-25"></i>
                    </a>
                    <a class="dropdown-item d-flex align-items-center justify-content-between"
                        href="be_pages_generic_inbox.html">
                        <span>Inbox</span>
                        <i class="fa fa-fw fa-envelope-open opacity-25"></i>
                    </a>
                    <a class="dropdown-item d-flex align-items-center justify-content-between space-x-1"
                        href="be_pages_generic_invoice.html">
                        <span>Invoices</span>
                        <i class="fa fa-fw fa-file opacity-25"></i>
                    </a>
                    <div class="dropdown-divider"></div>

                    <!-- Toggle Side Overlay -->
                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                    <a class="dropdown-item d-flex align-items-center justify-content-between space-x-1"
                        href="javascript:void(0)" data-toggle="layout" data-action="side_overlay_toggle">
                        <span>Settings</span>
                        <i class="fa fa-fw fa-wrench opacity-25"></i>
                    </a>
                    <!-- END Side Overlay -->

                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item d-flex align-items-center justify-content-between space-x-1"
                        href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        <span>Sign Out</span>
                        <i class="fa fa-fw fa-sign-out-alt opacity-25"></i>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
        <!-- END User Dropdown -->
    </div>
    <!-- END Right Section -->
</div>
