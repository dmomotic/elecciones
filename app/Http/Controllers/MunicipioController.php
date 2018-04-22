<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Departamento;
use App\Region;
use App\Municipio;

class MunicipioController extends Controller
{
    public function show(){
    	$municipios = Municipio::all();
    	$departamentos = Departamento::all();
    	return view('municipio.show')->with(compact('municipios', 'departamentos'));
    }

    public function store(Request $request){
    	//mensajes
    	$messages = [
    		'nombre.required' => 'Es necesario ingresar un nombre para el municipio',
    		'id_departamento.required' => 'Es necesario asociar un departamento',
    		'id_departamento.numeric' => 'El id del departamento debe ser numerico',
    	];

    	//validaciones
    	$rules = [
    		'nombre' => 'required',
    		'id_departamento' => 'required|numeric',
    	];

    	$this->validate($request, $rules, $messages);

    	$municipio =  new Municipio();
    	$municipio->nombre = $request->input('nombre');
    	$municipio->id_departamento = $request->input('id_departamento');
    	$municipio->save();

    	return back();
    }

    public function destroy($id){
    	$municipio = Municipio::find($id);
    	if($municipio){
    		try {
    			$municipio->delete();
			    return back();
			}catch (\Illuminate\Database\QueryException $e){
			    $alert = 'No se puede borrar por restriccion de llave foranea';
    			return back()->with(compact('alert'));
			}
    	}

    	$alert = 'No existe el municipio a eliminar';
		return back()->with(compact('alert'));
    }

    public function edit($id){
    	$departamentos = Departamento::all();
        $municipio = Municipio::find($id);
        if($municipio){
            return view('municipio.edit')->with(compact('municipio', 'departamentos'));
        }
        $alert = 'No existe el municipio a editar';
        return back()->with(compact('alert'));
    }

    public function update(Request $request, $id){
        //mensajes
        $messages = [
            'nombre.required' => 'Es necesario ingresar un nombre para el municipio',
            'id_departamento.required' => 'Es necesario indicar el id del departamento',
            'id_departamento.numeric' => 'El id del departamento debe ser numerico',
        ];

        //validaciones
        $rules = [
            'nombre' => 'required',
            'id_departamento' => 'required|numeric'
        ];

        $this->validate($request, $rules, $messages);
        
        $municipio = Municipio::find($id);
        if($municipio){
            $municipio->nombre = $request->input('nombre');
            $municipio->id_departamento = $request->input('id_departamento');
            $municipio->save();
            return redirect('/municipios');
        }

        $alert = 'No existe el municipio a actualizar';
        return back()->with(compact('alert'));  
    }
}
