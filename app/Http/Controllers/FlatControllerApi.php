<?php

namespace App\Http\Controllers;

use App\Models\Flat;
use Illuminate\Http\Request;

class FlatControllerApi extends Controller
{
    public function index(Request $request)
    {
        $page = $request->query('page', 0);
        $perpage = $request->query('perpage', 5);

        $flats = Flat::with('house')
            ->skip($page * $perpage)
            ->take($perpage)
            ->get();

        return response()->json($flats);
    }

    public function total()
    {
        return response()->json(['total' => Flat::count()]);
    }

    public function show(string $id)
    {
        return response(Flat::with('house')->find($id));
    }
}