<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Departamento;
use App\Region;
use App\Pais;

class DepartamentoController extends Controller
{
    
	public function show(){
    	$departamentos = Departamento::all();
    	$regiones = Region::all();
    	$paises = Pais::all();
    	return view('departamento.show')->with(compact('departamentos', 'regiones', 'paises'));
    }

    
    public function store(Request $request){
    	//mensajes
    	$messages = [
    		'nombre.required' => 'Es necesario ingresar un nombre para el departamento',
    		'id_region.required' => 'Es necesario asociar una region',
    		'id_region.numeric' => 'El id de la region debe ser numerico',
    	];

    	//validaciones
    	$rules = [
    		'nombre' => 'required',
    		'id_region' => 'required|numeric',
    	];

    	$this->validate($request, $rules, $messages);

    	$departamento =  new Departamento();
    	$departamento->nombre = $request->input('nombre');
    	$departamento->id_region = $request->input('id_region');
    	$departamento->save();

    	return back();
    }

    public function destroy($id){
    	$departamento = Departamento::find($id);
    	if($departamento){
    		try {
    			$departamento->delete();
			    return back();
			}catch (\Illuminate\Database\QueryException $e){
			    $alert = 'No se puede borrar por restriccion de llave foranea';
    			return back()->with(compact('alert'));
			}
    	}

    	$alert = 'No existe el departamento a eliminar';
		return back()->with(compact('alert'));
    }

    public function edit($id){
    	$regiones = Region::all();
        $departamento = Departamento::find($id);
        if($departamento){
            return view('departamento.edit')->with(compact('departamento', 'regiones'));
        }
        $alert = 'No existe el departamento a editar';
        return back()->with(compact('alert'));
    }


    public function update(Request $request, $id){
        //mensajes
        $messages = [
            'nombre.required' => 'Es necesario ingresar un nombre para el departamento',
            'id_region.required' => 'Es necesario indicar el id de la region',
            'id_region.numeric' => 'El id de la region debe ser numerico',
        ];

        //validaciones
        $rules = [
            'nombre' => 'required',
            'id_region' => 'required|numeric'
        ];

        $this->validate($request, $rules, $messages);
        
        $departamento = Departamento::find($id);
        if($departamento){
            $departamento->nombre = $request->input('nombre');
            $departamento->id_region = $request->input('id_region');
            $departamento->save();
            return redirect('/departamentos');
        }

        $alert = 'No existe el departamento a actualizar';
        return back()->with(compact('alert'));  
    }
    
}
