<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreRectifierPhotoRequest;
use App\Models\Postulante;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    private function uploadImage($file, string $name, string $destination)
    {
        $filename = $name . '.' . $file->getClientOriginalExtension();
        Storage::disk('public')->put($destination . $filename, file_get_contents($file));
    }
    public function store(StoreRectifierPhotoRequest $request)
    {
        $applicant = Postulante::find($request->applicant_id);
        if ($request->hasFile('photo_perfil')) {
            $image = $request->file('photo_perfil');
            $fileName = $applicant->num_documento;
            $this->uploadImage($image, $fileName, 'fotos-rectificadas/foto-carnet/');
        }
        if ($request->hasFile('photo_anverso')) {
            $image = $request->file('photo_anverso');
            $fileName = 'A-' . $applicant->num_documento;
            $this->uploadImage($image, $fileName, 'fotos-rectificadas/dni-anverso/');
        }
        if ($request->hasFile('photo_reverso')) {
            $image = $request->file('photo_reverso');
            $fileName = 'R-' . $applicant->num_documento;
            $this->uploadImage($image, $fileName, 'fotos-rectificadas/dni-reverso/');
        }
    }
}
