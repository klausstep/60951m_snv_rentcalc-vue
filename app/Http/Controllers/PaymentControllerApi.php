<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentControllerApi extends Controller
{
    public function index(Request $request)
    {
        $page = $request->query('page', 0);
        $perpage = $request->query('perpage', 5);

        $payments = Payment::with(['flat.house', 'period'])
            ->orderBy('created_at', 'desc')
            ->skip($page * $perpage)
            ->take($perpage)
            ->get();

        return response()->json($payments);
    }

    public function total()
    {
        return response()->json(['total' => Payment::count()]);
    }

    public function show(string $id)
    {
        return response(Payment::with(['flat.house', 'period'])->find($id));
    }
}