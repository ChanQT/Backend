<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PaymentHistory;

class PaymentHistoryController extends Controller
{
    public function index()
    {
        return PaymentHistory::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tenant_name' => 'required|string',
            'room' => 'required|string',
            'payment_amount' => 'required|numeric',
            'payment_date' => 'required|date',
            'status' => 'required|string'
        ]);

        return PaymentHistory::create($validated);
    }

    public function show($id)
    {
        return PaymentHistory::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $payment = PaymentHistory::findOrFail($id);
        $payment->update($request->all());
        return $payment;
    }

    public function destroy($id)
    {
        $payment = PaymentHistory::findOrFail($id);
        $payment->delete();
        return response()->json(['message' => 'Payment history deleted successfully']);
    }
}