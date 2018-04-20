<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pais;

class PaisController extends Controller
{
    public function show(){
    	$paises = Pais::all();
    	return view('pais.show')->with(compact('paises'));
    }

    public function store(Request $request){
    	//mensajes
    	$messages = [
    		'nombre.required' => 'Es necesario ingresar un nombre para el pais',
    	];

    	//validaciones
    	$rules = [
    		'nombre' => 'required',
    	];

    	$this->validate($request, $rules, $messages);

    	$pais =  new Pais();
    	$pais->nombre = $request->input('nombre');
    	$pais->save();

    	return back();
    }

    public function destroy($id){
    	$pais = Pais::find($id);
    	if($pais){
    		try {
    			$pais->delete();
			    return back();
			}catch (\Illuminate\Database\QueryException $e){
			    $alert = 'No se puede borrar por restriccion de llave foranea';
    			return back()->with(compact('alert'));
			}
    	}

    	$alert = 'No existe el pais a eliminar';
		return back()->with(compact('alert'));
    }

    public function edit($id){
        $pais = Pais::find($id);
        if($pais){
            return view('pais.edit')->with(compact('pais'));
        }
        $alert = 'No existe el pais a editar';
        return back()->with(compact('alert'));
    }

    public function update(Request $request, $id){
    	//mensajes
    	$messages = [
    		'nombre.required' => 'Es necesario ingresar un nombre para el pais',
    	];

    	//validaciones
    	$rules = [
    		'nombre' => 'required',
    	];

    	$this->validate($request, $rules, $messages);
    	
    	$pais = Pais::find($id);
    	if($pais){
    		$pais->nombre = $request->input('nombre');
    		$pais->save();
    		return redirect('/paises');
    	}
    	$alert = 'No existe el pais a actualizar';
		return back()->with(compact('alert'));	
    }
}
