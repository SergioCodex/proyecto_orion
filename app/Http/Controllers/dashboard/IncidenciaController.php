<?php

namespace App\Http\Controllers\dashboard;

use App\Notas;
use App\Sector;
use App\Incidencia;
use App\Tripulante;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use App\Http\Requests\StoreIncidenciaPost;
use App\Http\Requests\UpdateIncidenciaPut;

class IncidenciaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $incidencias = Incidencia::with(['tripulante', 'sector', 'agente'])->orderBy('created_at', 'DESC')->paginate(15);
        $n_incidencias = Incidencia::get()->count();
        $n_respondidos = Incidencia::where('status', 'Abierto')->count();
        $n_resueltos = Incidencia::where('status', 'Resuelto')->count();
        $n_pendientes = Incidencia::where('status', 'En progreso')->count();
        
        return view('dashboard.incidencia.index', compact(['incidencias', 'n_incidencias', 'n_respondidos', 'n_resueltos', 'n_pendientes']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sectores = Sector::get();

        return view('dashboard.incidencia.create', compact('sectores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreIncidenciaPost $request)
    {

        Incidencia::create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'id_comunicador' => Auth::user()->id,
            'id_sector_origen' => $request->id_sector_origen,
        ]);

        return redirect('dashboard/incidencia')->with('status', '¡Ticket generado!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $incidencia = Incidencia::findOrFail($id);
        $sectores = Sector::get();
        $agentes = Tripulante::where('id_rol', '>', 1)->get();
        //dd($incidencia->id_sector_origen);

        return view('dashboard.incidencia.edit', compact('incidencia', 'sectores', 'agentes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateIncidenciaPut $request, $id)
    {
        $incidencia = Incidencia::findOrFail($id);
        $incidencia->update($request->validated());

        return redirect('dashboard/incidencia')->with('status', '¡Ticket ' . $incidencia->id . ' actualizado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $incidencia = Incidencia::findOrFail($id);
        $incidencia->delete();
        return back()->with('status', '¡Ticket eliminado correctamente!');
    }

    public function resolve(Incidencia $incidencia){

        $incidencia->with(['notas', 'mensajes_incidencias']);
        return view('dashboard.incidencia.resolve', compact('incidencia'));
    }

    public function update_status(Request $request, Incidencia $incidencia){

        $incidencia->update(["status" => $request->status]);
        return back()->with('status', 'Estado actualizado correctamente');

    }

}
