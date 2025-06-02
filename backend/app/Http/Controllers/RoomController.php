<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::all();
        return response()->json($rooms);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'roomName' => 'required|string|max:255',
            'capacity' => 'required|integer',
            'price' => 'required|numeric',
            'status' => 'required|string|in:Available,Occupied,Maintenance',
        ]);

        $room = Room::create($validatedData);
        return response()->json($room, 201);
    }

    public function show($id)
    {
        $room = Room::findOrFail($id);
        return response()->json($room);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'roomName' => 'required|string|max:255',
            'capacity' => 'required|integer',
            'price' => 'required|numeric',
            'status' => 'required|string|in:Available,Occupied,Maintenance',
        ]);

        $room = Room::findOrFail($id);
        $room->update($validatedData);
        return response()->json($room);
    }

    public function destroy($id)
    {
        $room = Room::findOrFail($id);
        $room->delete();
        return response()->json(null, 204);
    }
}
