<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Menampilkan semua data author
     */
    public function index(): JsonResponse
    {
        $authors = Author::all();
        return response()->json($authors);
    }

    /**
     * Menyimpan data author baru
     */
    public function store(Request $request): JsonResponse
    {
        // Validasi input
        $validated = $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:authors,email',
        ]);

        // Simpan ke database
        $author = Author::create($validated);

        // Return response JSON
        return response()->json($author, 201);
    }
}
