<?php

namespace App\Http\Controllers;

use App\Models\Taller;
use Illuminate\Http\Request;

class TallerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $talleres = Taller::get();

        return $this->showAll($talleres);
    }

    public function talleresDestacados() {
        $talleresDestacados = Taller::where('destacado', Taller::DESTACADO);

        return $this->showAll($talleresDestacados);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $campos = $request->all();

        $taller = Taller::create($campos);

        return $this->showOne($taller, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Taller  $taller
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $taller = Taller::findOrFail($id);

        return $taller;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Taller  $taller
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Taller $taller)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Taller  $taller
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $taller = Taller::findOrFail($id);

        $taller->delete();

        return $this->showOne($taller);
    }
}
