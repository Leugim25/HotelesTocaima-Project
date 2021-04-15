<?php

namespace App\Http\Controllers;

use App\Hotel;
use App\Perfil;
use Illuminate\Http\Request;

class PerfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Perfil $perfil)
    {
        return ;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function show(Perfil $perfil)
    {
        $this->authorize('view', $perfil);
        return view('perfiles.show', compact('perfil'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function edit(Perfil $perfil)
    {
        $this->authorize('view', $perfil);
        return view('perfiles.edit', compact('perfil'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Perfil $perfil)
    {
        $this->authorize('update', $perfil);

        $data = request()->validate([
            'name'=> 'required|min:3',
            'email' => 'required',
            'imagen' => 'required|image',
            'biografia' => 'required',
        ]);

        // Si el usuario sube una imagen
        if($request['imagen']){
            $ruta_imagen = $request['imagen']->store('upload-ImagenesPerfil', 'public');
            $array_imagen = ['imagen' => $ruta_imagen];
        }   
            // Asignar valores de la tabla user
            auth()->user()->name = $data['name'];
            auth()->user()->email = $data['email'];
            auth()->user()->save();

            // Elimina los valores ddel data
            unset($data['name']);
            unset($data['email']);

            auth()->user()->perfil()->update( array_merge(
                $data,
                $array_imagen ?? []
            ) );

            return redirect()->action('PerfilController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function destroy(Perfil $perfil)
    {
        //
    }
}
