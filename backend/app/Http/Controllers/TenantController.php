<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use Illuminate\Http\Request;

class TenantController extends Controller
{
    public function index()
    {
        return Tenant::all();
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tenantName' => 'required|string|max:255',
            'roomNo' => 'required|string|max:255',
            'phoneNumber' => 'required|string|max:255',
            'guardianName' => 'required|string|max:255',
            'startDate' => 'required|date', // Add this line
        ]);

        $tenant = Tenant::create($validatedData);

        return response()->json($tenant, 201);
    }

    public function show($id)
    {
        return Tenant::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'tenantName' => 'required|string|max:255',
            'roomNo' => 'required|string|max:255',
            'phoneNumber' => 'required|string|max:255',
            'guardianName' => 'required|string|max:255',
            'startDate' => 'required|date', // Add this line
        ]);

        $tenant = Tenant::findOrFail($id);
        $tenant->update($validatedData);

        return response()->json($tenant, 200);
    }

    public function destroy($id)
    {
        $tenant = Tenant::findOrFail($id);
        $tenant->delete();

        return response()->json(null, 204);
    }
}
