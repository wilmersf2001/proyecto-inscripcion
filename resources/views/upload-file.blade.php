@extends('layouts.app')

@section('title', 'Admisión | Carga de Archivos')

@section('content')
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        @livewire('upload-file')
    </div>
@endsection