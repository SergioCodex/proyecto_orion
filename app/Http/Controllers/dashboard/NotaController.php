<?php

namespace App\Http\Controllers\dashboard;

use App\Notas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class NotaController extends Controller
{
    public function store(Request $request)
    {

        Notas::create([
            'contenido' => $request->contenido,
            'id_tripulante' => Auth::user()->id,
            'id_incidencia' => $request->id_incidencia
        ]);

        return back()->with('status', 'Nota creada');
    }

    public function destroy($id)
    {
        $nota = Notas::findOrFail($id);
        $nota->delete();
        return back()->with('status', 'Nota eliminada con éxito');
    }

    public function update(Request $request, $id){
        $nota = Notas::findOrFail($id);
        $nota->update([
            'contenido' => $request->contenido
        ]);
        return back()->with('status', 'Nota editada correctamente');
    }
}
