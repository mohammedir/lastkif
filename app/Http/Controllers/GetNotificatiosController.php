<?php

namespace App\Http\Controllers;

use App\Exports\getNotificatiosExport;
use App\Models\getNotificatios;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use PDF;



class GetNotificatiosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $gitNotification = getNotificatios::all();

        return view('GitNotification.gitNotification',compact('gitNotification'));
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


            getNotificatios::create([

                'mobileNumber' => $request->MobileNumber

            ]);
        session()->flash('Add', 'تم اضافة الرقم بنجاح ');
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\getNotificatios  $getNotificatios
     * @return \Illuminate\Http\Response
     */
    public function show(getNotificatios $getNotificatios)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\getNotificatios  $getNotificatios
     * @return \Illuminate\Http\Response
     */
    public function edit(getNotificatios $getNotificatios)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\getNotificatios  $getNotificatios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        try {
            $getNotificatios = getNotificatios::findOrFail($request->id);
            $getNotificatios->update([
                $getNotificatios->mobileNumber = $request->MobileNumber,

            ]);

            session()->flash('Add', 'تم تعديل الرقم بنجاح ');
            return redirect()->back();
        }

        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\getNotificatios  $getNotificatios
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //

        $id = $request->notification_id;
        $Notification_id = getNotificatios::where('id', $id)->first();

        $Notification_id->forceDelete();
         return redirect('/getNotification');


    }

    public function export()
    {
        return Excel::download(new getNotificatiosExport, 'getNotification.xlsx');

    }
    public function pdf()
    {
       /* $gitNotification = getNotificatios::all();
        $pdf = PDF::loadView('GitNotification.gitNotification',compact('gitNotification'));
        return $pdf->downloas('document.pdf');*/

        $gitNotification = getNotificatios::all();
        $pdf = PDF::loadView('empty');
        return $pdf->download('invoice.pdf');



    }

}
