<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Poblacion;

class PoblacionController extends Controller
{
    public function show(){
    	$poblaciones = Poblacion::all();
    	return view('poblacion.show')->with(compact('poblaciones'));
    }

    public function store(Request $request){
    	//mensajes
    	$messages = [
    		'raza.required' => 'Es necesario ingresar una raza para la poblacion',
    		'sexo.required' => 'Ese necesario ingresar un sexo para la poblacion',
    	];

    	//validaciones
    	$rules = [
    		'raza' => 'required',
    		'sexo' => 'required', 
    	];

    	$this->validate($request, $rules, $messages);

    	$poblacion =  new Poblacion();
    	$poblacion->raza = $request->input('raza');
    	$poblacion->sexo = $request->input('sexo');
    	$poblacion->save();

    	return back();
    }

    public function destroy($id){
    	$poblacion = Poblacion::find($id);
    	if($poblacion){
    		try {
    			$poblacion->delete();
			    return back();
			}catch (\Illuminate\Database\QueryException $e){
			    $alert = 'No se puede borrar por restriccion de llave foranea';
    			return back()->with(compact('alert'));
			}
    	}

    	$alert = 'No existe la poblacion a eliminar';
		return back()->with(compact('alert'));
    }

    public function edit($id){
        $poblacion = Poblacion::find($id);
        if($poblacion){
            return view('poblacion.edit')->with(compact('poblacion'));
        }
        $alert = 'No existe la poblacion a editar';
        return back()->with(compact('alert'));
    }

    public function update(Request $request, $id){
    	//mensajes
    	$messages = [
    		'raza.required' => 'Es necesario ingresar una raza para la poblacion',
    		'sexo.required' => 'Ese necesario ingresar un sexo para la poblacion',
    	];

    	//validaciones
    	$rules = [
    		'raza' => 'required',
    		'sexo' => 'required', 
    	];

    	$this->validate($request, $rules, $messages);
    	
    	$poblacion = Poblacion::find($id);
    	if($poblacion){
    		$poblacion->raza = $request->input('raza');
    		$poblacion->sexo = $request->input('sexo');
    		$poblacion->save();
    		return redirect('/poblaciones');
    	}
    	$alert = 'No existe la poblacion a actualizar';
		return back()->with(compact('alert'));	
	}
    
}
