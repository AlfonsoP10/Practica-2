<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index(Request $request)
    {
        if (!$request->user()->tokenCan('ver')) {
            return response()->json(['mensaje' => 'No autorizado'], 403);
        }

        return Producto::all();
    }

    public function store(Request $request)
    {
        if (!$request->user()->tokenCan('crear')) {
            return response()->json(['mensaje' => 'No autorizado'], 403);
        }

        $producto = Producto::create($request->all());
        return response()->json($producto, 201);
    }

    public function show(Request $request, $id)
    {
        if (!$request->user()->tokenCan('ver')) {
            return response()->json(['mensaje' => 'No autorizado'], 403);
        }

        return Producto::find($id);
    }

    public function update(Request $request, $id)
    {
        if (!$request->user()->tokenCan('editar')) {
            return response()->json(['mensaje' => 'No autorizado'], 403);
        }

        $producto = Producto::find($id);
        $producto->update($request->all());

        return response()->json($producto);
    }

    public function destroy(Request $request, $id)
    {
        if (!$request->user()->tokenCan('eliminar')) {
            return response()->json(['mensaje' => 'No autorizado'], 403);
        }

        Producto::destroy($id);

        return response()->json(['mensaje' => 'Eliminado']);
    }
}