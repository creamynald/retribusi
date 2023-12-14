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
                    <div class="col-md-4">
                        <div class="mb-4">
                            <label class="form-label" for="nip">NIP</label>
                            <input type="text" class="form-control" id="nip" name="nip"
                                value="{{ old('nip') ?? $data->nip }}" autofocus>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="mb-4">
                            <label class="form-label" for="name">Nama</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ old('name') ?? $data->name }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-4">
                            <label class="form-label" for="golongan_id">Golongan</label>
                            <select class="js-select2 form-select" id="golongan_id" name="golongan_id"
                                style="width: 100%;" data-placeholder="Pilih golongan..">
                                <option></option>
                                @foreach ($golongans as $data)
                                    <option value="{{ $data->id }}">{{ $data->golongan }} {{ $data->id }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-4">
                            <label class="form-label" for="jabatan_id">Jabatan</label>
                            <select class="js-select2 form-select" id="jabatan_id" name="jabatan_id"
                                style="width: 100%;" data-placeholder="Pilih jabatan..">
                                <option></option>
                                @foreach ($jabatans as $data)
                                    <option value="{{ $data->id }}">{{ $data->nama }} {{ $data->id }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-4">
                            <label class="form-label" for="email">Email</label>
                            <input type="text" class="form-control" id="email" name="email"
                                value="{{ old('email') ?? $data->email }}">
                        </div>
                        <div class="mb-4">
                            <label class="form-label" for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password"
                                value="{{ old('password') ?? $data->password }}">
                            <span class="text-danger">*disarankan password lebih dari 8 karakter.</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-4">
                            <label class="form-label" for="role">Roles</label>
                            <select class="js-select2 form-select" id="role" name="role" style="width: 100%;"
                                data-placeholder="Choose roles..">
                                <option></option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                            
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="form-label" for="avatar" class="form-label">Foto Profil Pegawai</label>
                            <input class="form-control" type="file" id="avatar" name="avatar">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 text-center">
                <div class="mb-4">
                    <label class="form-label" for="pangkat">Foto Pegawai</label>
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
