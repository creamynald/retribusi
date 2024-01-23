@extends('backend.layouts.app')

@section('title', 'Laporan')
@section('subTitle', 'Rekapitulasi Penerimaan Retribusi')

@section('content')
    <div class="content">
        <h2 class="content-heading d-flex justify-content-between align-items-center">
            <span>@yield('subTitle')</span>
            <div class="space-x-1">
                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modal-compose">New
                    Message</button>
                <button type="button" class="btn btn-sm btn-alt-primary d-md-none" data-toggle="class-toggle"
                    data-target=".js-inbox-nav" data-class="d-none d-md-block">Menu</button>
            </div>
        </h2>
        <div class="row">
            <div class="col-md-5 col-xl-3">
                <!-- Last Input Retribusi -->
                <div class="block d-none d-md-block">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Users</h3>
                        <div class="block-options">
                            <div class="dropdown">
                                <button type="button" class="btn-block-option" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-fw fa-ellipsis-v"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item active" href="javascript:void(0)">
                                        <i class="fa fa-fw fa-users opacity-50 me-1"></i> All
                                    </a>
                                    <a class="dropdown-item" href="javascript:void(0)">
                                        <i class="fa fa-fw fa-circle opacity-50 text-success me-1"></i> Online
                                    </a>
                                    <a class="dropdown-item" href="javascript:void(0)">
                                        <i class="fa fa-fw fa-circle opacity-50 text-danger me-1"></i> Busy
                                    </a>
                                    <a class="dropdown-item" href="javascript:void(0)">
                                        <i class="fa fa-fw fa-circle opacity-50 text-warning me-1"></i> Away
                                    </a>
                                    <a class="dropdown-item" href="javascript:void(0)">
                                        <i class="fa fa-fw fa-circle opacity-50 text-muted me-1"></i> Offline
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="javascript:void(0)">
                                        <i class="fa fa-fw fa-cogs opacity-50 me-1"></i> Manage
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block-content p-3">
                        <ul class="nav-users">
                            <li>
                                <a href="be_pages_generic_profile.html">
                                    <img class="img-avatar" src="assets/media/avatars/avatar7.jpg" alt="">
                                    <i class="fa fa-circle text-success"></i>
                                    <div>Melissa Rice</div>
                                    <div class="fw-normal fs-xs text-muted">
                                        <i class="fa fa-location-arrow"></i> New York
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="be_pages_generic_profile.html">
                                    <img class="img-avatar" src="assets/media/avatars/avatar12.jpg" alt="">
                                    <i class="fa fa-circle text-success"></i>
                                    <div>Ralph Murray</div>
                                    <div class="fw-normal fs-xs text-muted">
                                        <i class="fa fa-location-arrow"></i> San Fransisco
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="be_pages_generic_profile.html">
                                    <img class="img-avatar" src="assets/media/avatars/avatar5.jpg" alt="">
                                    <i class="fa fa-circle text-warning"></i>
                                    <div>Sara Fields</div>
                                    <div class="fw-normal fs-xs text-muted">
                                        <i class="fa fa-location-arrow"></i> Beijing
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="be_pages_generic_profile.html">
                                    <img class="img-avatar" src="assets/media/avatars/avatar14.jpg" alt="">
                                    <i class="fa fa-circle text-warning"></i>
                                    <div>Ralph Murray</div>
                                    <div class="fw-normal fs-xs text-muted">
                                        <i class="fa fa-location-arrow"></i> Tokyo
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="be_pages_generic_profile.html">
                                    <img class="img-avatar" src="assets/media/avatars/avatar11.jpg" alt="">
                                    <i class="fa fa-circle text-danger"></i>
                                    <div>Ralph Murray</div>
                                    <div class="fw-normal fs-xs text-muted">
                                        <i class="fa fa-location-arrow"></i> London
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="be_pages_generic_profile.html">
                                    <img class="img-avatar" src="assets/media/avatars/avatar3.jpg" alt="">
                                    <i class="fa fa-circle text-danger"></i>
                                    <div>Helen Jacobs</div>
                                    <div class="fw-normal fs-xs text-muted">
                                        <i class="fa fa-location-arrow"></i> Rio De Janeiro
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- END Last Input Retribusi -->
            </div>
            <div class="col-md-7 col-xl-9">
                <!-- Message List -->
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <div class="block-title">
                            <strong>TOP 10</strong>
                        </div>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-toggle="block-option">
                                <i class="si si-arrow-left"></i>
                            </button>
                            <button type="button" class="btn-block-option" data-toggle="block-option">
                                <i class="si si-arrow-right"></i>
                            </button>
                            <button type="button" class="btn-block-option" data-toggle="block-option"
                                data-action="state_toggle" data-action-mode="demo">
                                <i class="si si-refresh"></i>
                            </button>
                            <button type="button" class="btn-block-option" data-toggle="block-option"
                                data-action="fullscreen_toggle"></button>
                        </div>
                    </div>
                    <div class="block-content">
                        <!-- Messages -->
                        <!-- Checkable Table (.js-table-checkable class is initialized in Helpers.cbTableToolsCheckable()) -->
                        <table class="js-table-checkable table table-hover table-vcenter">
                            <tbody>
                                @foreach ($datas as $index => $row)
                                    <tr>
                                        <td class="text-center">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="cb-inbox-1" name="cb-inbox-1">
                                                <label class="form-check-label" for="cb-inbox-1"></label>
                                            </div>
                                        </td>
                                        <td class="d-none d-sm-table-cell fw-semibold" style="width: 140px;">Jose Wagner
                                        </td>
                                        <td>
                                            <a class="fw-semibold" data-bs-toggle="modal" data-bs-target="#modal-message"
                                                href="#">Welcome to our service</a>
                                            <div class="text-muted mt-1">It's a pleasure to have you on our service..</div>
                                        </td>
                                        <td class="d-none d-xl-table-cell fw-semibold fs-sm text-muted"
                                            style="width: 120px;">
                                            WED</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- END Messages -->
                    </div>
                </div>
                <!-- END Message List -->
            </div>
        </div>

        <!-- Compose Modal -->
        <div class="modal fade" id="modal-compose" tabindex="-1" role="dialog" aria-labelledby="modal-compose"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form class="my-2" action="be_pages_generic_inbox.html" method="POST" onsubmit="return false;">
                        <div class="block block-rounded shadow-none mb-0">
                            <div class="block-header block-header-default">
                                <h3 class="block-title">
                                    <i class="fa fa-pencil-alt opacity-50 me-1"></i> New Message
                                </h3>
                                <div class="block-options">
                                    <button type="button" class="btn-block-option" data-dismiss="modal"
                                        aria-label="Close">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="block-content">
                                <div class="mb-4">
                                    <label class="form-label" for="message-email">Email</label>
                                    <div class="input-group">
                                        <input type="email" class="form-control" id="message-email"
                                            name="message-email" placeholder="Where to send?">
                                        <span class="input-group-text">
                                            <i class="si si-envelope-open"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label" for="message-subject">Subject</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="message-subject"
                                            name="message-subject" placeholder="What is this about?">
                                        <span class="input-group-text">
                                            <i class="si si-book-open"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label" for="message-msg">Message</label>
                                    <textarea class="form-control" id="message-msg" name="message-msg" rows="6"
                                        placeholder="Write your message.."></textarea>
                                    <div class="form-text fs-sm text-muted">Feel free to use common tags:
                                        &lt;blockquote&gt;, &lt;strong&gt;, &lt;em&gt;</div>
                                </div>
                            </div>
                            <div class="block-content block-content-full block-content-sm text-end border-top">
                                <button type="button" class="btn btn-alt-secondary" data-bs-dismiss="modal">
                                    Cancel
                                </button>
                                <button type="button" class="btn btn-alt-primary" data-bs-dismiss="modal">
                                    <i class="fa fa-paper-plane opacity-50 me-1"></i> Send Message
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- END Compose Modal -->

        <!-- Message Modal -->
        <div class="modal fade" id="modal-message" tabindex="-1" role="dialog" aria-labelledby="modal-message"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-popout" role="document">
                <div class="modal-content">
                    <div class="block block-rounded shadow-none mb-0">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Welcome to our service</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-toggle="tooltip"
                                    data-placement="left" title="Reply">
                                    <i class="fa fa-reply"></i>
                                </button>
                                <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content block-content-full bg-image text-center"
                            style="background-image: url('assets/media/photos/photo6.jpg');">
                            <img class="img-avatar img-avatar96 img-avatar-thumb" src="assets/media/avatars/avatar4.jpg"
                                alt="">
                        </div>
                        <div
                            class="block-content block-content-full block-content-sm bg-body fs-sm d-flex justify-content-between align-items-center">
                            <a href="javascript:void(0)">service@example.com</a>
                            <span class="text-muted">2 min ago</span>
                        </div>
                        <div class="block-content">
                            <p>Dear Customer,</p>
                            <p>Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing
                                luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut metus lobortis
                                tortor tincidunt himenaeos habitant quis dictumst proin odio sagittis purus mi, nec taciti
                                vestibulum quis in sit varius lorem sit metus mi.</p>
                            <p>Best Regards,</p>
                            <p>Marie Duncan</p>
                        </div>
                        <div class="block-content p-3 bg-body">
                            <div class="row g-sm items-push">
                                <div class="col-sm-4">
                                    <div class="options-container fx-overlay-slide-down">
                                        <img class="img-fluid options-item" src="assets/media/photos/photo20.jpg"
                                            alt="">
                                        <div class="options-overlay bg-black-50">
                                            <div class="options-overlay-content">
                                                <a class="btn btn-sm btn-alt-secondary" href="javascript:void(0)">
                                                    <i class="fa fa-fw fa-download opacity-50"></i> Download
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="fs-sm text-muted mt-1">Travel_Pack_1.jpg</div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="options-container fx-overlay-slide-down">
                                        <img class="img-fluid options-item" src="assets/media/photos/photo21.jpg"
                                            alt="">
                                        <div class="options-overlay bg-black-50">
                                            <div class="options-overlay-content">
                                                <a class="btn btn-sm btn-alt-secondary" href="javascript:void(0)">
                                                    <i class="fa fa-fw fa-download opacity-50"></i> Download
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="fs-sm text-muted mt-1">Travel_Pack_2.jpg</div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="options-container fx-overlay-slide-down">
                                        <img class="img-fluid options-item" src="assets/media/photos/photo22.jpg"
                                            alt="">
                                        <div class="options-overlay bg-black-50">
                                            <div class="options-overlay-content">
                                                <a class="btn btn-sm btn-alt-secondary" href="javascript:void(0)">
                                                    <i class="fa fa-fw fa-download opacity-50"></i> Download
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="fs-sm text-muted mt-1">Travel_Pack_3.jpg</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Message Modal -->
    </div>
@endsection

@push('css')
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/js/plugins/datatables-responsive-bs5/css/responsive.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/select2/css/select2.css') }}">
@endpush

@push('js')
    <!-- jQuery (required for DataTables plugin) -->
    <script src="{{ asset('assets/js/lib/jquery.min.js') }}"></script>

    <!-- Page JS Plugins -->
    <script src="{{ asset('assets/js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables-buttons/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables-buttons-bs5/js/buttons.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables-buttons-jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables-buttons-pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables-buttons-pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables-buttons/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables-buttons/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/select2/js/select2.full.min.js') }}"></script>

    <!-- Page JS Code -->
    <script src="{{ asset('assets/js/pages/be_tables_datatables.min.js') }}"></script>
    <script type="text/javascript">
        jQuery(function() {
            jQuery('#val-select2').change(function() {
                this.form.submit();
            });
        });
    </script>
    <!-- Page JS Helpers (Select2 plugin) -->
    <script>
        Codebase.helpersOnLoad(['jq-select2']);
    </script>
@endpush
