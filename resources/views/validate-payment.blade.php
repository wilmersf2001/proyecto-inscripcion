@extends('layouts.app')

@section('title', 'validar pago')

@section('content')
    <div class="bg-white min-h-screen flex items-center">

        <div
            class="mx-auto max-w-2xl px-4 pb-16 pt-10 sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-3 lg:grid-rows-[auto,auto,1fr] lg:gap-x-8 lg:px-8 lg:pb-24 lg:pt-16">
            <div class="lg:col-span-2 lg:border-r lg:border-gray-200 lg:pr-8">
                <h1 class="text-2xl font-bold tracking-tight text-gray-900 sm:text-2xl mb-8 text-center">UNIVERSIDAD NACIONAL
                    PEDRO RUIZ
                    GALLO
                </h1>
            </div>

            <div class="mt-4 lg:row-span-3 lg:mt-0">
                <div class="flex justify-center items-center">
                    <img src="{{ asset('images/logo_bn.jpg') }}" alt="Banco de la nacion" width="45" height="45" />
                    <p class="ml-4 text-2xl tracking-tight text-gray-900">Banco de la Nación</p>
                </div>

                @livewire('pay')

            </div>

            <div
                class="hidden lg:grid py-10 lg:col-span-2 lg:col-start-1 lg:border-r lg:border-gray-200 lg:pb-16 lg:pr-8 lg:pt-6">
                <div>
                    <h3 class="sr-only">Description</h3>

                    <div class="space-y-6">
                        <p class="text-base text-gray-900 text-justify leading-7 px-8">
                            ¡Bienvenido al proceso de admisión en la Universidad Pedro Ruiz Gallo! Para continuar, asegúrate
                            de haber
                            completado el pago correspondiente en el Banco de la Nación. Luego, ingresa tus datos a
                            continuación para
                            verificar el pago realizado y avanzar en tu proceso de admisión.
                        </p>
                    </div>


                </div>
            </div>

        </div>
    </div>
@endsection
