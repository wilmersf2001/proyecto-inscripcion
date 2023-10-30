<?php

namespace App\Http\Requests\View\Message;

class ValidateApplicant{
  public const MESSAGES_ERROR =[
    'applicant.postulante_nombres.required' => 'El campo nombres es obligatorio',
    'applicant.postulante_apPaterno.required' => 'El campo apellido paterno es obligatorio',
    'applicant.postulante_apMaterno.required' => 'El campo apellido materno es obligatorio',
    'applicant.postulante_fechNac.required' => 'El campo fecha de nacimiento es obligatorio',
    'applicant.postulante_fechNac.date' => 'El campo fecha de nacimiento debe ser una fecha',
    'applicant.postulante_fechNac.before' => 'La fecha de nacimiento es incoherente',
    'applicant.sexo_id.required' => 'El campo sexo es obligatorio',
    'applicant.distrito_id.required' => 'El campo distrito de nacimiento es obligatorio',
    'applicant.distrito_id.numeric' => 'El campo distrito de nacimiento debe ser un número',
    'applicant.distrito_id_direccion.required' => 'El campo distrito de residencia es obligatorio',
    'applicant.distrito_id_direccion.numeric' => 'El campo distrito de residencia debe ser un número',
    'applicant.tipodireccion_id.required' => 'El campo tipo de dirección es obligatorio',
    'applicant.postulante_direccion.required' => 'El campo dirección es obligatorio',
    'applicant.postulante_telefono.required' => 'El campo teléfono es obligatorio',
    'applicant.postulante_telefono.numeric' => 'El campo teléfono debe ser un número',
    'applicant.postulante_telefono.digits' => 'El campo teléfono debe tener 9 dígitos',
    'applicant.postulante_telefonoAp.required' => 'El campo teléfono de apoderado es obligatorio',
    'applicant.postulante_telefonoAp.numeric' => 'El campo teléfono de apoderado debe ser un número',
    'applicant.postulante_telefonoAp.digits' => 'El campo teléfono de apoderado debe tener 9 dígitos',
    'applicant.postulante_correo.required' => 'El campo correo es obligatorio',
    'applicant.postulante_correo.email' => 'El campo correo debe tener un formato válido',
    'applicant.sede_id.required' => 'El campo sede es obligatorio',
    'applicant.sede_id.numeric' => 'El campo sede debe ser un número',
    'applicant.escuela_id.required' => 'El campo escuela es obligatorio',
    'applicant.escuela_id.numeric' => 'El campo escuela debe ser un número',
    'applicant.postulante_numvecesu.required' => 'número de veces que postula a la UNPRG es obligatorio',
    'applicant.postulante_numvecesu.numeric' => 'Este campo debe ser numérico',
    'applicant.postulante_numvecesu.integer' => 'solo se admiten números enteros',
    'applicant.postulante_numvecesu.gte' => 'Este campo debe ser mayor o igual a 0',
    'applicant.postulante_numveceso.required' => 'número de veces que postula a otras universidades es obligatorio',
    'applicant.postulante_numveceso.numeric' => 'Este campo debe ser numérico',
    'applicant.postulante_numveceso.integer' => 'solo se admiten números enteros',
    'applicant.postulante_numveceso.gte' => 'Este campo debe ser mayor o igual a 0',
    'applicant.colegio_id.required' => 'El campo colegio es obligatorio',
    'applicant.colegio_id.numeric' => 'El campo colegio debe ser un número',
    'applicant.postulante_anoEgreso.required' => 'El campo año de egreso es obligatorio',
    'applicant.postulante_anoEgreso.numeric' => 'El campo año de egreso debe ser un número',
    'applicant.postulante_anoEgreso.digits' => 'El campo año de egreso debe tener 4 dígitos',
    'applicant.modalidad_id.required' => 'El campo modalidad es obligatorio',
    'applicant.modalidad_id.numeric' => 'El campo modalidad debe ser un número',
    'typeSchool.required' => 'El campo tipo de colegio es obligatorio',
    'typeSchool.numeric' => 'El campo tipo de colegio debe ser un número',
    'selectedDepartmentCollegeId.required' => 'El campo departamento es obligatorio',
    'selectedDepartmentCollegeId.numeric' => 'El campo departamento debe ser un número',
    'profilePhoto.required' => 'La foto de perfil es requerida',
    'profilePhoto.mimes' => 'La foto debe tener el formato jpeg o png',
    'profilePhoto.max' => 'La foto de perfil no debe pesar más de 1MB',
    'reverseDniPhoto.required' => 'La foto del reverso del DNI es requerida',
    'reverseDniPhoto.mimes' => 'La foto debe tener el formato jpeg o png',
    'reverseDniPhoto.max' => 'La foto del reverso del DNI no debe pesar más de 1MB',
    'frontDniPhoto.required' => 'La foto del anverso del DNI es requerida',
    'frontDniPhoto.mimes' => 'La foto debe tener el formato jpeg o png',
    'frontDniPhoto.max' => 'La foto del anverso del DNI no debe pesar más de 1MB',
    'accordance.accepted' => 'Debe aceptar los términos y condiciones',
  ];
}