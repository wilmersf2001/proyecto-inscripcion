<?php

namespace App\Http\Requests\View;

use Illuminate\Foundation\Http\FormRequest;

class StoreApplicantRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'applicant.postulante_nombres' => 'required',
            'applicant.postulante_apPaterno' => 'required',
            'applicant.postulante_apMaterno' => 'required',
            'applicant.postulante_fechNac' => 'required|date',
            'applicant.sexo_id' => 'required',
            'applicant.distrito_id' => 'required',
            'applicant.distrito_id_direccion' => 'required',
            'applicant.tipodireccion_id' => 'required',
            'applicant.postulante_direccion' => 'required',
            'applicant.postulante_telefono' => 'required|numeric|digits:9',
            'applicant.postulante_telefonoAp' => 'required|numeric|digits:9',
            'applicant.postulante_correo' => 'required|email',
        ];
    }
}
