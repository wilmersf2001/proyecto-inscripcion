@extends('layouts.app')

@section('title', 'validar pago')

@section('content')
  @livewire('applicant', ['applicant' => $applicant])
@endsection