<?php

namespace App\Http\Controllers;

use App\Models\Lot;
use Illuminate\Http\Request;

class LotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\lot  $lot
     * @return \Illuminate\Http\Response
     */
    public function show(lot $lot, $id)
    {
        $lot = $lot->find($id);

        return view('lots.index', compact('lot'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\lot  $lot
     * @return \Illuminate\Http\Response
     */
    public function edit(lot $lot)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\lot  $lot
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, lot $lot)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\lot  $lot
     * @return \Illuminate\Http\Response
     */
    public function destroy(lot $lot)
    {
        //
    }
}
