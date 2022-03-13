<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use App\Models\LibroGenero;
use Illuminate\Http\Request;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $libros = Libro::with('autor', 'genero')->get();

        return $this->showAll($libros);
    }

    public function libroSemanal() {
        $libroSemanal = Libro::where('semanal', Libro::SEMANAL)->with('autor', 'genero');

        return $this->showAll($libroSemanal);
    }

    public function librosDestacados() {
        $librosDestacados = Libro::where('destacado', Libro::DESTACADO)->with('autor', 'genero');

        return $this->showAll($librosDestacados);
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

        $libro = Libro::create($campos);

        $camposGenero = [
            "libro_id" => $libro->id,
            "genero_id" => $campos["genero_id"]
        ];

        LibroGenero::create($camposGenero);

        return $this->showOne($libro, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $libro = Libro::findOrFail($id)->autor;

        return $libro;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $libro = Libro::findOrFail($id);

        $reglas = [
            'isbn'      => 'required|min:6',
            'titulo'    => 'required|min:3',
            'autor_id'  => 'required|exists:autores,id',
            'editorial' => 'required|min:3',
            'genero_id' => 'required|exists:generos,id',
            'paginas'   => 'required|min:1',
            'anio'      => 'required|min:4',
            'destacado' => 'in:' . Libro::DESTACADO . ',' . Libro::NO_DESTACADO,
            'semanal'   => 'in:' . Libro::SEMANAL . ',' . Libro::NO_SEMANAL,
        ];

        $this->validate($request, $reglas);

        if($request->has('isbn')){
            $libro->isbn = $request->isbn;
        }
        if($request->has('titulo')){
            $libro->titulo = $request->titulo;
        }
        if($request->has('autor_id')){
            $libro->autor_id = $request->autor_id;
        }
        if($request->has('editorial')){
            $libro->editorial = $request->editorial;
        }
        if($request->has('genero_id')){
            $libro->genero_id = $request->genero_id;
        }
        if($request->has('paginas')){
            $libro->paginas = $request->paginas;
        }
        if($request->has('anio')){
            $libro->anio = $request->anio;
        }
        if($request->has('destacado')){
            $libro->destacado = $request->destacado;
        }
        if($request->has('semanal')){
            $libro->semanal = $request->semanal;
        }

        if(!$libro->isDirty()){
            return $this->errorResponse('Se debe especificar al menos un valor diferente para actualizar.', 422);
        }

        $libro->save();

        return $this->showOne($libro);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $libro = Libro::findOrFail($id);

        $libro->delete();

        return $this->showOne($libro);
    }
}
