@extends('backend.layouts.app')

@section('title', 'Role & Permission')
@section('subTitle', 'Roles')

@section('content')
<div class="content">
    <h2 class="content-heading">@yield('title')</h2>
    <!-- Dynamic Table Full -->
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">
                <small>Table @yield('subTitle')</small>
            </h3>

            <a href="{{ route('roles.create') }}" type="button" class="btn-block-option">
                <i class="si si-plus"></i> Add Data
            </a>
        </div>
        <div class="block-content block-content-full">
            <!-- DataTables functionality is initialized with .js-dataTable-full class in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
            <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                <thead>
                    <tr>
                        <th class="text-center"></th>
                        <th>Name</th>
                        <th class="d-none d-sm-table-cell">Guard Name</th>
                        <th class="d-none d-sm-table-cell">Created At</th>
                        <th class="text-center" style="width: 15%;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $index => $role)
                    <tr>
                        <td class="text-center">{{ $index+1 }}</td>
                        <td class="fw-semibold">{{ $role->name }}</td>
                        <td class="d-none d-sm-table-cell">
                            <span class="badge bg-danger">{{ $role->guard_name }}</span>
                        </td>
                        <td class="d-none d-sm-table-cell">{{ $role->created_at->format("d F Y") }}</td>
                        <td class="text-center">
                            <a href="{{ route('roles.edit', $role) }}" type="button" class="btn btn-sm btn-secondary"
                                title="Edit">
                                <i class="fa fa-pen"></i>
                            </a>
                            <button type="button" class="btn btn-sm btn-danger" title="Delete">
                                <i class="fa fa-trash-can"></i>
                            </button>
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
<!-- Page JS Plugins CSS -->
<link rel="stylesheet" href="{{ asset('assets/js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css') }}">
<link rel="stylesheet"
    href="{{ asset('assets/js/plugins/datatables-responsive-bs5/css/responsive.bootstrap5.min.css') }}">
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

<!-- Page JS Code -->
<script src="{{ asset('assets/js/pages/be_tables_datatables.min.js') }}"></script>
@endpush