@extends('layouts.apps')
@section('title')
    {{ '_input supplier' }}
@endsection

@section('content')
    <div class="container">
        <div class="col-lg-8 offset-lg-2">
            <div class="card shadow-lg bg-success p-2 text-dark bg-opacity-25 rounded">
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
                    <h3 class="title mb-3">Supplier</h2>

                        <div class="row">
                            <div class="col-6">
                                <form action="{{ route('supplier.store') }}" method="POST" enctype="multipart/form-data">

                                    @csrf
                                    @method('POST')
                                    <label for="kode_supplier" class="form-label">Kode Supplier</label>
                                    <input type="text" name="kode_supplier" class="form-control"
                                        placeholder="masukan kode supplier" required>
                                    <label for="alamat_supplier" class="form-label">Alamat Supplier</label>
                                    <input type="text" name="alamat_supplier" class="form-control"
                                        placeholder="masukan alamat_supplier" required>
                                    <label for="telepon" class="form-label">Telepon</label>
                                    <input type="number" name="telepon" class="form-control" placeholder="masukan telepon"
                                        required>
                            </div>
                            <div class="col-6">
                                <label for="nama_supplier" class="form-label">Nama Supplier</label>
                                <input type="text" name="nama_supplier" class="form-control"
                                    placeholder="masukan nama_supplier" required>
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="masukan email"
                                    required>
                                <div class="mt-3">

                                    <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                                </div>

                                </form>
                            </div>

                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection()
