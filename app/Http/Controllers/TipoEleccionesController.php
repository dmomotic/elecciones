<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TipoEleccion;

class TipoEleccionesController extends Controller
{
    
	public function show(){
    	$tipo_elecciones = TipoEleccion::all();
    	return view('tipo_eleccion.show')->with(compact('tipo_elecciones'));
    }

    public function store(Request $request){
    	//mensajes
    	$messages = [
    		'nombre.required' => 'Es necesario ingresar un nombre para el tipo de eleccion',
    	];

    	//validaciones
    	$rules = [
    		'nombre' => 'required',
    	];

    	$this->validate($request, $rules, $messages);

    	$tipo_eleccion =  new TipoEleccion();
    	$tipo_eleccion->nombre = $request->input('nombre');
    	$tipo_eleccion->save();

    	return back();
    }

    public function destroy($id){
    	$tipo_eleccion = TipoEleccion::find($id);
    	if($tipo_eleccion){
    		try {
    			$tipo_eleccion->delete();
			    return back();
			}catch (\Illuminate\Database\QueryException $e){
			    $alert = 'No se puede borrar por restriccion de llave foranea';
    			return back()->with(compact('alert'));
			}
    	}

    	$alert = 'No existe el tipo de eleccion a eliminar';
		return back()->with(compact('alert'));
    }

    public function edit($id){
        $tipo_eleccion = TipoEleccion::find($id);
        if($tipo_eleccion){
            return view('tipo_eleccion.edit')->with(compact('tipo_eleccion'));
        }
        $alert = 'No existe la eleccion a editar';
        return back()->with(compact('alert'));
    }

    public function update(Request $request, $id){
    	//mensajes
    	$messages = [
    		'nombre.required' => 'Es necesario ingresar un nombre para el tipo de eleccion',
    	];

    	//validaciones
    	$rules = [
    		'nombre' => 'required',
    	];

    	$this->validate($request, $rules, $messages);
    	
    	$tipo_eleccion = TipoEleccion::find($id);
    	if($tipo_eleccion){
    		$tipo_eleccion->nombre = $request->input('nombre');
    		$tipo_eleccion->save();
    		return redirect('/tipo-elecciones');
    	}
    	$alert = 'No existe el tipo de eleccion a actualizar';
		return back()->with(compact('alert'));	
    }
    
}
