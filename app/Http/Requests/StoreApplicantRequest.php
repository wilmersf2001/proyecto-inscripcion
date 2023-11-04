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
      'num_documento' => 'required|numeric|regex:/^\d{8,9}$/',
      'tipo_documento' => 'required|numeric',
      'num_voucher' => 'required|numeric|digits:7',
      'nombres' => 'required',
      'ap_paterno' => 'required',
      'ap_materno' => 'required',
      'fecha_nacimiento' => 'required|date|before:2008-01-01',
      'sexo_id' => 'required|numeric',
      'distrito_nac' => 'required|numeric',
      'distrito_res' => 'required|numeric',
      'tipo_direccion' => 'required|numeric',
      'direccion' => 'required',
      'telefono' => 'required|numeric|digits:9',
      'telefono_ap' => 'required|numeric|digits:9',
      'correo' => 'required|email',
      'sede_id' => 'required|numeric',
      'programa_academico_id' => 'required|numeric',
      'num_veces_unprg' => 'required|numeric|integer|gte:0',
      'modalidad_id' => 'required|numeric',
      'anno_egreso' => 'required|numeric|digits:4',
      'colegio_id' => 'required|numeric',
      'num_veces_otro' => 'required|numeric|integer|gte:0',
      'profilePhoto' => 'required|mimes:jpeg|max:1024',
      'reverseDniPhoto' => 'required|mimes:jpeg|max:1024',
      'frontDniPhoto' => 'required|mimes:jpeg|max:1024',
      'accordance' => 'required|accepted',
    ];
  }
}
