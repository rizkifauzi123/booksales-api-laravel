<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class GenreController extends Controller
{
    // Menampilkan semua data genre
    public function index(): JsonResponse
    {
        return response()->json(Genre::all());
    }

    // Menyimpan genre baru
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:200',
        ]);

        $genre = Genre::create($validated);

        return response()->json($genre, 201);
    }

    // Menampilkan genre berdasarkan ID
    public function show($id): JsonResponse
    {
        $genre = Genre::find($id);
        if (!$genre) {
            return response()->json(['message' => 'Genre not found'], 404);
        }

        return response()->json($genre);
    }

    // Mengupdate genre berdasarkan ID
    public function update(Request $request, $id): JsonResponse
    {
        $genre = Genre::find($id);
        if (!$genre) {
            return response()->json(['message' => 'Genre not found'], 404);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:200',
        ]);

        $genre->update($validated);
        return response()->json($genre);
    }

    // Menghapus genre berdasarkan ID
    public function destroy($id): JsonResponse
    {
        $genre = Genre::find($id);
        if (!$genre) {
            return response()->json(['message' => 'Genre not found'], 404);
        }

        $genre->delete();
        return response()->json(['message' => 'Genre deleted']);
    }
}
