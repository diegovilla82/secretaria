<?php

namespace App\Http\Controllers;

use App\Resolucion;
use Illuminate\Http\Request;

class ResolucionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('resolucion.index');
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
     * @param  \App\Resolucion  $resolucion
     * @return \Illuminate\Http\Response
     */
    public function show(Resolucion $resolucion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Resolucion  $resolucion
     * @return \Illuminate\Http\Response
     */
    public function edit(Resolucion $resolucion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Resolucion  $resolucion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Resolucion $resolucion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Resolucion  $resolucion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Resolucion $resolucion)
    {
        //
    }
}
