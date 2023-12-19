@extends('layouts.master')

@section('title', 'Menus List')

@section('content')
    <div class="mt-4 p-5 bg-black text-white rounded">
        <h1>All Menus</h1>
        {{-- Add button --}}
        <a href="{{ route('menus.create') }}" class="btn btn-primary btn-sm">Add New Menu</a>

    </div>
    @if (session()->has('success'))
    <div class="alert alert-success mt-4">
        {{ session()->get('success') }}
    </div>
@endif

    <div class="container mt-5">
        <table class="table table-bordered mb-5">
            <thead>
                <tr class="table-success">
                    <th scope="col">Id</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Rekomendasi</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Updated At</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($menus as $menu)
                    <tr>
                        <th scope="row"> <a href="{{ route('menus.show', $menu) }}"> {{ $menu->id }} </th>
                       <td>
                                 {{ $menu->nama }}
                        </td>

                        <td>{{ $menu->rekomendasi }}</td>
                        <td>{{ $menu->harga }}</td>

                        <td>{{ $menu->created_at }}</td>
                        <td>{{ $menu->updated_at }}</td>

<td>
    <a href="{{ route('menus.edit', $menu) }}" class="btn btn-primary btn-sm">
        Edit
    </a>
    <form action="{{ route('menus.destroy', $menu) }}" method="POST"
    class="d-inline-block">
    @method('DELETE')
    @csrf
    <button type="submit" class="btn btn-danger btn-sm"
        onclick="return confirm('Are you sure?')">Delete
    </button>
</form>
</td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="6">No menus found.</td>
                    </tr>
                @endforelse
            </tbody>

        </table>
    </div>
@endsection
