<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidatePaymentRequest extends FormRequest
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
      'dni' => 'required|numeric|digits:8|exists:admision_banco,dni_dep',
      'voucherNumber' => 'required|numeric|digits:7|exists:admision_banco,NumDoc',
      'agencyNumber' => 'required|numeric|digits:4|exists:admision_banco,Oficina',
      'payDay' => 'required|date',

    ];
  }
}
