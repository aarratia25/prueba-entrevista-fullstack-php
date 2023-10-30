<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'dni' => 'required|string|max:45|unique:customers',
            'id_reg' => 'required|integer',
            'id_com' => 'required|integer',
            'email' => 'required|email|max:120|unique:customers',
            'name' => 'required|string|max:45',
            'last_name' => 'required|string|max:45',
            'address' => 'nullable|string|max:255',
            'date_reg' => 'required|date_format:Y-m-d H:i:s',
            'status' => 'required|in:A,I'
        ]);

        $customer = Customer::create($request->all());

        if ($customer) {
            return response()->json(['success' => true, 'data' => $customer], 201);
        } else {
            return response()->json(['success' => false, 'message' => 'Failed to register the customer.'], 500);
        }
    }

    public function show($dni_or_email)
    {
        $customer = Customer::where('dni', $dni_or_email)
            ->orWhere('email', $dni_or_email)
            ->where('status', 'A')
            ->first();

        if ($customer) {
            return response()->json(['success' => true, 'data' => $customer]);
        } else {
            return response()->json(['success' => false, 'message' => 'Customer not found.'], 404);
        }
    }

    public function destroy($id)
    {
        $customer = Customer::find($id);

        if (!$customer) {
            return response()->json(['message' => 'Customer not found'], 404);
        }

        if ($customer->status === 'trash') {
            return response()->json(['message' => 'Record does not exist'], 400);
        }

        $customer->status = 'trash';
        $customer->save();

        if ($customer) {
            $customer->delete();
            return response()->json(['success' => true, 'message' => 'Customer deleted successfully.']);
        } else {
            return response()->json(['success' => false, 'message' => 'Customer not found or already deleted.'], 404);
        }
    }
}
