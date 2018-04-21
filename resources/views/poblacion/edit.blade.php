@extends('layouts.base')

@section('title', 'Edicion de poblaciones')

@section('header')
	<header class="masthead" style="background-image: url('{{ asset('img/about-bg.jpg')  }}')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="page-heading">
            <h1>POBLACIONES</h1>
            <span class="subheading">Edicion de poblaciones</span>
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
    <form method="post" action="{{ url('/poblaciones/'.$poblacion->id.'/edit') }}">
      {{ csrf_field() }}
        <div class="modal-body">
          <input type="text" name="raza" class="form-control" placeholder="Raza..." value="{{ $poblacion->raza }}">
          <br>
          <div class="form-group label-floating">
            <label class="control-label">Sexo</label>
            <select class="form-control" name="sexo" id="sexo" >                              
              <option value="hombres" @if($poblacion->sexo == 'hombres') selected @endif>Hombres</option>
              <option value="mujeres" @if($poblacion->sexo == 'mujeres') selected @endif>Mujeres</option>   
            </select>
          </div>
        </div>

        <div class="modal-footer">
          <a href="{{ url('/poblaciones') }}">Cancelar</a>
          <button type="submit" class="btn btn-info btn-simple">Actualizar</button>
        </div>
    </form>
  </div>

@endsection