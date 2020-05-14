<?php

namespace App\Http\Controllers\dashboard;

use App\ConsumosObjetivo;
use App\Http\Controllers\Controller;
use App\Objetivo;
use App\Recurso;
use App\RequisitosObjetivo;
use Illuminate\Http\Request;

class ObjetivoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $objetivos = Objetivo::with(['sector'])->orderBy('created_at', 'DESC')->paginate(15);
        return view('dashboard.objetivo.index', compact('objetivos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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

    public function update_consumo(Request $request, Objetivo $objetivo){

        ConsumosObjetivo::where('id_objetivo', $objetivo->id)->update([
            'oxigeno' => $request->oxigeno,
            'energia' => $request->energia,
            'combustible' => $request->combustible,
            'agua' => $request->agua,
            'alimento' => $request->alimento,
        ]);

        $recursos_disp = Recurso::first();
        $consumos =  ConsumosObjetivo::get();

        $array_recursos = ['oxigeno', 'energia', 'combustible', 'agua', 'alimento'];

        foreach ($array_recursos as $recurso) {
            $array_totales[$recurso] = $consumos->sum($recurso);
        }

        foreach ($array_totales as $recurso => $valor) {
            if($valor >= $recursos_disp->$recurso){
                //notificaciones
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $objetivo = Objetivo::findOrFail($id);
        $objetivo->delete();
        return back()->with('status', '¡Ticket eliminado correctamente!');
    }

    public function gestion(Objetivo $objetivo)
    {
        $recursos = Recurso::first();
        $requisitos = RequisitosObjetivo::where('id_objetivo', $objetivo->id)->first();
        //dd($requisitos);
        return view('dashboard.objetivo.gestion', compact('objetivo', 'recursos', 'requisitos'));
    }
}
