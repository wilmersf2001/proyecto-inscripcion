<?php

namespace App\Http\Requests\View\Message;

class ValidatePayment
{
  public const MESSAGES_ERROR = [
    'dni.required' => 'dni es requerido',
    'dni.numeric' => 'campo dni debe ser numérico',
    'dni.digits' => 'campo dni debe tener 8 dígitos',
    'dni.exists' => 'dni no realizó ningún pago',
    'voucherNumber.required' => 'voucher es requerido',
    'voucherNumber.numeric' => 'campo número de voucher debe ser numérico',
    'voucherNumber.digits' => 'campo número de voucher debe tener 7 dígitos',
    'voucherNumber.exists' => 'número de voucher no encontrado',
    'agencia.required' => 'agencia es requerido',
    'agencia.digits' => 'campo de agencia debe tener 4 digitos',
    'agencia.numeric' => 'campo número de agencia debe ser numérico',
    'agencia.exists' => 'número de agencia no encontrado',
  ];
}
