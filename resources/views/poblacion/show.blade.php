@extends('layouts.base')

@section('title', 'Poblaciones')

@section('header')
	<header class="masthead" style="background-image: url('img/about-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="page-heading">
            <h1>POBLACIONES</h1>
            <span class="subheading">Poblaciones registradas</span>
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
    <form method="post" action="{{ url('/poblaciones') }}">
      {{ csrf_field() }}
      <div class="form-group label-floating">
        <label class="control-label">Sexo</label>
        <select class="form-control" name="sexo" id="sexo" >                              
          <option value="hombres">Hombres</option>
          <option value="mujeres">Mujeres</option>   
        </select>
      </div>
      <br>
      <input type="text" class="form-control" name="raza" placeholder="Raza..." value="{{ old('raza') }}">
      <br>
      <button type="submit" rel="tooltip" title="Agregar" class="btn btn-primary btn-simple btn-xs">
        Agregar
      </button>
    </form>
  </div>
  <br>
  <br>
  <br>

  <table class="table">
    <thead>
        <tr>
            <th class="text-center">#</th>
            <th class="text-center">Sexo</th>
            <th class="col-md-2 text-center">Raza</th>
            <th class="text-center">Opciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($poblaciones as $poblacion)
        <tr>
            <td class="text-center">{{ $poblacion->id }}</td>
            <td class="text-center">{{ $poblacion->sexo }}</td>
            <td class="text-center">{{ $poblacion->raza }}</td>
            
            <td>
              <a href="{{ url('/poblaciones/'.$poblacion->id.'/edit') }}" class="btn btn-success btn-round" title="Editar">
                <i class="fa fa-edit"></i>
              </a>
            </td>

            <form method="post" action="{{ url('/poblaciones/'.$poblacion->id) }}">
              {{ csrf_field() }}
              {{ method_field('DELETE') }}

              <td class="td-actions text-right">
                <button type="submit" rel="tooltip" title="Eliminar" class="btn btn-danger btn-simple btn-xs">
                  <i class="fa fa-times"></i>
                </button>
              </td>
            </form>
            
        </tr>
        @endforeach
    </tbody>
  </table>

@endsection