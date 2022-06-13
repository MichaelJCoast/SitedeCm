@extends(backpack_user() && (Str::startsWith(\Request::path(), config('backpack.base.route_prefix'))) ? 'backpack::layouts.top_left' : 'backpack::layouts.plain')
{{-- show error using sidebar layout if looged in AND on an admin page; otherwise use a blank page --}}

@php
  $title = 'Error '.$error_number;
@endphp

@section('after_styles')
  <style>
    body {background-color: #232323;}
    .error_number {
      color:#DC2638;
      font-size: 156px;
      font-weight: 600;
      line-height: 100px;
    }
    .error_number small {
      color:#DC2638;
      font-size: 56px;
      font-weight: 700;
    }

    .error_number hr {
      color:#DC2638;
      margin-top: 60px;
      margin-bottom: 0;
      width: 50px;
    }

    .error_title {
      color:#DC2638;
      margin-top: 40px;
      font-size: 36px;
      font-weight: 400;
    }

    .error_description {
      color:white;
      font-size: 24px;
      font-weight: 400;
    }
  </style>
@endsection

@section('content')
<div class="row">
  <div class="col-md-12 text-center">
    <div class="error_number">
      <small>ERROR</small><br>
      {{ $error_number }}
      <hr>
    </div>
    <div class="error_title ">
      @yield('title')
    </div>
    <div class="error_description ">
      <small>
        @yield('description')
     </small>
    </div>
  </div>
</div>
@endsection