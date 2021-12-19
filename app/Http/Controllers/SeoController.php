<?php

namespace App\Http\Controllers;

use App\Http\Requests\shifrequest;
use App\Models\pages;
use App\Models\seo;
use Illuminate\Http\Request;

class SeoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $SEO = pages::all();
        return view('SEO.seo',compact('SEO'));
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
    public function store(Request  $request)
    {

        try {
            $SEO = pages::findOrFail($request->id);

            $SEO->update([
              $SEO->Pagetitle = $request->Pagetitle,

                $SEO->Metatitle = $request->Metatitle,
            ]);
            /*
            $translations = [
                'en' => $request->Name_en,
                'ar' => $request->Name
            ];
            $Grade->setTranslations('Name', $translations);
            */

            return redirect()->route('SEO.seo');
        }

        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\seo  $seo
     * @return \Illuminate\Http\Response
     */
    public function show(seo $seo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\seo  $seo
     * @return \Illuminate\Http\Response
     */
    public function edit(seo $seo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\seo  $seo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //

        try {
            $SEO = pages::findOrFail($request->id);
            $SEO->update([
/*                $SEO->Pagetitle = $request->Pagetitle,*/
                $SEO->Pagetitle = ['en'=> $request->pagetitle_en , 'ar'=> $request->pagetitle_ar],
                $SEO->Metatitle = $request->Metatitle,
                $SEO->Metadescription = $request->Metadescription,

            ]);
            /*
            $translations = [
                'en' => $request->Name_en,
                'ar' => $request->Name
            ];
            $Grade->setTranslations('Name', $translations);
            */

            return redirect()->route('SEO.seo');
        }

        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\seo  $seo
     * @return \Illuminate\Http\Response
     */
    public function destroy(seo $seo)
    {
        //
    }
}
