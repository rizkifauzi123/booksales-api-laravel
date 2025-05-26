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
        $authors = Author::create($validated);

        // Return response JSON
        return response()->json($authors, 201);
         }

        //Menampilkan data berdasarkan id 
        public function show($id): JsonResponse
        {
            $authors = Author::find($id);
            if (!$authors) {
                return response()->json(['message' => 'Author not found'], 404);
            }
            return response()->json($authors);
        }

        //Mengupdate data
        public function update(Request $request, $id): JsonResponse
        {
            $authors = Author::find($id);
            if (!$authors) {
                return response()->json(['message' => 'Author not Found'],404);
            }
            
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:authors,email,' .$id,
            ]);

            $authors->update($validated);
            return response()->json($authors);

        }

        //Menghapus data 

        public function destroy($id): JsonResponse
        {
            $authors = Author::find($id);
            if (!$authors) {
                return response()->json(['message' => 'Author not Found'], 404);
            }

            $authors->delete();
            return response()->json(['message' => 'Author deleted']);
        }
   
}
