@extends('layouts.base')

@section('title', 'Edicion de tipos de eleccion')

@section('header')
	<header class="masthead" style="background-image: url('{{ asset('img/about-bg.jpg') }}')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="page-heading">
            <h1>TIPOS DE ELECCION</h1>
            <span class="subheading">Edicion de tipos de eleccion</span>
          </div>
        </div>
      </div>
    </div>
  </header>
@endsection

@section('content')

  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  @endif

  @if (session('alert'))
    <div class="alert alert-danger">
        {{ session('alert') }}
    </div>
  @endif

  <div >
    <form method="post" action="{{ url('/tipo-elecciones/'.$tipo_eleccion->id.'/edit') }}">
      {{ csrf_field() }}

        <div class="modal-body">
          <input type="text" name="nombre" class="form-control" placeholder="Nombre..." value="{{ $tipo_eleccion->nombre }}">
        </div>

        <div class="modal-footer">
          <a href="{{ url('/tipo-elecciones') }}">Cancelar</a>
          <button type="submit" class="btn btn-info btn-simple">Actualizar</button>
        </div>
    </form>
  </div>

@endsection