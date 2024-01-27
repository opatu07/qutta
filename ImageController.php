<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function index()
    {
        return view('/read');
    }

    public function create(Request $request)
    {
        return view('/create');

    }

    public function store(Request $request)
    {
        if (isset($img)) {
            $path = $img->store('img','public');
            if ($path) {
                Image::create([
                    'img_path' => $path,
                ]);
            }
        }
        return redirect( {{ route('image')}})->route
    }
}
