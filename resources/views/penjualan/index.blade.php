@extends('layouts.apps')
@section('title')
    list barang
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <a href="{{ route('penjualan.create') }}" class="btn  btn-primary btn-sm mb-3">tambah</a>
            <h2 class="card-title">Daftar Barang</h2>
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Kode barang</th>
                            <th>Nama </th>
                            <th>Merk</th>
                            <th>jumlah</th>
                            <th>harga</th>
                            <th>lokasi</th>
                            <th>Gambar</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td>{{ '_no' }}</td>
                            <td>{{ '$br->kode_barang' }}</td>
                            <td>{{ '$br->nama_barang' }}</td>
                            <td>{{ '$br->merk->merk_barang' }}</td>
                            <td>{{ '$br->jumlah_barang' }}</td>
                            <td>{{ '$br->harga' }}</td>
                            <td>{{ '$br->lokasi->nama_lokasi' }}</td>

                            <td> /--/
                                <img src="{{ asset('barang/thumbnails/') }}" alt="{{ '__' }}" class="img-thumbnail"
                                    width="50px" height="auto" type="button" data-bs-toggle="tooltip"
                                    data-bs-placement="top" data-bs-html="true"
                                    data-bs-title="<img src='{{ asset('barang/') }}' width='100%' height='auto'>" />
                            </td>
                            <td>{{ '_-' }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ URL('barangs.edit') }}" class="btn btn-warning btn-sm">edit</a>
                                    <form action="{{ URL('barangs.destroy') }}" method="POST"
                                        style="display:inline-block;">
                                        @csrf @method('DELETE') <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus barang ini?')">Hapus</button>
                                    </form>
                                    <a href="{{ URL('barangs.show') }}" class="btn btn-primary btn-sm">show</a>
                                </div>
                            </td>
                        </tr>


                    </tbody>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script>
@stop
