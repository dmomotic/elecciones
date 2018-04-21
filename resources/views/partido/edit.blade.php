@extends('layouts.base')

@section('title', 'Edicion de partidos')

@section('header')
	<header class="masthead" style="background-image: url('{{ asset('img/about-bg.jpg') }}')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="page-heading">
            <h1>PARTIDOS POLITICOS</h1>
            <span class="subheading">Edicion de partidos politicos</span>
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
    <form method="post" action="{{ url('/partidos/'.$partido->id.'/edit') }}">
      {{ csrf_field() }}

        <div class="modal-body">
          <input type="text" class="form-control" name="partido" placeholder="Acronimo..." value="{{ $partido->partido }}">
        </div>

        <div class="modal-body">
          <input type="text" name="nombre" class="form-control" placeholder="Nombre..." value="{{ $partido->nombre }}">
        </div>

        <div class="modal-footer">
          <a href="{{ url('/partidos') }}">Cancelar</a>
          <button type="submit" class="btn btn-info btn-simple">Actualizar</button>
        </div>
    </form>
  </div>

@endsection