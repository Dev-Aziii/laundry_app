<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'service_name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'price_per_kg' => 'required|numeric|min:0',
            'duration' => 'required|string|max:255',
            'image1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image1')) {
            $imagePath = $request->file('image1')->store('services', 'public');
        } else {
            $imagePath = null;
        }

        $service = Service::create([
            'service_name' => $request->service_name,
            'description' => $request->description,
            'price_per_kg' => $request->price_per_kg,
            'duration' => $request->duration,
            'image1' => $imagePath,
        ]);

        return response()->json(['message' => 'Service added successfully.']);
    }
}
