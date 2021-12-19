<?php

namespace App\Http\Controllers;

use App\slider;
use Illuminate\Http\Request;


class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //


        $slider = slider::all();
        return view('Slider.slider',compact('slider'));
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
       /* slider::create([
            'title' => $request->slider_title,
            'type' => $request->type,
        ]);*/

        if ($request->type == 1){

            $this->validate($request, [
                'desktop' => 'mimes:jpeg,png,jpg,gif|max:2048',
                'mobile'  => 'mimes:jpeg,png,jpg,gif|max:2048',
/*|dimensions:width=1920,height=1920*/
            ], [
                'desktop.mimes' => 'صيغة المرفق يجب ان تكون   gif, jpeg , png , jpg',
                'mobile.mimes' => 'صيغة المرفق يجب ان تكون   gif, jpeg , png , jpg',
                'desktop.dimensions' => 'ابعاد الصورة يجب ان تكون 1920*1920',
                'mobile.dimensions' => 'ابعاد الصورة يجب ان تكون 1000*1000',
                'desktop.max' => 'اقصى حجم ممكن هو 2 ميجا بايت',
                'mobile.max' => 'اقصى حجم ممكن هو 2 ميجا بايت',

            ]);
        }else{

            $this->validate($request, [
                'desktop' => 'mimes:mp4|dimensions:width=1920,height=1920|max:20480',
                'mobile'  => 'mimes:mp4|dimensions:width=1000,height=1000|max:20480',

            ], [
                'desktop.mimes' => 'صيغة المرفق يجب ان تكون   mp4',
                'mobile.mimes' => 'صيغة المرفق يجب ان تكون   mp4',
                'desktop.dimensions' => 'ابعاد الفيديو يجب ان تكون 1920*1920',
                'mobile.dimensions' => 'ابعاد الفيديو يجب ان تكون 1000*1000',
                'desktop.max' => 'اقصى حجم ممكن هو 20 ميجا بايت',
                'mobile.max' => 'اقصى حجم ممكن هو 20 ميجا بايت',

            ]);
        }

        if ($request->hasFile('desktop') && $request->hasFile('mobile')){

            $imageDesktop = $request->file('desktop');
            $file_nameDesktop = $imageDesktop->getClientOriginalName();

            $imageMobile = $request->file('mobile');
            $file_nameMobile = $imageMobile->getClientOriginalName();

            slider::create([
                'title' => $request->slider_title,
                'type' => $request->type,
                'DesktopDevice' => $file_nameDesktop,
                'MobileDevice'  => $file_nameMobile,
                'status' => 1
            ]);

            // move pic
            $request->desktop->move(public_path('uploadslider'), $file_nameDesktop);
            $request->mobile->move(public_path('uploadslider'), $file_nameMobile);





        }

        session()->flash('Add', 'تم اضافة السلايد بنجاح ');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(slider $slider)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, slider $slider)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //

        $id = $request->notification_id;
        $Notification_id = slider::where('id', $id)->first();

        $Notification_id->forceDelete();
        return redirect('/slider');
    }

    public function changeSliderStatus(Request $request){

        $member = slider::find($request->slider_id);
        $member->status = $request->status;
        $member->save();

    }
}













