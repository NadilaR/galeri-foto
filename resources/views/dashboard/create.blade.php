@extends('layouts.main')

@section('container')

    <h3>Tambah Postingan</h3>

    <form action="/dashboard" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" class="form-control" id="user_id" name="user_id" value="{{ auth()->user()->id }}">
        <div class="mb-3">
            <label for="judul_foto" class="form-label">Judul</label>
            <input type="text" class="form-control  @error('judul') is-invalid @enderror" id="judul_foto" name="judul_foto" required>
            @error('judul_foto')
                <div class="invalid-feedback">
                {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" required>
            @error('judul')
                <div class="invalid-feedback">
                {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="lokasi_file" class="form-label">Foto</label>
            <input class="form-control @error('lokasi_file') is-invalid @enderror" type="file" id="lokasi_file" name="lokasi_file" required>
            @error('lokasi_file')
                <div class="invalid-feedback">
                {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="deskripsi_foto" class="form-label">Deskripsi</label>
            <textarea name="deskripsi_foto" id="deskripsi_foto" class="form-control @error('deskripsi_foto') is-invalid @enderror" rows="5" required></textarea>
            @error('deskripsi_foto')
                <div class="invalid-feedback">
                {{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
