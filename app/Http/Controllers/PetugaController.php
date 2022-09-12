<?php

namespace App\Http\Controllers;

use App\Models\petuga;
use App\Http\Requests\StorepetugaRequest;
use App\Http\Requests\UpdatepetugaRequest;

class PetugaController extends Controller
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
     * @param  \App\Http\Requests\StorepetugaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorepetugaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\petuga  $petuga
     * @return \Illuminate\Http\Response
     */
    public function show(petuga $petuga)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\petuga  $petuga
     * @return \Illuminate\Http\Response
     */
    public function edit(petuga $petuga)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatepetugaRequest  $request
     * @param  \App\Models\petuga  $petuga
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatepetugaRequest $request, petuga $petuga)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\petuga  $petuga
     * @return \Illuminate\Http\Response
     */
    public function destroy(petuga $petuga)
    {
        //
    }
}
