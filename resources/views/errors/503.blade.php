@extends('errors.layout')

@php
  $error_number = 503;
@endphp

@section('title')
  It's not you, it's me.
@endsection

@section('description')
  @php
    $default_error_message = "O servidor está sobrecarregado ou em manutenção. Porfavor tente mais tarde.";
  @endphp
  {!! isset($exception)? ($exception->getMessage()?e($exception->getMessage()):$default_error_message): $default_error_message !!}
@endsection
