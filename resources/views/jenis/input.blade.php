@extends('layouts.apps')

@section('content')
    <div class="container">
        <div class="col-lg-8 offset-lg-2">
            <div class="card shadow-lg">
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="mb-3">
                        <form action="{{ route('jenis_barang.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <label for="jenis" class="form-label">Kategori</label>
                            <input type="text" name="jenis" class="form-control" placeholder="masukan kategori barang"
                                required>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                    </div>
                </div>


                </form>
            </div>
        </div>
    </div>
    </div>
@endsection()
