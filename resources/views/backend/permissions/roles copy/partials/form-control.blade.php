<div class="block block-rounded">
    <div class="block-header block-header-default">
        <h3 class="block-title">Table @yield('subTitle')</h3>
        <div class="block-options">
            <button type="submit" class="btn-block-option">
                <i class="fa fa-fw fa-check opacity-50"></i> {{ $submit }}
            </button>
            <a href="{{ route('roles.index') }}" class="btn-block-option">Back</a>
        </div>
    </div>
    <div class="block-content">
        <div class="row">
            <div class="col-sm-6">
                <div class="mb-4">
                    <label class="form-label" for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name"
                        value="{{ old('name') ?? $role->name }}" autofocus>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="mb-4">
                    <label class="form-label" for="guard_name">Guard Name</label>
                    <input type="text" class="form-control" id="guard_name" name="name" placeholder='default to "web"'
                        disabled value="{{ old('guard_name') ?? $role->guard_name }}">
                </div>
            </div>
        </div>
    </div>
</div>