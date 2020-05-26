<?php

namespace App\Http\Controllers\userDashboard;

use App\Horario;
use App\Tripulante;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UpdateTripulantePut;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rango_tiempo = [];
        $hora_comienzo = 8;
        $dias = ['lunes', 'martes', 'miercoles', 'jueves', 'viernes', 'sabado', 'domingo'];
        $calendario_ordenado = [];

        for ($i = 0; $i < 12; $i++) {
            $rango_tiempo[] = ["empieza" => "$hora_comienzo:00", "fin" => ++$hora_comienzo . ":00"];
        }

        $calendario = Horario::where('id_sector', Auth::user()->id_sector)->get();
        foreach ($calendario as $parcial) {
            $calendario_ordenado[$parcial->hora_inicio . ' - ' . $parcial->hora_fin][] = ["tarea" => $parcial->tarea, "inicio" => $parcial->hora_inicio, "fin" => $parcial->hora_fin];
        }

        return view('dashboard.user.index', compact('rango_tiempo', 'calendario_ordenado', 'dias'));
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
        $tripulante = Tripulante::findOrFail($id);

        return view('dashboard.user.edit', compact('tripulante'));
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
        $tripulante = Tripulante::findOrFail($id);

        if ($request->current_password != "" || $request->new_password != "" || $request->new_confirm_password != "" ) {
            $request->validate([
                'name' => 'required',
                'apellidos' => 'required',
                'email' => 'required|unique:tripulantes,email,' . Auth::user()->id,
                'current_password' => ['required', new MatchOldPassword],
                'new_password' => ['required'],
                'new_confirm_password' => ['same:new_password'],
            ]);

            $tripulante->update([
                'name' => $request->name,
                'apellidos' => $request->apellidos,
                'email' => $request->email,
                'password' => $request->new_password
            ]);

        } else {
            $request->validate([
                'name' => 'required',
                'apellidos' => 'required',
                'email' => 'required|unique:tripulantes,email,' . Auth::user()->id,
            ]);

            $tripulante->update([
                'name' => $request->name,
                'apellidos' => $request->apellidos,
                'email' => $request->email
            ]);
        }

        return redirect('dashboard/user')->with('status', '¡Tu perfil ha sido actualizado correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
