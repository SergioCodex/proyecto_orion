<?php

namespace App\Http\Controllers\dashboard;

use App\Alerta;
use App\Sector;
use App\Recurso;
use App\Objetivo;
use App\Tripulante;
use App\ConsumosObjetivo;
use App\RequisitosObjetivo;
use Illuminate\Http\Request;
use App\Notifications\Alarma;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreObjetivoPost;

class ObjetivoController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alertas = Alerta::select('id_objetivo')->get();
        $array_alertas = [];

        foreach ($alertas as $alerta) {
            $array_alertas[] = $alerta->id_objetivo;
        }

        $objetivos = Objetivo::with(['sector'])->orderBy('created_at', 'DESC')->paginate(15);
        return view('dashboard.objetivo.index', compact('objetivos', 'array_alertas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sectores = Sector::get();
        $recursos = Recurso::first();
        return view('dashboard.objetivo.create', compact('recursos', 'sectores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreObjetivoPost $request)
    {
        $requisitos = RequisitosObjetivo::create([
            'oxigeno' => $request->oxigeno,
            'agua' => $request->agua,
            'alimento' => $request->alimento,
            'combustible' => $request->combustible,
            'energia' => $request->energia
        ]);

        $new_objetivo = Objetivo::create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'id_sector' => $request->id_sector,
            'id_requisitos' => $requisitos->id
        ]);

        $consumo = ConsumosObjetivo::create([
            'id_objetivo' => $new_objetivo->id
        ]);

        $requisitos->update(['id_objetivo' => $new_objetivo->id]);

        $new_objetivo->update(['id_consumo' => $consumo->id]);


        return redirect('dashboard/objetivo')->with('status', '¡Objetivo registrado!');
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

    public function update_consumo(Request $request, Objetivo $objetivo)
    {

        ConsumosObjetivo::where('id_objetivo', $objetivo->id)->update([
            'oxigeno' => $request->oxigeno,
            'energia' => $request->energia,
            'combustible' => $request->combustible,
            'agua' => $request->agua,
            'alimento' => $request->alimento,
        ]);

        $recursos_disp = Recurso::first();
        $consumos =  ConsumosObjetivo::join('objetivos', 'consumos_objetivos.id_objetivo', '=', 'objetivos.id')->where('objetivos.completado', '0')->get();

        $array_recursos = ['oxigeno', 'energia', 'combustible', 'agua', 'alimento'];

        foreach ($array_recursos as $recurso) {
            $array_totales[$recurso] = $consumos->sum($recurso);
        }

        //CREAR UNA NOTIFICACION POR OBJETIVO Y RECURSO

        foreach ($array_totales as $recurso => $valor) {
            $alerta = Alerta::where('id_objetivo', $objetivo->id)->where('recurso', $recurso)->first();
            if ($valor >= $recursos_disp->$recurso) {
                $alarma = new Alarma($objetivo->id, $recurso);
                Tripulante::find(Auth::user()->id)->notify($alarma);

                if ($alerta == null) {
                    Alerta::create([
                        'id_sector' => $objetivo->id_sector,
                        'recurso' => $recurso,
                        'id_objetivo' => $objetivo->id,
                        'mensaje' => 'La falta de ' . $recurso . ' supone un gran riesgo para la tripulación.'
                    ]);
                }
            } else {
                $alertas = Alerta::where('recurso', $recurso)->get();
                if ($alertas != null) {
                    foreach ($alertas as $alerta) {
                        $alerta->delete();
                    }
                    
                }
            }
        }

        return back();
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
        $alertas = Alerta::where('id_objetivo', $objetivo->id)->get();
        //dd($requisitos);
        return view('dashboard.objetivo.gestion', compact('objetivo', 'recursos', 'requisitos', 'alertas'));
    }

    public function completado(Objetivo $objetivo){

        //dd($objetivo);
        
        $objetivo->update(['completado' => 1]);

        return back()->with('status', '¡Enhorabuena, objetivo completado!');

    }
}
