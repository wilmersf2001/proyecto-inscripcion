@extends('layouts.app')

@section('title', 'Registro Completado')

@section('content')
    <div class="py-10 px-20">
        <div class="relative transform overflow-hidden rounded-lg bg-white text-left transition-all w-full">
            <div class="bg-blue-50 px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                    <div
                        class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-blue-100 sm:mx-0 sm:h-10 sm:w-10">
                        <svg class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                        </svg>
                    </div>
                    <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                        <h3 class="text-xl font-semibold leading-6 text-blue-950" id="modal-title">IMPORTANTE</h3>
                        <div class="mt-4">
                            <p class="text-base text-gray-500">En las próximas horas se estará enviando a su correo
                                electronico la constancia de inscripción al proceso de Admisión 2024-I
                                La cual debera imprimir y canjearla por su carné de postulante en la Oficina General de
                                Sistemas
                                Informaticos y Administrativos.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 flex sm:px-6 justify-end">
                <a href="https://admision.unprg.edu.pe/"
                    class="inline-flex w-full justify-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 sm:ml-3 sm:w-auto">Volver
                    al Portal UNPRG</a>
            </div>
        </div>
    </div>
@endsection