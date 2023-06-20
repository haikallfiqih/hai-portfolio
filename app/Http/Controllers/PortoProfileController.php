<?php

namespace App\Http\Controllers;

use App\Models\PortoProfile;
use App\Http\Requests\StorePortoProfileRequest;
use App\Http\Requests\UpdatePortoProfileRequest;

class PortoProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profiles = PortoProfile::all();
        // return $profiles;
        return view('home.index', compact('profiles'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePortoProfileRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(PortoProfile $portoProfile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PortoProfile $portoProfile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePortoProfileRequest $request, PortoProfile $portoProfile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PortoProfile $portoProfile)
    {
        //
    }
}