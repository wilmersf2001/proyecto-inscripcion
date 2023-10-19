@extends('layouts.app')

@section('title', 'validar pago')

@section('content')
  @livewire('applicant', ['responseApiReniec' => $applicant])
@endsection