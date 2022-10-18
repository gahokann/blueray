<?php

namespace App\Http\Controllers;

use App\Models\Lot;
use Illuminate\Http\Request;

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
}
