<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    // status 
    public function updateStatus(Request $request, Service $service)
    {
        $validated = $request->validate([
            'status' => 'required|in:active,inactive',
        ]);

        $service->status = $validated['status'];
        $service->save();

        return response()->json(['message' => 'Status updated successfully.']);
    }

    // archive service
    public function archiveService($id)
    {
        $service = Service::findOrFail($id);

        $service->delete();

        return redirect()->back()
            ->with('success', 'redirect_to_service')
            ->with('message', 'Service archived successfully.');
    }
    // restore archived data
    public function restore($id)
    {
        $service = Service::withTrashed()->findOrFail($id);
        $service->restore();

        return redirect()->back()
            ->with('success', 'redirect_to_service')
            ->with('message', 'Service restored successfully.');
    }

    // handle filtering
    public function filter(Request $request)
    {
        $status = $request->status ?? 'active'; // default to active

        if ($status === 'archived') {
            $services = Service::onlyTrashed()->get();
        } else {
            $services = Service::where('status', $status)
                ->orderByDesc('created_at')
                ->get();
        }

        return view('admin.partials.service-table', compact('services'))->render();
    }


    // Handle the storing of a new service
    public function store(Request $request)
    {
        $request->validate([
            'service_name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'price_per_kg' => 'required|numeric|min:0',
            'duration' => 'required|string|max:255',
            'image1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // store image
        $imagePath = $request->hasFile('image1')
            ? $request->file('image1')->store('services', 'public')
            : null;

        // create service
        Service::create([
            'service_name' => $request->service_name,
            'description' => $request->description,
            'price_per_kg' => $request->price_per_kg,
            'duration' => $request->duration,
            'image1' => $imagePath,
        ]);

        $services = Service::latest()->get();

        $html = view('admin.partials.service-table', compact('services'))->render();

        return response()->json([
            'message' => 'Service added successfully.',
            'html' => $html
        ]);
    }

    public function update(Request $request, $id)
    {
        $service = Service::findOrFail($id);

        // Validate and update the service
        $request->validate([
            'service_name' => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'price_per_kg' => 'required|numeric',
            'duration' => 'required|string|max:255',
            'image1' => 'nullable|image|mimes:jpg,jpeg,png,gif',
        ]);

        $service->service_name = $request->service_name;
        $service->description = $request->description;
        $service->price_per_kg = $request->price_per_kg;
        $service->duration = $request->duration;

        if ($request->hasFile('image1')) {
            if ($service->image1) {
                Storage::delete('public/' . $service->image1);
            }

            $service->image1 = $request->file('image1')->store('services', 'public');
        }

        $service->save();


        return redirect()->back()
            ->with('success', 'redirect_to_service')
            ->with('message', 'Service updated successfully.');
    }
}
