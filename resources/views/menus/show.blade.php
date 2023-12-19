@extends('layouts.master')

@section('title', $menu->nama)

@section('content')
    <article class="blog-post my-4">
        <h1 class="display-5 fw-bold">{{ $menu->nama }}</h1>
        <h1 class="display-5 fw-bold">{{ $menu->rekomendasi }}</h1>
        <h1 class="display-5 fw-bold">{{ $menu->harga }}</h1>
        <p class="blog-post-meta">{{ $menu->updated_at }}</p>
        {{-- @if ($menu->image)
            <img src="{{ $menu->image }}" class="rounded mx-auto d-block my-3">
        @endif --}}

    </article>
@endsection
