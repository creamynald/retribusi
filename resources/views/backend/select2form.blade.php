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

            <a href="{{ route('roles.index') }}" type="button" class="btn-block-option">
                <i class="si si-action-undo"></i> Back
            </a>
        </div>
        <div class="block-content block-content-full">
            <div class="block-content block-content-full">
                <form action="{{ route('roles.create') }}" method="POST">
                    @csrf
                    <h2 class="content-heading pt-0">Normal Select Box</h2>
                    <div class="row">
                        <div class="col-lg-4">
                            <p class="text-muted">
                                Default select input turns into a searchable and dynamic list
                            </p>
                        </div>
                        <div class="col-lg-8 col-xl-5">
                            <div class="mb-4">
                                <select class="js-select2 form-select" id="example-select2" name="example-select2"
                                    style="width: 100%;" data-placeholder="Choose one..">
                                    <option></option>
                                    <!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                    <option value="1">HTML</option>
                                    <option value="2">CSS</option>
                                    <option value="3">JavaScript</option>
                                    <option value="4">PHP</option>
                                    <option value="5">MySQL</option>
                                    <option value="6">Ruby</option>
                                    <option value="7">Angular</option>
                                    <option value="8">React</option>
                                    <option value="9">Vue.js</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <h2 class="content-heading">Multiple Select Box</h2>
                    <div class="row">
                        <div class="col-lg-4">
                            <p class="text-muted">
                                Default multiple select input turns into a tags input
                            </p>
                        </div>
                        <div class="col-lg-8 col-xl-5">
                            <div class="mb-4">
                                <select class="js-select2 form-select" id="example-select2-multiple"
                                    name="example-select2-multiple" style="width: 100%;"
                                    data-placeholder="Choose many.." multiple>
                                    <option></option>
                                    <!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                    <option value="1" selected>HTML</option>
                                    <option value="2" selected>CSS</option>
                                    <option value="3">JavaScript</option>
                                    <option value="4">PHP</option>
                                    <option value="5">MySQL</option>
                                    <option value="6">Ruby</option>
                                    <option value="7">Angular</option>
                                    <option value="8">React</option>
                                    <option value="9">Vue.js</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
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