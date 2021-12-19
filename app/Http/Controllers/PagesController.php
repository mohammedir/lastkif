<?php

namespace App\Http\Controllers;

use App\Models\pages;
use Illuminate\Http\Request;
use App\Models\seo;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $page = pages::all();
        return view('Pages.page',compact('page'));
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
     * @param  \App\Models\pages  $pages
     * @return \Illuminate\Http\Response
     */
    public function show(pages $pages)
    {
        //



    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pages  $pages
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        //

       $editpages = pages::findOrFail($id);;

/*        if($id == 1){
           return view('Homepage.Home',compact('id','editpages'));
        }elseif ($id == 2){
           return view('Company.company',compact('id','editpages'));
        }elseif ($id == 3){
            return view('Hall.hall');

        }elseif ($id == 4){
            return view('Events.events',compact('id','editpages'));
        }*/
        return view('Homepage.Home',compact('id','editpages'));



    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pages  $pages
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        try {

        $page = pages::findOrFail($request->id);
        $page->update([

            $page->Pagetitle = ['en'=> $request->pagetitle_en , 'ar'=> $request->pagetitle_ar],
            $page->Metatitle = ['en'=> $request->Metatitle_en , 'ar'=> $request->Metatitle_ar],
            $page->Metadescription = ['en'=> $request->Metadescription_en , 'ar'=> $request->Metadescription_ar],
            $page->Metakeywords = $request->Metakeywords,
            $page->staticpages = $request->wysiwygeditor,

        ]);
            session()->flash('Add', 'تمت الأضافة بنجاح ');

            return redirect()->back();
        }

        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pages  $pages
     * @return \Illuminate\Http\Response
     */
    public function destroy(pages $pages)
    {
        //
    }

    public function changePageStatus(Request $request){

        $member = pages::find($request->page_id);
        $member->Status = $request->status;
        $member->save();

    }
}
