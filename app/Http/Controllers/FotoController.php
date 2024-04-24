<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Foto;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class FotoController extends Controller
{
    public function index()
    {
        return view('foto.index', [
            'fotos' => Foto::withCount('comments')->with('user')->latest()->paginate(7),
            'active' => 'home'
        ]);
    }

    public function show($slug)
    {
        return view('foto.show', [
            'foto' => Foto::with('user')->where('slug', $slug)->first(),
            'active' => 'home'
        ]);
    }


}
