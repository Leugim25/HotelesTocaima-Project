<?php

namespace App\Http\Controllers;

use App\Habitacion;
use Illuminate\Http\Request;
use App\DisponibilidadHabitacion;
use App\Hotel;
use Illuminate\Routing\Controller;

class HabitacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Hotel $hotel)
    {
        //dd($hotel);
        //$habitaciones = auth()->user()->habitaciones;
        if($hotel->habitaciones->count() > 0) {
            
            $habitaciones = Habitacion::where('hotel_id', $hotel->id)->get();
            return view('habitaciones.index', compact('habitaciones', 'hotel'));

        }else{
            $disponible = DisponibilidadHabitacion::all(['id', 'estado']);
            return view('habitaciones.create', compact('disponible', 'hotel'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Hotel $hotel)
    {
        $disponible = DisponibilidadHabitacion::all(['id', 'estado']);
        return view('habitaciones.create', compact('disponible', 'hotel'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return response()->json($request);
        $request->validate([
            'n_habitacion'=> 'required|min:1',
            'camas' => 'required',
            'mobiliario' => 'required',
            'servicios' => 'required',
            'precio' => 'required',
            'disponibilidad' => 'required',
        ]);
        
        $variable = new Habitacion();

        $variable->n_habitacion = $request->n_habitacion;
        $variable->camas = $request->camas;
        $variable->mobiliario = $request->mobiliario;
        $variable->servicios = $request->servicios;
        $variable->precio = $request->precio;
        $variable->disponibilidad_id = $request->disponibilidad;
        $variable->user_id = auth()->user()->id;
        $variable->hotel_id = $request->hotel_id;
        $variable->save();

        //redireccionar al action
        return redirect()->route('habitaciones.index', $request->hotel_id);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Habitacion  $habitacion
     * @return \Illuminate\Http\Response
     */
    public function show(Habitacion $habitacion)
    {
        return view("habitaciones.index", compact("habitacion"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Habitacion  $habitacion
     * @return \Illuminate\Http\Response
     */
    public function edit(Hotel $hotel)
    {
        $disponible = DisponibilidadHabitacion::all(['id', 'estado']);
        $habitacion = Habitacion::all();
    
        return view('habitaciones.edit', compact('disponible', 'hotel', 'habitacion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Habitacion  $habitacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hotel $hotel)
    {
        $request->validate([
            'n_habitacion'=> 'required|min:1',
            'camas' => 'required',
            'mobiliario' => 'required',
            'servicios' => 'required',
            'precio' => 'required|min:6',
            'disponibilidad' => 'required',
        ]);

        $habitacion = Habitacion::find($hotel->id);
        return $habitacion;
        $habitacion->save();
        //redireccionar al action
        return redirect()->route('habitaciones.index', $request->hotel_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Habitacion  $habitacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hotel $hotel, Request $request)
    {
            Habitacion::find($hotel)->delete();
            return redirect()->route('habitaciones.index', $request->hotel_id);
    }
}
