<?php

namespace App\Http\Controllers;

use App\Models\RecetaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RecetaController extends Controller
{

    public function index()
    {
        $data['recetas'] = RecetaModel::paginate(6);
        return view('receta.index', $data);
    }


    public function create()
    {
        return view('receta.create');
    }


    public function store(Request $request)
    {
        $campos = [
            'foto' => 'required|mimes:jpeg,png,jpg',
            'titulo' => 'required|string|max:100',
            'ingredientes' => 'required|string|max:500',
            'pasos' => 'required|string|max:3000'
        ];

        $mensaje = [
            'ingredientes.required' => 'Los ingredientes son necesarios',
            'pasos.required' => 'Los pasos son necesarios',
            'foto.required' => 'La foto es necesaria',
            'titulo.required' => 'El nombre de la receta es necesario',
        ];

        $this->validate($request, $campos, $mensaje);

        $datosReceta = $request->except('_token');
        if ($request->hasFile('foto')) {
            $datosReceta['foto'] = $request->file('foto')->store('uploads', 'public');
        }
        RecetaModel::insert($datosReceta);
        return redirect('receta')->with('mensaje', 'Receta insertada correctamente');
    }

    public function show($id)
    {
        $receta = RecetaModel::findOrFail($id);
        $ingredientes = $receta->ingredientes;
        $ingredientes = explode(".", $ingredientes);
        $pasos = $receta->pasos;
        $pasos = explode(".", $pasos);
        return view('receta.show', compact('receta', 'ingredientes', 'pasos'));
    }


    public function edit($id)
    {
        $receta = RecetaModel::findOrFail($id);
        return view('receta.edit', compact('receta'));
    }


    public function update(Request $request, $id)
    {

        $campos = [
            'titulo' => 'required|string|max:100',
            'ingredientes' => 'required|string|max:500',
            'pasos' => 'required|string|max:3000'
        ];

        $mensaje = [
            'ingredientes.required' => 'Los ingredientes son necesarios',
            'pasos.required' => 'Los pasos son necesarios',
            'titulo.required' => 'El nombre de la receta es necesario'
        ];

        if ($request->hasFile('foto')) {

            $campos = [
                'foto' => 'required|mimes:jpeg,png,jpg'
            ];

            $mensaje = [
                'foto.required' => 'La foto es necesaria',
            ];
        }

        $this->validate($request, $campos, $mensaje);

        $datosReceta = $request->except(['_token', '_method']);

        if ($request->hasFile('foto')) {
            $receta = RecetaModel::findOrFail($id);
            Storage::delete('public/' . $receta->foto);
            $datosReceta['foto'] = $request->file('foto')->store('uploads', 'public');
        }

        RecetaModel::where('id', '=', $id)->update($datosReceta);

        $receta = RecetaModel::findOrFail($id);
        return redirect('receta')->with('mensaje', 'Receta modificada correctamente');
    }


    public function destroy($id)
    {
        $receta = RecetaModel::findOrFail($id);
        if (Storage::delete('public/' . $receta->foto)) {
            RecetaModel::destroy($id);
        }
        return redirect('receta')->with('mensaje', 'Receta borrada correctamente');
    }
}
