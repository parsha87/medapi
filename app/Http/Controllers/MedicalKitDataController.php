<?php

namespace App\Http\Controllers;

use App\Models\StoredMedicalKitData;
use Illuminate\Http\Request;

class MedicalKitDataController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'phone_number' => 'required|numeric|digits:10',
            'medikit_name' => 'required|string|max:255',
        ]);

        $data = new StoredMedicalKitData();
        $data->phone_number = $request->input('phone_number');
        $data->medikit_name = $request->input('medikit_name');
        $data->save();

        return response()->json(['message' => 'Data saved successfully'], 201);
    }

    public function index()
    {
        $data = StoredMedicalKitData::all();
        return response()->json($data);
    }
}
