<?php

namespace App\Http\Requests\View\Message;

class ValidatePayment
{
  public const MESSAGES_ERROR = [
    'dni.required' => 'campo dni no puede ser vacío',
    'dni.numeric' => 'campo dni debe ser numérico',
    'dni.digits' => 'campo dni debe tener 8 dígitos',
    'dni.exists' => 'dni no realizó ningún pago',
    'voucherNumber.required' => 'campo número de voucher no puede ser vacío',
    'voucherNumber.numeric' => 'campo número de voucher debe ser numérico',
    'voucherNumber.digits' => 'campo número de voucher debe tener 7 dígitos',
    'voucherNumber.exists' => 'número de voucher no encontrado',
  ];
}