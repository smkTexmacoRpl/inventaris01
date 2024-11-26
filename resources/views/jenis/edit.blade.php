@extends('layouts.apps')
@section('content')
    <div class="col-8 offset-2">
        <div class="card shadow-lg">
            <div class="card-body">
                <h4 class="card-title">Edit Jenis</h4>
                <hr>
                <form action="{{ route('jenis_barang.update', $jenis->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" id="id" value="{{ $jenis->id }}">
                    <div class="mb-3">
                        <label for="">merk barang</label>
                        <input type="text" class="form-control" id="" placeholder="Masukkan merk barang"
                            name="jenis" value="{{ $jenis->jenis_barang }}">
                    </div>
                    <div>
                        <button type="submit" class="btn btn-warning btn-sm">edit</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
