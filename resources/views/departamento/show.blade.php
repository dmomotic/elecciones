@extends('layouts.base')

@section('title', 'Regiones')

@section('header')
	<header class="masthead" style="background-image: url('img/about-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="page-heading">
            <h1>DEPARTAMENTOS</h1>
            <span class="subheading">Departamentos registrados</span>
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
    <form method="post" action="{{ url('/departamentos') }}">
      {{ csrf_field() }}
      <input type="text" class="form-control" name="nombre" placeholder="Nombre...">
      <br>
      <div class="form-group label-floating">
        <label class="control-label">Region</label>
        <select class="form-control" name="id_region" id="id_region" >
            @foreach ($regiones as $region)                                
            <option value="{{ $region->id }}">{{ $region->nombre }} -- {{ $region->pais->nombre }}</option>
            @endforeach
        </select>
      </div>
      <button type="submit" rel="tooltip" title="Agregar" class="btn btn-primary btn-simple btn-xs">
        Agregar
      </button>
    </form>
  </div>
  <br>
  <br>
  <br>


  @foreach($paises as $pais)
  <div class="container">
    <h2 class="post-title">{{ $pais->nombre }}</h2>
  </div>
  <table class="table">
    <thead>
      <tr>
        <th class="text-center">#</th>
        <th class="col-md-2 text-center">Nombre</th>
        <th class="text-center">Region</th>
        <th class="text-center">Opciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach($departamentos as $departamento)
        @if($departamento->region->pais == $pais)
          <tr>
            <td class="text-center">{{ $departamento->id }}</td>
            <td class="text-center">{{ $departamento->nombre }}</td>
            <td class="text-center">{{ $departamento->region->nombre }}</td>

            <td>
              <a href="{{ url('/departamentos/'.$departamento->id.'/edit') }}" class="btn btn-success btn-round" title="Editar">
                <i class="fa fa-edit"></i>
              </a>
            </td>

            <form method="post" action="{{ url('/departamentos/'.$departamento->id) }}">
              {{ csrf_field() }}
              {{ method_field('DELETE') }}

              <td class="td-actions text-right">
                <button type="submit" rel="tooltip" title="Eliminar" class="btn btn-danger btn-simple btn-xs">
                  <i class="fa fa-times"></i>
                </button>
              </td>
            </form>
          </tr>
        @endif
      @endforeach
    </tbody>
  </table>
  <br>
  @endforeach

  

@endsection