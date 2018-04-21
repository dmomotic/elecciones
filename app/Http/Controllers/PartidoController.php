<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Partido;

class PartidoController extends Controller
{
    public function show(){
    	$partidos = Partido::all();
    	return view('partido.show')->with(compact('partidos'));
    }

    public function store(Request $request){
    	//mensajes
    	$messages = [
    		'nombre.required' => 'Es necesario ingresar un nombre para el partido politico',
    		'partido.required' => 'Ese necesario ingresar un acronimo para el partido politico',
    		'partido.max' => 'El acronimo debe tener como maximo 5 caracteres',
    	];

    	//validaciones
    	$rules = [
    		'nombre' => 'required',
    		'partido' => 'required|max:5', 
    	];

    	$this->validate($request, $rules, $messages);

    	$partido =  new Partido();
    	$partido->nombre = $request->input('nombre');
    	$partido->partido = $request->input('partido');
    	$partido->save();

    	return back();
    }

    public function destroy($id){
    	$partido = Partido::find($id);
    	if($partido){
    		try {
    			$partido->delete();
			    return back();
			}catch (\Illuminate\Database\QueryException $e){
			    $alert = 'No se puede borrar por restriccion de llave foranea';
    			return back()->with(compact('alert'));
			}
    	}

    	$alert = 'No existe el partido a eliminar';
		return back()->with(compact('alert'));
    }

    public function edit($id){
        $partido = Partido::find($id);
        if($partido){
            return view('partido.edit')->with(compact('partido'));
        }
        $alert = 'No existe el partido a editar';
        return back()->with(compact('alert'));
    }

    public function update(Request $request, $id){
    	//mensajes
    	$messages = [
    		'nombre.required' => 'Es necesario ingresar un nombre para el pais',
    		'partido.required' => 'Ese necesario ingresar un acronimo para el partido politico',
    		'partido.max' => 'El acronimo debe tener como maximo 5 caracteres',
    	];

    	//validaciones
    	$rules = [
    		'nombre' => 'required',
    		'partido' => 'required|max:5',
    	];

    	$this->validate($request, $rules, $messages);
    	
    	$partido = Partido::find($id);
    	if($partido){
    		$partido->nombre = $request->input('nombre');
    		$partido->partido = $request->input('partido');
    		$partido->save();
    		return redirect('/partidos');
    	}
    	$alert = 'No existe el partido a actualizar';
		return back()->with(compact('alert'));	
    }
}
