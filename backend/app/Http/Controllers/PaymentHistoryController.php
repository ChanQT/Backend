<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PaymentHistory;
use Illuminate\Http\Request;

class PaymentHistoryController extends Controller
{
    public function index()
    {
        return response()->json(PaymentHistory::latest()->get());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'tenant_name' => 'required|string',
            'room' => 'required|string',
            'payment_amount' => 'required|numeric',
            'payment_date' => 'required|date',
            'status' => 'required|in:pending,paid',
        ]);

        $history = PaymentHistory::create($data);

        return response()->json($history, 201);
    }

    public function show($id)
    {
        return PaymentHistory::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $history = PaymentHistory::findOrFail($id);

        $data = $request->validate([
            'tenant_name' => 'sometimes|string',
            'room' => 'sometimes|string',
            'payment_amount' => 'sometimes|numeric',
            'payment_date' => 'sometimes|date',
            'status' => 'sometimes|in:pending,paid',
        ]);

        $history->update($data);

        return response()->json($history);
    }

    public function destroy($id)
    {
        PaymentHistory::destroy($id);
        return response()->json(['message' => 'Deleted successfully.']);
    }
}
