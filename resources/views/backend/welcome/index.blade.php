@extends('backend.layout')

@section('content')

<div class="container-fluid">
  <div class="card">
    <div class="card-body">
      <h1>Welcome!</h1>
      <p>Selamat datang di halaman Content Management System Website {{ ENV('APP_NAME') }}</p>
    </div>
  </div>
</div>

@endsection