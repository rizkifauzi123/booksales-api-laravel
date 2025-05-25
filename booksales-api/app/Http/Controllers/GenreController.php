<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    // membaca semua data 
    public function index()
    {
        return response()->json(Genre::all());
    }

    // create data 
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'=> 'required|string|max:200',
        ]);

        $genre = Genre::create($validated);
        return response()->json($genre, 201);
    }
}
