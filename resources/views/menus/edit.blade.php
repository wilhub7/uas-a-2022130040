@extends('layouts.master')

@section('title', 'Update Menu')

@section('content')
    <div class="mt-4 p-5 bg-black text-white rounded">
        <h1>Update Menu</h1>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger mt-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row my-5">
        <div class="col-12 px-5">
            <form action="{{ route('menus.update', $menu) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="mb-3 col-md-12 col-sm-12">
                    <label for="id" class="form-label">Id</label>
                    <input type="text" class="form-control" id="id" name="id" value="{{ old('id',$menu->id) }}">
                </div>

                <div class="mb-3 col-md-12 col-sm-12">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control"  id="nama" name="nama" value="{{ old('nama',$menu->nama) }}">
                </div>
                <div class="form-check form-switch mb-3">
                    <label class="form-check-label" for="is_rekomendasi">Rekomendasi</label>
                    <input class="form-check-input" type="checkbox" id="is_rekomendasi" name="is_rekomendasi">
                </div>
                <div class="mb-3 col-md-12 col-sm-12">
                    <label for="harga" class="form-label">Harga</label>
                    <input type="number" class="form-control" id="harga" name="harga" value="{{ old('harga',$menu->harga) }}">
                </div>
                <button type="submit" class="btn btn-primary btn-block">Save</button>
            </form>
        </div>
    </div>
@endsection
