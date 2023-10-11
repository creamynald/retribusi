@extends('backend.layouts.app')

@section('title', 'Role & Permission')
@section('subTitle', 'Permission to Users')

@section('content')
    <div class="content">
        <h2 class="content-heading">@yield('title')</h2>
        <form action="{{ route('user.store') }}" method="POST">
            @csrf
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">
                        <small>@yield('subTitle')</small>
                    </h3>

                    <button type="submit" class="btn-block-option">
                        <i class="si si-link"></i> Sync Permission
                    </button>
                </div>
                <div class="block-content block-content-full">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-4">
                                <label class="form-label" for="email">User</label>
                                <select class="js-select2 form-select" id="email" name="email" style="width: 100%;"
                                    data-placeholder="Choose user by email..">
                                    <option></option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->email }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-4">
                                <label class="form-label" for="role">Roles</label>
                                <select class="js-select2 form-select" id="role" name="role[]"
                                    style="width: 100%;" data-placeholder="Choose roles.." multiple>
                                    <option></option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- Dynamic Table Full -->
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    <small>Table @yield('subTitle')</small>
                </h3>
            </div>
            <div class="block-content block-content-full">
                <!-- DataTables functionality is initialized with .js-dataTable-full class in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
                <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                    <thead>
                        <tr>
                            <th class="text-center"></th>
                            <th>email</th>
                            <th>Roles</th>
                            <th class="d-none d-sm-table-cell">Guard Name</th>
                            <th class="d-none d-sm-table-cell">Created At</th>
                            <th class="text-center" style="width: 15%;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $index => $user)
                            <tr>
                                <td class="text-center">{{ $index + 1 }}</td>
                                <td class="fw-semibold">{{ $user->email }}</td>
                                <td class="text-center">
                                    @if (!empty($user->getRoleNames()))
                                        @foreach ($user->getRoleNames() as $role)
                                            <span class="badge bg-success">{{ $role }}</span>
                                        @endforeach
                                    @else
                                        <span class="badge bg-danger">No Role</span>
                                    @endif
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    <span class="badge bg-success">{{ $user->guard_name }}</span>
                                </td>
                                <td class="d-none d-sm-table-cell">{{ $user->created_at->format('d F Y') }}</td>
                                <td class="text-center">
                                    <a href="{{ route('user.edit', $user) }}" class="btn btn-sm btn-secondary"
                                        title="Sync">
                                        <i class="fas fa-sync"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END Dynamic Table Full -->
    </div>
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/select2/css/select2.min.css') }}">
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/js/plugins/datatables-responsive-bs5/css/responsive.bootstrap5.min.css') }}">
@endpush

@push('js')
    <!-- jQuery (required for DataTables plugin) -->
    <script src="{{ asset('assets/js/lib/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/select2/js/select2.full.min.js') }}"></script>
    <script>
        Codebase.helpersOnLoad(['js-flatpickr', 'jq-datepicker', 'jq-maxlength', 'jq-select2', 'jq-rangeslider',
            'jq-masked-inputs', 'jq-pw-strength'
        ]);
    </script>

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

    <!-- Page JS Code -->
    <script src="{{ asset('assets/js/pages/be_tables_datatables.min.js') }}"></script>
@endpush
