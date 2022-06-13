@extends('errors.layout')

@php
  $error_number = 404;
@endphp

@section('title')
  Página não encontrada.
@endsection

@section('description')
  @php
    $default_error_message = "<style>a {color: #DC2638;} a:hover { color: #a30515;}</style>Porfavor <a href='javascript:history.back()'> retroceda </a> ou volte à <a href='".url('')."'>página inicial</a>.";
  @endphp
  {!! isset($exception)? ($exception->getMessage()?e($exception->getMessage()):$default_error_message): $default_error_message !!}
@endsection
