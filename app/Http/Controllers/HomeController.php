<?php

namespace App\Http\Controllers;

use App\Models\Lot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $lots = Lot::all();
        return view('home.index', compact('lots'));
    }

    public function searchLot(Request $request) {
        $validator = Validator::make($request->all(), [
            'search' => 'required|string',
        ]);


        if ($validator->fails())
        {
            return back();
        }

        $lots = Lot::where('name', 'LIKE', '%'.$request->get('search').'%')->get();

        return view('home.index', compact('lots'));
    }
}
