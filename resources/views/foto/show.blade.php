@extends('layouts.main')

@push('css')
    @livewireStyles
@endpush
@push('js')
    @livewireScripts
    <script>
        Livewire.on('comment_store', commentId => {
            var helloScroll = document.getElementById('comment-'+ commentId);
            helloScroll.scrollIntoView({behavior: 'smooth'},true);
        })
    </script>
@endpush

@section('container')

    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-8">
                <div class="mb-4">
                    <h1>{{ $foto->judul_foto }}</h1>
                    <span class="mb-4">By. {{ $foto->user->nama_lengkap }}, {{ $foto->created_at->diffForHumans() }}</span>
                </div>

                <img width="500px" src="{{ asset('/lokasi_file/' . $foto->lokasi_file) }}" class="img-fluid mb-2 d-block">

                @auth
                    @if ($foto->hasLike)
                    <a href="/like/{{ $foto->id }}" class="text-danger text-decoration-none">
                        <i class="bi bi-heart-fill me-1"></i>({{ $foto->totalLikes() }})
                    </a>
                    @else
                        <a href="/like/{{ $foto->id }}" class="text-dark text-decoration-none">
                            <i class="bi bi-heart-fill me-1"></i>({{ $foto->totalLikes() }})
                        </a>
                    @endif
                @endauth
                @guest
                    @if ($foto->hasLikee)
                    <a class="text-danger text-decoration-none" href="/likee/{{ $foto->id }}">
                        <i class="bi bi-heart-fill me-1"></i>({{ $foto->totalLikes() }})
                    </a>
                    @else
                        <a class="text-dark text-decoration-none" href="/likee/{{ $foto->id }}">
                            <i class="bi bi-heart-fill me-1"></i>({{ $foto->totalLikes() }})
                        </a>
                    @endif
                @endguest
                

                <article class="mb-3 fs-5">
                    {!! $foto->deskripsi_foto !!}
                </article>        

                <div>
                    @livewire('fotos.comment', ['id' => $foto->id])
                </div>

                <a href="/" class="d-block mt-3">Kembali ke Beranda</a>
                
            </div>
        </div>
    </div>
@endsection