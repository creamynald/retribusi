@extends('backend.layouts.app')

@section('title', 'Role & Permission')
@section('subTitle', 'Assign Permissions')

@section('content')
<div class="content">
    <h2 class="content-heading">@yield('title')</h2>
    <!-- Dynamic Table Full -->
    <form action="{{ route('assignable.store') }}" method="POST">
        @csrf
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    <small>Table @yield('subTitle')</small>
                </h3>
                <button type="submit" class="btn-block-option">
                    <i class="fa fa-fw fa-check opacity-50"></i> Save Changes
                </button>
            </div>
            <div class="block-content block-content-full">
                <div class="block-content block-content-full">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-4">
                                <label class="form-label" for="role">Role</label>
                                <select class="js-select2 form-select" id="role" name="role" style="width: 100%;"
                                    data-placeholder="Choose one..">
                                    <option></option>
                                    <!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                    @foreach ($roles as $row)
                                    <option value="{{ $row->id }}">{{ $row->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-4">
                                <label class="form-label" for="permissions">Permissions</label>
                                <select class="js-select2 form-select" id="permissions" name="permissions[]"
                                    style="width: 100%;" data-placeholder="Choose many.." multiple>
                                    <option></option>
                                    <!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                    @foreach ($permissions as $row)
                                    <option value="{{ $row->id }}">{{ $row->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- END Dynamic Table Full -->
</div>
@endsection

@push('css')
<link rel="stylesheet" href="{{ asset('assets/js/plugins/select2/css/select2.min.css') }}">
@endpush

@push('js')
<script src="{{ asset('assets/js/lib/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/select2/js/select2.full.min.js') }}"></script>
<script>
    Codebase.helpersOnLoad(['js-flatpickr', 'jq-datepicker', 'jq-maxlength', 'jq-select2', 'jq-rangeslider',
            'jq-masked-inputs', 'jq-pw-strength'
        ]);
</script>
@endpush