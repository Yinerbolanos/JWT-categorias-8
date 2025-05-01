<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class ApiCategoriaController extends Controller
{
    // GET /api/categorias
    public function index()
    {
        $categorias = Categoria::all();
        return response()->json($categorias);
    }

    // POST /api/categorias
    public function store(Request $request)
    {
        $categoria = Categoria::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
        ]);

        return response()->json($categoria, 201);
    }

    // GET /api/categorias/{id}
    public function show($id)
    {
        $categoria = Categoria::find($id);
        if (!$categoria) {
            return response()->json(['message' => 'Categoría no encontrada'], 404);
        }
        return response()->json($categoria);
    }

    // PUT /api/categorias/{id}
    public function update(Request $request, $id)
    {
        $categoria = Categoria::find($id);
        if (!$categoria) {
            return response()->json(['message' => 'Categoría no encontrada'], 404);
        }

        $categoria->update([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
        ]);

        return response()->json(['message' => 'Categoría actualizada', 'data' => $categoria], 200);
    }

    // DELETE /api/categorias/{id}
    public function destroy($id)
    {
        $categoria = Categoria::find($id);
        if (!$categoria) {
            return response()->json(['message' => 'Categoría no encontrada'], 404);
        }

        $categoria->delete();
        return response()->json(['message' => 'Categoría eliminada'], 200);
    }
}