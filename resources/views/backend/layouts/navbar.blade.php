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
        <button type="button" class="btn btn-sm btn-alt-secondary" data-toggle="layout" data-action="header_search_on">
            <i class="fa fa-fw fa-search"></i>
        </button>
        <!-- END Open Search Section -->

        <!-- Color Themes (used just for demonstration) -->
        <!-- Themes functionality initialized in Codebase() -> uiHandleTheme() -->
        <div class="dropdown d-inline-block">
            <button type="button" class="btn btn-sm btn-alt-secondary" id="page-header-themes-dropdown"
                data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-paint-brush"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-lg p-0" aria-labelledby="page-header-themes-dropdown">
                <div class="p-3 bg-body-light rounded-top">
                    <h5 class="h6 text-center mb-0">
                        Color Themes
                    </h5>
                </div>
                <div class="p-3">
                    <div class="row g-0 text-center">
                        <div class="col-2">
                            <a class="text-default" data-toggle="theme" data-theme="default" href="javascript:void(0)">
                                <i class="fa fa-2x fa-circle"></i>
                            </a>
                        </div>
                        <div class="col-2">
                            <a class="text-elegance" data-toggle="theme"
                                data-theme="{{ asset('assets/css/themes/elegance.min.css') }}"
                                href="javascript:void(0)">
                                <i class="fa fa-2x fa-circle"></i>
                            </a>
                        </div>
                        <div class="col-2">
                            <a class="text-pulse" data-toggle="theme"
                                data-theme="{{ asset('assets/css/themes/pulse.min.css') }}" href="javascript:void(0)">
                                <i class="fa fa-2x fa-circle"></i>
                            </a>
                        </div>
                        <div class="col-2">
                            <a class="text-flat" data-toggle="theme"
                                data-theme="{{ asset('assets/css/themes/flat.min.css') }}" href="javascript:void(0)">
                                <i class="fa fa-2x fa-circle"></i>
                            </a>
                        </div>
                        <div class="col-2">
                            <a class="text-corporate" data-toggle="theme"
                                data-theme="{{ asset('assets/css/themes/corporate.min.css') }}"
                                href="javascript:void(0)">
                                <i class="fa fa-2x fa-circle"></i>
                            </a>
                        </div>
                        <div class="col-2">
                            <a class="text-earth" data-toggle="theme"
                                data-theme="{{ asset('assets/css/themes/earth.min.css') }}" href="javascript:void(0)">
                                <i class="fa fa-2x fa-circle"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Color Themes -->
    </div>
    <!-- END Left Section -->

    <!-- Right Section -->
    <div class="space-x-1">
        <!-- User Dropdown -->
        <div class="dropdown d-inline-block">
            <button type="button" class="btn btn-sm btn-alt-secondary" id="page-header-user-dropdown"
                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-user d-sm-none"></i>
                <span class="d-none d-sm-inline-block fw-semibold">J. Smith</span>
                <i class="fa fa-angle-down opacity-50 ms-1"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-md dropdown-menu-end p-0"
                aria-labelledby="page-header-user-dropdown">
                <div class="px-2 py-3 bg-body-light rounded-top">
                    <h5 class="h6 text-center mb-0">
                        John Smith
                    </h5>
                </div>
                <div class="p-2">
                    <a class="dropdown-item d-flex align-items-center justify-content-between space-x-1"
                        href="be_pages_generic_profile.html">
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
                        href="op_auth_signin.html">
                        <span>Sign Out</span>
                        <i class="fa fa-fw fa-sign-out-alt opacity-25"></i>
                    </a>
                </div>
            </div>
        </div>
        <!-- END User Dropdown -->
    </div>
    <!-- END Right Section -->
</div>
