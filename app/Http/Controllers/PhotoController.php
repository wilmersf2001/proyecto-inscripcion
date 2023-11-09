<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    public function store(Request $request)
    {
        if ($request->hasFile('frontDniPhoto')) {
            $image = $request->file('frontDniPhoto');
            $fileName = time() . '.' . $image->getClientOriginalExtension();

            Storage::disk('public')->put('fotos-validas/' . $fileName, file_get_contents($image));
        }

        $url = Storage::url('fotos-validas/' . $fileName);
        dd($url);
    }
}
