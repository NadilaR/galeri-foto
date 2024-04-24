<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{

    
    public function index()
    {
        return view('dashboard.index', [
            'foto' => Foto::where('user_id', auth()->user()->id)->latest()->paginate(6),
            'active' => 'dashboard'
        ]);
    }

    public function create()
    {
        return view('dashboard.create', [
            'active' => 'dashboard'
        ]);
    }

    public function store(Request $request)
    {


        $data = Foto::create($request->all());
        if($request->hasFile('lokasi_file'))
        {
            $request->file('lokasi_file')->move('lokasi_file/', $request->file('lokasi_file')->getClientOriginalName());
            $data->lokasi_file = $request->file('lokasi_file')->getClientOriginalName();
            $data->save();
        }

        return redirect('/dashboard');
    }

    public function edit($slug)
    {
        return view('dashboard.edit', [
            'active' => 'dashboard',
            'foto' => Foto::with('user')->where('slug', $slug)->first()
        ]);
    }

    public function update(Request $request, $id)
    {

        // $data = Foto::where('id', $request->id)
        //     ->update($request->all());

        // if ($request->hasFile('lokasi_file')) {
        //     $request->file('lokasi_file')->move('lokasi_file/', $request->file('lokasi_file')->getClientOriginalName());
        //     $data->lokasi_file = $request->file('lokasi_file')->getClientOriginalName();
        //     $data->save();
        // }

        $foto = Foto::find($id);

        if ($request->lokasi_file != ''){
            $path = public_path().'/lokasi_file/';

            if($foto->lokasi_file != '' && $foto->lokasi_file != null){
                $file_old = $path.$foto->lokasi_file;
                unlink($file_old);
            } 

            $file = $request->lokasi_file;
            $filename = $request->file('lokasi_file')->getClientOriginalName();
            $file->move($path, $filename);

            $foto->update(['lokasi_file' => $filename]);
        }

        $foto->judul_foto = $request->get('judul_foto');
        $foto->deskripsi_foto = $request->get('deskripsi_foto');

        $foto->save();


        return redirect('/dashboard');

    }


    public function delete($id)
    {
        Foto::where('id', $id)->delete();

        return redirect('/dashboard');
    }
}
