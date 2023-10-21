@extends('layouts.app')

@section('title', 'validar pago')

@section('content')
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <div class="bg-white">
            <div class="mx-auto max-w-7xl">
                @livewire('pay')
            </div>
        </div>
    </div>
@endsection
