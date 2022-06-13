@extends('errors.layout')

@php
  $error_number = 408;
@endphp

@section('title')
  Request timeout.
@endsection

@section('description')
  @php
    $default_error_message = "<style>a {color: #DC2638;} a:hover { color: #a30515;}</style>Porfavor <a href='javascript:history.back()'> retroceda </a>, refresque a página e tente outra vez.";
  @endphp
  {!! isset($exception)? ($exception->getMessage()?e($exception->getMessage()):$default_error_message): $default_error_message !!}
@endsection
