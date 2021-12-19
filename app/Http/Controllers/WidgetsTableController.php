<?php

namespace App\Http\Controllers;

use App\Models\widgetsTable;
use Illuminate\Http\Request;

class WidgetsTableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $widgetsTable = widgetsTable::all();

        return view('Widgets.widgets',compact('widgetsTable'));
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
       try {

        widgetsTable::create([

            'title' => ['en'=> $request->widgetname_en , 'ar'=> $request->widgetname_ar],
            'value' => $request->widgetvalue

        ]);
        return redirect()->route('Widgets.widgets');
        }

        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\widgetsTable  $widgetsTable
     * @return \Illuminate\Http\Response
     */
    public function show(widgetsTable $widgetsTable)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\widgetsTable  $widgetsTable
     * @return \Illuminate\Http\Response
     */
    public function edit(widgetsTable $widgetsTable)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\widgetsTable  $widgetsTable
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //

        try {
            $widgets = widgetsTable::findOrFail($request->id);
            $widgets->update([

                $widgets->value = $request->Editewidgetvalue,


                $ms = $request->massage,
            ]);
            session()->flash('Add', $ms);
            return redirect()->back();
        }

        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\widgetsTable  $widgetsTable
     * @return \Illuminate\Http\Response
     */
    public function destroy(widgetsTable $widgetsTable)
    {
        //
    }
}
