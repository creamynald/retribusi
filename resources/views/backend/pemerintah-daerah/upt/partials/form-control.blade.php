<div class="block block-rounded">
    <div class="block-header block-header-default">
        <h3 class="block-title">Tambah Data @yield('subTitle')</h3>
        <div class="block-options">
            <a href="{{ route('upt.index') }}" class="btn-block-option">
                <i class="fa fa-fw fa-reply"></i> Kembali</a>
        </div>
    </div>
    <div class="block-content">
        <div class="row">
            <div class="col-sm-12">
                <div class="mb-4">
                    <label class="form-label" for="opd_id">Organisasi Perangkat Daerah</label>
                    <select class="js-select2 form-select" id="opd_id" name="opd_id"
                        style="width: 100%;" data-placeholder="Pilih OPD..">
                        <option></option>
                        @foreach ($data_opd as $opd)
                        <option value="{{ $opd->id }}" {{ $opd->id == $data->opd_id ? 'selected' : '' }}>
                            {{ $opd->nama }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="mb-4">
                    <label class="form-label" for="nama">Nama UPT</label>
                    <input type="text" class="form-control" id="nama" name="nama"
                        value="{{ old('nama') ?? $data->nama }}" placeholder="Nama UPT" autofocus>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="mb-4">
                    <label class="form-label" for="no_telp">Nomor Telpon/HP</label>
                    <input type="text" class="form-control" id="no_telp" name="no_telp"
                        value="{{ old('no_telp') ?? $data->no_telp }}" placeholder="Nomor Telpon (ex: 0852XXX..)"
                        autofocus>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="mb-4">
                    <label class="form-label" for="kode_pos">Kode POS</label>
                    <input type="text" class="form-control" id="kode_pos" name="kode_pos"
                        value="{{ old('kode_pos') ?? $data->kode_pos }}" placeholder="Kode POS (ex: 28751)" autofocus>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="mb-4">
                    <label class="form-label" for="website">Website</label>
                    <input type="text" class="form-control" id="website" name="website"
                        value="{{ old('website') ?? $data->website }}" placeholder="Website (ex: https://disko..)"
                        autofocus>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="mb-4">
                    <label class="form-label" for="alamat">Alamat</label>
                    <textarea class="form-control" id="alamat" name="alamat" name="alamat" rows="2"
                        placeholder="Alamat lengkap..">{{ old('alamat') ?? $data->alamat }}</textarea>
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
