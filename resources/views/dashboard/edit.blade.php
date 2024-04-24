@extends('layouts.main')

@section('container')

    <h3>Edit Postingan</h3>

    <form action="/dashboard/edit/{{ $foto->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" class="form-control" id="user_id" name="user_id" value="{{ auth()->user()->id }}">
        <input type="hidden" class="form-control" id="id" name="id" value="{{ old('id', $foto->id) }}">
        <div class="mb-3">
            <label for="judul_foto" class="form-label">Judul</label>
            <input type="text" class="form-control  @error('judul_foto') is-invalid @enderror" id="judul_foto" name="judul_foto" value="{{ old('judul_foto', $foto->judul_foto) }}" required>
            @error('judul_foto')
                <div class="invalid-feedback">
                {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="lokasi_file" class="form-label">Foto</label>
            <input class="form-control @error('lokasi_file') is-invalid @enderror" type="file" id="lokasi_file" name="lokasi_file">
            @error('lokasi_file')
                <div class="invalid-feedback">
                {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="deskripsi_foto" class="form-label">Deskripsi</label>
            <input type="text" class="form-control @error('deskripsi_foto') is-invalid @enderror" id="deskripsi_foto" name="deskripsi_foto" value="{{ old('deskripsi_foto', $foto->deskripsi_foto) }}" required>
            @error('deskripsi_foto')
                <div class="invalid-feedback">
                {{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
