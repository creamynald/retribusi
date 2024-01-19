<div class="block block-rounded">
    <div class="block-header block-header-default">
        <h3 class="block-title">Tambah Data @yield('subTitle')</h3>
        <div class="block-options">
            <a href="{{ route('objek-retribusi.index') }}" class="btn-block-option">
                <i class="fa fa-fw fa-reply"></i> Kembali</a>
        </div>
    </div>
    <div class="block-content">
        <div class="row">
            <div class="col-sm">
                <div class="mb-4">
                    <label class="form-label" for="jenis_retribusi_id">Jenis Retribusi</label>
                    <select class="js-select2 form-select" id="jenis_retribusi_id" name="jenis_retribusi_id"
                        style="width: 100%;" data-placeholder="Pilih Jenis Retribusi..">
                        <option></option>
                        @foreach ($jenisRetribusis as $item)
                            <option {{ $data->jenis_retribusi_id == $item->id ? 'selected' : '' }}
                                value="{{ $item->id }}">{{ $item->nama }} - {{ $item->nama }}</option>
                        @endforeach
                    </select>
                    <!-- error-->
                    @error('jenis_retribusi_id')
                        <small class="error mt-2 text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="mb-4">
                    <label class="form-label" for="kode">Kode</label>
                    <input type="text" class="form-control" id="kode" name="kode"
                        value="{{ old('kode') ?? $data->kode }}" placeholder="Kode Retribusi" autofocus>
                    <!-- error-->
                    @error('kode')
                        <small class="error mt-2 text-danger">{{ $message }}</small>
                    @enderror
                    <!-- end error -->
                </div>
            </div>
            <div class="col-sm-8">
                <div class="mb-4">
                    <label class="form-label" for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama"
                        value="{{ old('nama') ?? $data->nama }}" placeholder="Jenis Retribusi">
                    <!-- error-->
                    @error('nama')
                        <small class="error mt-2 text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="mb-4">
                    <label class="form-label" for="target">Anggaran / Target Perubahan</label>
                    <div class="input-group">
                        <span class="input-group-text">
                            Rp.
                        </span>
                        <input type="number" class="form-control text-center" id="target"
                            name="target" value="{{ old('target') ?? $data->target }}">
                    </div>
                    <!-- error-->
                    @error('target')
                        <small class="error mt-2 text-danger">{{ $message }}</small>
                    @enderror
                    <!-- end error -->
                </div>
            </div>
            <div class="col-sm-2">
                <div class="mb-4">
                    <label class="form-label" for="tahun">Tahun</label>
                    <select class="js-select2 form-select" id="tahun" name="tahun" style="width: 100%;"
                        data-placeholder="Tahun berjalan..">
                        @foreach ($tahun as $item)
                            <option {{ $data->tahun == $item ? 'selected' : '' }} value="{{ $item }}">
                                {{ $item }}
                            </option>
                        @endforeach
                    </select>
                    @error('tahun')
                        <small class="error mt-2 text-danger">{{ $message }}</small>
                    @enderror
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
