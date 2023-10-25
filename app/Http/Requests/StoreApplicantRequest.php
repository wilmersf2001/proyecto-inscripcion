<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreApplicantRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   */
  public function authorize(): bool
  {
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
   */
  public function rules(): array
  {
    return [
      'dni' => 'required|numeric|digits:8',
      'num_voucher' => 'required|numeric|digits:7',
      'nombres' => 'required',
      'apPaterno' => 'required',
      'apMaterno' => 'required',
      'fechaNacimiento' => 'required|date',
      'sexo_id' => 'required|numeric',
      'distritoNac' => 'required|numeric',
      'distritoRes' => 'required|numeric',
      'tipoDireccion' => 'required|numeric',
      'direccion' => 'required',
      'telefono' => 'required|numeric|digits:9',
      'telefonoAp' => 'required|numeric|digits:9',
      'correo' => 'required|email',
      'sede_id' => 'required|numeric',
      'programaAcademico_id' => 'required|numeric',
      'modalidad_id' => 'required|numeric',
      'colegio_id' => 'required|numeric',
      'anno_egreso' => 'required|numeric|digits:4',
      'num_veces_unprg' => 'required|numeric|integer|gte:0',
      'num_veces_otro' => 'required|numeric|integer|gte:0',
      'profilePhoto' => 'required|image|max:1024',
      'reverseDniPhoto' => 'required|image|max:1024',
      'frontDniPhoto' => 'required|image|max:1024',
      'accordance' => 'required|accepted',
    ];
  }
}
