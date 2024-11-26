@extends('layouts.apps')
@section('title')
    merk barang
@endsection
@section('judul')
    List Brand
@endsection

@section('content')
    <div class="container">
        <div class="mb-3">
            <a href="{{ route('merk.create') }}" class="btn btn-primary">Tambah
                Merk</a>
        </div>
        <div class="row">
            <div class="col-12 col-lg-11 col-xxl-11 d-flex ">
                <div class="card flex-fill">
                    <div class="card-header">

                        <h5 class="card-title mb-0">Latest Projects</h5>

                    </div>
                    <table class="table table-hover my-0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th class="d-none d-xl-table-cell">Brand</th>
                                <th class="d-none d-xl-table-cell">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($merk as $key => $merk)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td class="d-none d-xl-table-cell">{{ $merk->merk_barang }}</td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                            <a href="{{ route('merk.edit', $merk->id) }}" type="button"
                                                class="btn btn-warning btn-sm">edit</a>
                                            <form action="{{ route('merk.destroy', $merk->id) }}" method="POST"
                                                style="display:inline-block;">
                                                @csrf @method('DELETE') <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus merk ini?')">Hapus</button>
                                            </form>

                                            <a href="{{ route('merk.show', $merk->id) }}" type="button"
                                                class="btn btn-success btn-sm">show</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endsection
