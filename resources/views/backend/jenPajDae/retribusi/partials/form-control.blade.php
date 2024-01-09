<div class="block block-rounded">
    <div class="block-header block-header-default">
        <h3 class="block-title">Tambah Data @yield('subTitle')</h3>
        <div class="block-options">
            <a href="{{ route('retribusi.index') }}" class="btn-block-option">
                <i class="fa fa-fw fa-reply"></i> Kembali</a>
        </div>
    </div>
    <div class="block-content">
        <div class="row">
            <div class="col-sm-4">
                <div class="mb-4">
                    <label class="form-label" for="kode">Kode</label>
                    <input type="text" class="form-control" id="kode" name="kode"
                        value="{{ old('kode') ?? $data->kode }}" placeholder="Kode Retribusi" autofocus>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="mb-4">
                    <label class="form-label" for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama"
                        value="{{ old('nama') ?? $data->nama }}" placeholder="Jenis Retribusi">
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
