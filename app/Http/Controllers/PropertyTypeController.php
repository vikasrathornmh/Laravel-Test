<?php

namespace App\Http\Controllers;

use App\Models\PropertyType;
use App\Http\Requests\StorePropertyTypeRequest;
use App\Http\Requests\UpdatePropertyTypeRequest;

class PropertyTypeController extends Controller
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
     * @param  \App\Http\Requests\StorePropertyTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePropertyTypeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PropertyType  $propertyType
     * @return \Illuminate\Http\Response
     */
    public function show(PropertyType $propertyType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PropertyType  $propertyType
     * @return \Illuminate\Http\Response
     */
    public function edit(PropertyType $propertyType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePropertyTypeRequest  $request
     * @param  \App\Models\PropertyType  $propertyType
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePropertyTypeRequest $request, PropertyType $propertyType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PropertyType  $propertyType
     * @return \Illuminate\Http\Response
     */
    public function destroy(PropertyType $propertyType)
    {
        //
    }
}
