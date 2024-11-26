@extends('layouts.apps')
@section('content')
    <div class="col-10 offset-md-1">
        <div class="card">
            <div class="card-body p-5">
                <form action="{{ route('penjualan.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <label for="kode" class="col-sm-4 col-form-label">kode barang</label>
                            <div class="col">
                                <input type="text" name="kode" class="form-control">

                            </div>
                            <label for="merk" class="col-sm-4 col-form-label">Barang</label>
                            <div class="col">
                                <select name="barang" id="barang" class="form-control mb-2">
                                    <option value="">-- pilih barang --</option>
                                    @forelse ($barangs as $br)
                                        <option value="{{ $br->id }}">{{ $br->nama_barang }}</option>
                                    @empty
                                        {{ '_kosong' }}
                                    @endforelse
                                </select>
                            </div>
                            <label for="jenis" class="col-sm-4 col-form-label">Kategori_barang</label>
                            <div class="col">
                                <select name="jenis" id="jenis" class="form-control mb-2">
                                    <option value="">--pilih kategori barang--</option>

                                </select>
                            </div>
                            <label for="barang" class="col-sm-4 col-form-label">Nama Barang</label>
                            <div class="col">
                                <input type="text" name="barang" id="barang" class="form-control">
                            </div>
                            <label for="jml" class="col-sm-2 col-form-label">Jumlah</label>
                            <div class="col mb-2">
                                <input type="number" name="jumlah" id="jumlah" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">

                            <label for="harga" class="col-sm-2 col-form-label">Harga </label>
                            <div class="col-sm-10 mb-2">
                                <input type="number" name="harga" id="harga" class="form-control">
                            </div>
                            <label for="supplier" class="col-sm-2 col-form-label">Supplier </label>
                            <div class="col-sm-10 mb-2">
                                <select name="supplier" id="supplier" class="form-control">
                                    <option value="">--pilih Supplier--</option>

                                </select>
                            </div>
                            <label for="lokasi" class="col-sm-2 col-form-label">Lokasi </label>
                            <div class="col-sm-10 mb-2">
                                <select name="lokasi" id="lokasi" class="form-control">
                                    <option value="">--pilih lokasi--</option>

                                </select>
                            </div>
                            <label for="gambar" class="col-sm-2 col-form-label">Gambar </label>
                            <div class="col-sm-10 mb-2">
                                <input type="file" name="gambar" id="gambar" class="form-control">
                            </div>
                            <label for="keterangan" class="col-form-label">Keterangan </label>
                            <div class="col-sm-10 mb-2">
                                <textarea type="text" name="keterangan" id="keterangan" class="form-control"></textarea>
                            </div>
                            <button type="submit" class="btn btn-sm btn-primary">simpan</button>
                            <button type="clear" class="btn btn-sm btn-warning">Reset</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
