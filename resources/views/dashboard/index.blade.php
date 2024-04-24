@extends('layouts.main')

@section('container')

    <h3 class="mb-4">Galeri {{ auth()->user()->nama_lengkap }}</h3>

    <table class="table">
        <a href="/dashboard/create"><button class="btn btn-primary btn-sm mb-2"><i class="fas fa-plus"></i> Tambah Postingan</button></a>
    <thead>
        <tr>
        <th>Judul</th>
        <th>Aksi</th>
        </tr>
    </thead>
   
    <tbody>
        @foreach ($foto as $item)
        <tr>
            <td>{{ $item->judul_foto }}</td>
            <td>
                <a href="/foto/{{ $item->slug }}" class="btn btn-sm btn-primary"><i class="bi bi-eye"></i> Detail</a>

                <a href="/dashboard/edit/{{ $item->slug }}" class="btn btn-warning btn-sm border-0">
                    <i class="bi bi-pencil-fill"></i> ubah
                </a>

                <form action="/dashboard/{{ $item->id }}" method="post" class="d-inline">
                    @csrf{{-- FORM MUST HAVE CSRF FOR PROTECTED MAYBE:) --}}
                    <button class="btn btn-danger btn-sm border-0" onclick="return confirm('Apakah anda yakin?')"><i class="bi bi-trash3"></i> Hapus</button>
                  </form>
            </td>
        </tr>
        @endforeach
    </tbody>
    </table>
    <div class="d-flex justify-content-end">
        {{ $foto->links() }}
    </div>
@endsection