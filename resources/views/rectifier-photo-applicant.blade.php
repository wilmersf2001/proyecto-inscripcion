@extends('layouts.app')

@section('title', 'Registro Completado')

@section('content')
    @livewire('rectifier-photo-applicant', ['applicant' => $applicant])
@endsection
