@extends('layouts.apps')
@section('title')
    {{ 'edit barang' }}
@endsection
@section('content')
    <div class="col-10 offset-md-1">
        <div class="card">
            <div class="card-body p-5">
                <form action="{{ route('barangs.update', $barang->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <input type="hidden" name="id" id="id" value="{{ $barang->id }}" />
                        <div class="col-md-6 col-sm-12">
                            <label for="kode" class="col-sm-4 col-form-label">kode barang</label>
                            <div class="col">
                                <input type="text" name="kode" class="form-control"
                                    value="{{ $barang->kode_barang }}">

                            </div>
                            <label for="merk" class="col-sm-4 col-form-label">Merk</label>
                            <div class="col">
                                <select name="merk" id="merk" class="form-control mb-2">
                                    <option value="">-- pilih merk --</option>
                                    @forelse ($merk as $m)
                                        <option value="{{ $m->id }}"
                                            {{ $barang->merk_id == $m->id ? 'selected' : '' }}>
                                            {{ $m->merk_barang }}</option>
                                    @empty
                                        {{ '_kosong' }}
                                    @endforelse
                                </select>
                            </div>
                            <label for="jenis" class="col-sm-4 col-form-label">Jenis_baranq</label>
                            <div class="col">
                                <select name="jenis" id="jenis" class="form-control mb-2">
                                    <option value="">--pilih jenis barang--</option>
                                    @forelse ($jenis as $j)
                                        <option value="{{ $j->id }}"
                                            {{ $barang->jenis_id == $j->id ? 'selected' : '' }}>
                                            {{ $j->jenis_barang }}</option>
                                    @empty
                                        {{ '_kosong' }}
                                    @endforelse
                                </select>
                            </div>
                            <label for="barang" class="col-sm-4 col-form-label">Nama Barang</label>
                            <div class="col">
                                <input type="text" name="barang" id="barang" class="form-control"
                                    value="{{ $barang->nama_barang }}">
                            </div>
                            <label for="jml" class="col-sm-2 col-form-label">Jumlah</label>
                            <div class="col mb-2">
                                <input type="number" name="jumlah" id="jumlah" class="form-control"
                                    value="{{ $barang->jumlah_barang }}">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">

                            <label for="harga" class="col-sm-2 col-form-label">Harga </label>
                            <div class="col-sm-10 mb-2">
                                <input type="number" name="harga" id="harga" class="form-control"
                                    value="{{ $barang->harga }}">
                            </div>
                            <label for="lokasi" class="col-sm-2 col-form-label">Lokasi </label>
                            <div class="col-sm-10 mb-2">
                                <select name="lokasi" id="lokasi" class="form-control">
                                    <option value="">--pilih lokasi--</option>
                                    @forelse ($lokasi as $l)
                                        <option value="{{ $l->id }}"
                                            {{ $barang->lokasi_id == $l->id ? 'selected' : '' }}>{{ $l->nama_lokasi }}
                                        </option>
                                    @empty
                                        {{ '_empty' }}
                                    @endforelse
                                </select>
                            </div>

                            <label for="supplier" class="col-sm-2 col-form-label">Supplier </label>
                            <div class="col-sm-10 mb-2">
                                <select name="supplier" id="supplier" class="form-control">
                                    <option value="">--pilih lokasi--</option>
                                    @forelse ($supplier as $s)
                                        <option value="{{ $s->id }}"
                                            {{ $barang->supplier_id == $s->id ? 'selected' : '' }}>{{ $s->nama_supplier }}
                                        </option>
                                    @empty
                                        {{ '_empty' }}
                                    @endforelse
                                </select>
                            </div>


                            <label for="gambar" class="col-sm-2 col-form-label">Gambar </label>
                            <div class="col-sm-10 mb-2">
                                <input type="file" name="gambar" id="gambar" class="form-control">
                                @if ($barang->gambar_barang)
                                    <img src="{{ asset('barang/thumbnails/' . $barang->gambar_barang) }}"
                                        alt="Gambar Barang" class="img-thumbnail">
                                @endif


                            </div>
                            <label for="keterangan" class="col-form-label">Keterangan </label>
                            <div class="col-sm-10 mb-2">
                                <textarea type="text" name="keterangan" id="keterangan" class="form-control">{{ $barang->keterangan }}</textarea>
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
