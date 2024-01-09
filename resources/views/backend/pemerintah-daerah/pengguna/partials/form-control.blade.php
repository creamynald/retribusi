<div class="block block-rounded">
    <div class="block-header block-header-default">
        <h3 class="block-title">Tambah Data @yield('subTitle')</h3>
        <div class="block-options">
            <a href="{{ route('pengguna.index') }}" class="btn-block-option">
                <i class="fa fa-fw fa-reply"></i> Kembali</a>
        </div>
    </div>
    <div class="block-content">
        <div class="row">
            <div class="col-sm-8">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-4">
                            <label class="form-label" for="opd_id">Jenis Akun (OPD)</label>
                            <select class="js-select2 form-select" id="opd_id" name="opd_id" style="width: 100%;"
                                data-placeholder="Pilih OPD..">
                                <option></option>
                                @foreach ($opds as $row)
                                    <option value="{{ $row->id }}"
                                        {{ $row->id == $data->opd_id ? 'selected' : '' }}>{{ $row->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-4">
                            <label class="form-label" for="upt_id">Jenis Akun (UPT)</label>
                            <select class="js-select2 form-select" id="upt_id" name="upt_id" style="width: 100%;"
                                data-placeholder="Pilih UPT..">
                                <option></option>
                                @foreach ($upts as $row)
                                    <option value="{{ $row->id }}"
                                        {{ $row->id == $data->upt_id ? 'selected' : '' }}>{{ $row->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md">
                        <div class="mb-4">
                            <label class="form-label" for="name">Nama</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ old('name') ?? $data->name }}">
                            @error('name')
                                <small class="error mt-2 text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-4">
                            <label class="form-label" for="email">Email</label>
                            <input type="text" class="form-control" id="email" name="email"
                                value="{{ old('email') ?? $data->email }}">
                            @error('email')
                                <small class="error mt-2 text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-4">
                            <label class="form-label" for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password"
                                value="{{ old('password') }}">
                            <!-- error-->
                            @error('password')
                                <small class="error mt-2 text-danger">{{ $message }}</small>
                            @enderror
                            <!-- end error -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 text-center">
                <div class="mb-4">
                    <label class="form-label" for="pangkat">Foto Profil</label>
                    <img src="{{ asset('assets/media/avatars/blank.png') }}" alt="Photo Profile">
                </div>
            </div>


        </div>
        <div class="row">
            <div class="col-sm-12 mb-4">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-fw fa-save"></i>{{ $submit }}</button>
            </div>
        </div>
    </div>
</div>
