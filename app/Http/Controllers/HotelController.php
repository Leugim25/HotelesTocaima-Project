<?php

namespace App\Http\Controllers;

use App\Hotel;
use App\CategoriaHotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class HotelController extends Controller
{

    public function __construct() {
        $this->middleware('auth', ['except' => 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hoteles = auth()->user()->hoteles;
        return view('hoteles.index')->with('hoteles', $hoteles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        //obtener las categorias
        $categorias = CategoriaHotel::all(['id', 'nombre', 'descripcion']);
        return view('hoteles.create')->with('categorias', $categorias);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = request()->validate([
            'titulo'=> 'required|min:10',
            'nit' => 'required',
            'direccion' => 'required',
            'categoria' => 'required',
            'celular' => 'required',
            'descripcion' => 'required',
            'imagen' => 'required|image',
        ]);

        // obtener la ruta de la imagen
        $ruta_imagen = $request['imagen']->store('upload-imagenesHoteles', 'public');
    
        // almacenar en la BD
        auth()->user()->hoteles()->create([
            'titulo' => $data['titulo'],
            'nit' => $data['nit'],
            'direccion' => $data['direccion'],
            'celular' => $data['celular'],
            'descripcion' => $data['descripcion'],
            'imagen' => $ruta_imagen,
            'categoria_id' => $data['categoria']
        ]);
        
        //redireccionar al action
        return redirect()->action('HotelController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function show(Hotel $hotel)
    {
        return view("hoteles.introduce", compact("hotel"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function edit(Hotel $hotel)
    {
        // Revisar el policy
        $this->authorize('view', $hotel);

        $categorias = CategoriaHotel::all(['id', 'nombre', 'descripcion']);
        return view("hoteles.edit", compact('categorias', 'hotel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hotel $hotel)
    {
        // Revisar el policy
        $this->authorize('update', $hotel);

        // validación
        $data = request()->validate([
            'titulo'=> 'required|min:10',
            'nit' => 'required',
            'direccion' => 'required',
            'categoria' => 'required',
            'celular' => 'required',
            'descripcion' => 'required',
        ]);

        // Asignar los valores
        $hotel->titulo = $data['titulo'];
        $hotel->nit = $data['nit'];
        $hotel->direccion = $data['direccion'];
        $hotel->categoria_id = $data['categoria'];
        $hotel->celular = $data['celular'];
        $hotel->descripcion = $data['descripcion'];
            
        if(request('imagen')) {
            // obtener la ruta de la imagen
            $ruta_imagen = $request['imagen']->store('upload-imagenesHoteles', 'public');
            
            // Asignar al objeto
            $hotel->imagen = $ruta_imagen;
        }
        $hotel->save();

        // redireccionar
        return redirect()->action('HotelController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hotel $hotel)
    {
        // Ejecutar el Policy
        $this->authorize('delete', $hotel);

        // Eliminar el hotel
        $hotel->delete();

        return redirect()->action('HotelController@index');
    }
}
