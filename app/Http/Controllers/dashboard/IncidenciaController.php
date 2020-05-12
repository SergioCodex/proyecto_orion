<?php

namespace App\Http\Controllers\dashboard;

use App\Notas;
use App\Sector;
use App\Incidencia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use App\Http\Requests\StoreIncidenciaPost;

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
        $incidencias = Incidencia::orderBy('created_at', 'DESC')->paginate(15);
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
            'id_sector_origen' => $request->id_sector,
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
        return "edit";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tripulante = Incidencia::findOrFail($id);
        $tripulante->delete();
        return back()->with('status', '¡Ticket eliminado correctamente!');
    }

    public function resolve(Incidencia $incidencia){

        return view('dashboard.incidencia.resolve', compact('incidencia'));
    }

}
