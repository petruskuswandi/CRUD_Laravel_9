<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Picture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class PictureController extends Controller
{
    public function create()
    {
        return view('create_picture');
    }

    public function store(Request $req)
    {
        $file = $req->file('file');
        $nama = $req->name;
        $time = time();

        // $path = time() . '_' . $req->name . '.' . $file->getClientOriginalExtension();
        $path = date('Y-m-d', $time) . '_' . $req->name . '.' . $file->getClientOriginalExtension();

        Storage::disk('local')->put('public/' . $path, file_get_contents($file));

        Picture::create([
            'name' => $nama,
            'path' => $path
        ]);

        return Redirect::route('picture.create');
    }

    public function show(Picture $pic)
    {
        $url = Storage::url($pic->path);
        return view('show_picture', compact('url', 'pic'));
    }

    public function delete(Picture $pic)
    {
        Storage::delete('public/'. $pic->path);
        $pic->delete();
        return Redirect::route('picture.create');
    }

    public function copy(Picture $pic)
    {
        Storage::copy('public/' . $pic->path, 'copy/' . $pic->path);
        return Redirect::route('picture.create');
    }

    public function move(Picture $pic)
    {
        Storage::move('public/' . $pic->path, 'move/' . $pic->path);
        return Redirect::route('picture.create');
    }
}
