@extends('errors.layout')

@php
	$error_number = 500;
@endphp

@section('title')
	It's not you, it's me.
@endsection

@section('description')
	@php
	  $default_error_message = "Ocorreu um erro interno. Se o erro persistir porfavor entre em contacto com a equipa de desenvolvimento.";
	@endphp
	{!! isset($exception)? ($exception->getMessage()?e($exception->getMessage()):$default_error_message): $default_error_message !!}
@endsection
