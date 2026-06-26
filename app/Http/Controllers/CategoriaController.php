<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    // GET /api/categorias
    public function index()
    {
        return response()->json(Categoria::all(), 200);
    }

    // POST /api/categorias
    public function store(Request $request)
    {
        $datos = $request->validate([
            'nombre' => 'required|string|max:150',
            'slug' => 'required|string|max:150|unique:categorias,slug'
        ]);

        $categoria = Categoria::create($datos);

        return response()->json($categoria, 201);
    }

    // GET /api/categorias/{categoria}
    public function show(Categoria $categoria)
    {
        return response()->json($categoria, 200);
    }

    // PUT/PATCH /api/categorias/{categoria}
    public function update(Request $request, Categoria $categoria)
    {
        $datos = $request->validate([
            'nombre' => 'sometimes|required|string|max:150',
            'slug' => 'sometimes|required|string|max:150|unique:categorias,slug,' . $categoria->id
        ]);

        $categoria->update($datos);

        return response()->json($categoria, 200);
    }

    // DELETE /api/categorias/{categoria}
    public function destroy(Categoria $categoria)
    {
        $categoria->delete();

        return response()->json([
            'mensaje' => 'Categoría eliminada correctamente'
        ], 200);
    }
}