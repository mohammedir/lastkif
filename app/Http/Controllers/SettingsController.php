<?php

namespace App\Http\Controllers;

use App\Models\settings;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $info = settings::all()->first();
        return view('settings.settings',compact('info'));
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
     * @param  \App\Models\settings  $settings
     * @return \Illuminate\Http\Response
     */
    public function show(settings $settings)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\settings  $settings
     * @return \Illuminate\Http\Response
     */
    public function edit(settings $settings)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\settings  $settings
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //

        $se = settings::query()->find($request->id);
        $se->Facebook_Link = $request->Facebook;
        $se->Instagram_Link = $request->Instagram;
        $se->Twitter_Link = $request->twitter;
        $se->Snapchat_Link = $request->snapchat;
        $se->PhoneNumber = $request->PhoneNumber;
        $se->Details = $request->Details;
        $se->WorkingHoursFrom = $request->fromWorkinghours;
        $se->WorkingHoursTo = $request->toWorkinghours;

        $ms = $request->massage;
        $se->save();
        session()->flash('Add', $ms);
        return redirect()->back();

       /* try {
            $setting = settings::findOrFail($request->id);
            $setting->update([

                $setting->Facebook_Link = $request->Facebook,
                $setting->Instagram_Link = $request->Instagram,


            ]);

        }

        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }*/



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\settings  $settings
     * @return \Illuminate\Http\Response
     */
    public function destroy(settings $settings)
    {
        //
    }
}
