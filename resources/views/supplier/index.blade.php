@extends('layouts.apps')
@section('title')
    {{ 'list supplier' }}
@endsection
@section('styles')
    <style>
        .card a:hover {
            color: purple;
        }
    </style>
@stop
@section('content')
    <div class="card">
        <div class="card-body">
            <a href="{{ route('supplier.create') }}"><i class="float-end" data-feather="plus-circle"></i></a>
            <h3 class="card-title">List supplier</h3>
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Telpon</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($suppliers as $sp)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $sp->nama_supplier }}</td>
                            <td>{{ $sp->alamat_supplier }}</td>
                            <td>{{ $sp->telepon_supplier }}</td>
                            <td>{{ $sp->email_supplier }}</td>
                            <td>
                                <div class="btn-group" role="group">

                                    <a href="{{ route('supplier.edit', $sp->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('supplier.destroy', $sp->id) }}" method="POST"
                                        style="display:inline-block;">
                                        @csrf @method('DELETE') <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus jenis ini?')">Hapus</button>
                                </div>
                                </form>
                            </td>
                        </tr>
                    @empty
                </tbody>
                @endforelse
            </table>
        </div>
    </div>
@endsection
