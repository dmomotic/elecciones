<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Departamento;

class DepartamentoController extends Controller
{
    
	public function show(){
    	$departamentos = Departamento::paginate(10);
    	dd($departamentos)
    	return view('departamento.show')->with(compact('departamentos'));
    }

    /*
    public function store(Request $request){
    	//mensajes
    	$messages = [
    		'nombre.required' => 'Es necesario ingresar un nombre para la region',
    		'id_pais.required' => 'Es necesario asociar una pais',
    		'id_pais.numeric' => 'El id del pais debe ser numerico',
    	];

    	//validaciones
    	$rules = [
    		'nombre' => 'required',
    		'id_pais' => 'required|numeric',
    	];

    	$this->validate($request, $rules, $messages);

    	$region =  new Region();
    	$region->nombre = $request->input('nombre');
    	$region->id_pais = $request->input('id_pais');
    	$region->save();

    	return back();
    }

    public function destroy($id){
    	$region = Region::find($id);
    	if($region){
    		try {
    			$region->delete();
			    return back();
			}catch (\Illuminate\Database\QueryException $e){
			    $alert = 'No se puede borrar por restriccion de llave foranea';
    			return back()->with(compact('alert'));
			}
    	}

    	$alert = 'No existe la region a eliminar';
		return back()->with(compact('alert'));
    }

    public function edit($id){
        $paises = Pais::all();
        $region = Region::find($id);
        if($region){
            return view('region.edit')->with(compact('region','paises'));
        }
        $alert = 'No existe la region a editar';
        return back()->with(compact('alert'));
    }

    public function update(Request $request, $id){
        //mensajes
        $messages = [
            'nombre.required' => 'Es necesario ingresar un nombre para la region',
            'id_pais.required' => 'Es necesario indicar el id del pais',
            'id_pais.numeric' => 'El id del pais debe ser numerico',
        ];

        //validaciones
        $rules = [
            'nombre' => 'required',
            'id_pais' => 'required|numeric'
        ];

        $this->validate($request, $rules, $messages);
        
        $region = Region::find($id);
        if($region){
            $region->nombre = $request->input('nombre');
            $region->id_pais = $request->input('id_pais');
            $region->save();
            return redirect('/regiones');
        }

        $alert = 'No existe la region a actualizar';
        return back()->with(compact('alert'));  
    }
    */
}
