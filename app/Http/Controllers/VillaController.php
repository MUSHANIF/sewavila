<?php

namespace App\Http\Controllers;

use App\Models\villa;
use App\Http\Requests\StorevillaRequest;
use App\Http\Requests\UpdatevillaRequest;

class VillaController extends Controller
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
     * @param  \App\Http\Requests\StorevillaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorevillaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\villa  $villa
     * @return \Illuminate\Http\Response
     */
    public function show(villa $villa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\villa  $villa
     * @return \Illuminate\Http\Response
     */
    public function edit(villa $villa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatevillaRequest  $request
     * @param  \App\Models\villa  $villa
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatevillaRequest $request, villa $villa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\villa  $villa
     * @return \Illuminate\Http\Response
     */
    public function destroy(villa $villa)
    {
        //
    }
}
