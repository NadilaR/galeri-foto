@extends('layouts.main')

@section('container')

    @if ($fotos->count())
    
        <div class="container">
            <div class="row">
                
                <h1 class="mb-3">Beranda</h1>

                <div class="card mb-3 text-center">
                    <img src="{{ asset('/lokasi_file/' . $fotos[0]->lokasi_file) }}" class="card-img-top mt-3" alt="Foto" height="400px"> 
                    <div class="card-body">
                        <h5 class="card-title">{{ $fotos[0]->judul_foto }}</h5>
                        <p class="card-text text-secondary">By. {{ $fotos[0]->user->nama_lengkap }}, <small class="text-muted">{{ $fotos[0]->created_at->diffForHumans() }}</small></p>
                        <a href="/foto/{{ $fotos[0]->slug }}" class="btn btn-primary text-center">Selengkapnya</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                @foreach ($fotos->skip(1) as $item)
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <img src="{{ asset('/lokasi_file/' . $item->lokasi_file) }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->judul_foto }}</h5>
                            <p class="card-text text-secondary">By. {{ $item->user->nama_lengkap }}, <small class="text-muted">{{ $item->created_at->diffForHumans() }}</small></p>
                            <a href="/foto/{{ $item->slug }}" class="btn btn-primary">Selengkapnya</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    @else
        <p class="text-center fs-4">No post found.</p>
    @endif

    <div class="d-flex justify-content-end">
        {{ $fotos->links() }}
    </div>
@endsection
