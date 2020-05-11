<?php

namespace App\Http\Controllers\dashboard;

use App\Charts\TripulantesChart;
use App\Rol;
use App\Sector;
use App\Tripulante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTripulantePost;
use App\Http\Requests\UpdateTripulantePut;

class TripulanteController extends Controller
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

        $chart = new TripulantesChart;
        $chart->labels(['One', 'Two', 'Three']);
        $chart->dataset('Número', 'line', [1, 2, 1])->color('rbga(203,100,84,1)')->backgroundColor('rgba(152,255,242,0.6)');

        $tripulantes = Tripulante::with('rol')->paginate(10);
        $n_tripulantes = Tripulante::get()->count();
        $n_operarios = Tripulante::where('id_rol', 1)->count();
        $n_superiores = Tripulante::where('id_rol', 2)->count();
        
        $capitan = Tripulante::where('id_rol', 3)->first();

        $roles = Rol::get();
        $sectores = Sector::get();

        return view('dashboard.tripulante.index', compact('tripulantes', 'n_tripulantes', 'n_operarios', 'n_superiores', 'capitan', 'roles', 'sectores', 'chart'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $tripulante = new Tripulante();

        return view('dashboard.tripulante.create', compact('tripulante', 'roles', 'sectores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTripulantePost $request)
    {
        Tripulante::create([
            'name' => $request->name,
            'apellidos' => $request->apellidos,
            'id_rol' => $request->id_rol,
            'id_sector' => $request->id_sector,
            'email' => $request->email,
            'password' => $request->password
        ]);

        return back()->with('status', 'Tripulando registrado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Tripulante $tripulante)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tripulante $tripulante)
    {
        $roles = Rol::pluck('id', 'nombre');
        $sectores = Sector::pluck('id', 'nombre');
        return view('dashboard.tripulante.edit', ['tripulante' => $tripulante, 'roles' => $roles, 'sectores' => $sectores]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTripulantePut $request, Tripulante $tripulante)
    {

        $tripulante->update($request->validated());

        return redirect('dashboard/tripulante')->with('status', 'Usuario actualizado correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tripulante $tripulante)
    {
        $tripulante->delete();
        return back()->with('status', '¡Tripulante eliminado correctamente!');
    }
}
