<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function like($id)
    {
        $data = [
            'foto_id' => $id,
            'user_id' => Auth::user()->id
        ];


        $like = Like::where($data);
        if ($like->count() > 0) {
            $like->delete();
        } else {
            Like::create($data);
        }

        return back();
    }

    public function likee($id)
    {
        $data = [
            'foto_id' => $id,
            'user_id' => '1'
        ];


        $like = Like::where($data);
        if ($like->count() > 0) {
            $like->delete();
        } else {
            Like::create($data);
        }

        return back();
    }

}
