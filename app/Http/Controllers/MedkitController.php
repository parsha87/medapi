<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medikitdata;

class MedkitController extends Controller
{
    public function index()
    {
        $medikits = Medikitdata::all();
        
        return response()->json($medikits);
    }

    public function store(Request $request)
    {
        $request->validate([
            'medikit_name' => 'required|string|max:255',
            'medikit_description' => 'required|string',
            // Add validation rules for other fields here
        ]);

        $medikit = Medikitdata::create($request->all());

        return response()->json($medikit, 201);
    }

    public function show($id)
    {
        $medikit = Medikitdata::find($id);
        
        if (!$medikit) {
            return response()->json(['message' => 'Medikit not found'], 404);
        }
        
        return response()->json($medikit);
    }
}
