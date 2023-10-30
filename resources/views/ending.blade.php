@extends('layouts.app')

@section('title', 'Registro Completado')

@section('content')
    <div class="p-10">
        <div class="border-t border-b border-gray-900/10 py-12">
            <h2 class="text-base font-semibold leading-7 text-gray-900">Mensaje</h2>
            <p class="mt-1 text-sm leading-6 text-gray-600">En las próximas horas se estará enviando a su correo
                electronico la constancia de inscripción al proceso de Admisión 2024-I
                La cual debera imprimir y canjearla por su carné de postulante en la Oficina General de Sistemas
                Informaticos y Administrativos.</p>
        </div>
        <div class="flex w-full justify-end">
            <a href="https://admision.unprg.edu.pe/"
                class="cursor-pointer mt-4 text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                Volver al Portal UNPRG
            </a>
        </div>
    </div>
@endsection
