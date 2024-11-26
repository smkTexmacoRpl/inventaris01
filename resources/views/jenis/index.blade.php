@extends('layouts.apps')
@section('title')
    daftar jenis barang
@endsection
@section('content')
    <div class="col-lg-9 offset-lg-1">
        <a href="{{ route('jenis_barang.create') }}" class="btn btn-sm btn-primary mb-2">buat baru</a>

        <div class="card shadow-lg">
            <div class="card-body">
                <h2 class="card-title text-center">list jenis barang</h2>
                <div class="table-responsive">

                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>Jenis Barang</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($jenisBarangs as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->jenis_barang }}</td>
                                    <td>
                                        <div class="btn-group" role="group">

                                            <a href="{{ route('jenis_barang.edit', $item->id) }}"
                                                class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('jenis_barang.destroy', $item->id) }}" method="POST"
                                                style="display:inline-block;">
                                                @csrf @method('DELETE') <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus jenis ini?')">Hapus</button>
                                        </div>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection
