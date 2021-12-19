<?php

namespace App\Http\Controllers;

use App\Models\socialmedia;
use Illuminate\Http\Request;

class SocialmediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('SocialMedia.empty');
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
     * @param  \App\Models\socialmedia  $socialmedia
     * @return \Illuminate\Http\Response
     */
    public function show(socialmedia $socialmedia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\socialmedia  $socialmedia
     * @return \Illuminate\Http\Response
     */
    public function edit(socialmedia $socialmedia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\socialmedia  $socialmedia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, socialmedia $socialmedia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\socialmedia  $socialmedia
     * @return \Illuminate\Http\Response
     */
    public function destroy(socialmedia $socialmedia)
    {
        //
    }
}
