@extends('layouts.base')

@section('title', 'Edicion de departamentos')

@section('header')
	<header class="masthead" style="background-image: url('{{ asset('img/about-bg.jpg')  }}')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="page-heading">
            <h1>DEPARTAMENTOS</h1>
            <span class="subheading">Edicion de departamentos</span>
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
    <form method="post" action="{{ url('/departamentos/'.$departamento->id.'/edit') }}">
      {{ csrf_field() }}
        <div class="modal-body">
          <input type="text" name="nombre" class="form-control" placeholder="Nombre..." value="{{ $departamento->nombre }}">
          <br>
          <select class="form-control" name="id_region" id="id_region" >
            @foreach ($regiones as $region)                                
              @if($departamento->region == $region)
                <option value="{{ $region->id }}" selected>{{ $region->nombre }} -- {{ $region->pais->nombre }}</option>
              @else
                <option value="{{ $region->id }}">{{ $region->nombre }} -- {{ $region->pais->nombre }}</option>
              @endif
            @endforeach
          </select>
        </div>

        <div class="modal-footer">
          <a href="{{ url('/departamentos') }}">Cancelar</a>
          <button type="submit" class="btn btn-info btn-simple">Actualizar</button>
        </div>
    </form>
  </div>

@endsection