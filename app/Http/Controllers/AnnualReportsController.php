<?php

namespace App\Http\Controllers;

use App\Models\CustomUser;
use App\Models\Hall;
use App\Models\AnnualReports;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class AnnualReportsController extends Controller
{
    public function index(Request $request)
    {
        $annualreports = AnnualReports::query()->get();
        if ($request->ajax()) {
            return DataTables::of($annualreports)
                ->addColumn('banner', function ($annualreports) {
                    $banner = asset("uploadreportsimage/" . $annualreports->banner);//file_put_contents
                    return '<img style="width: 60px; height: 30px;" src="' . $banner . '">';//object-position: center; object-fit: none;
                })
                ->addColumn('pdf', function ($annualreports) {
                    $pdf = asset("uploadreportspdf/" . $annualreports->pdf);//file_put_contents
                    return '<a href="' . $pdf . '" class="btn btn-xs  btn-primary"><i class="fas fa-file-download"></i></a>';
                })
                ->addColumn('action', function ($annualreports) {
                    $button = '<button data-id="' . $annualreports->id . '" id="delete" class="btn btn-danger btn-sm" title="delete"><i class="fa fa-trash"></i></button>&nbsp;
                           <button data-id="' . $annualreports->id . '" id="edit" class="btn btn-info btn-sm" title="settings"><i class="fa fa-edit"></i></button>';
                    return $button;
                })
                ->rawColumns(['banner'], ['pdf'])
                ->escapeColumns(['action' => 'action'])
                ->make(true);
        }
        return view("annualreports.annualreports", compact('annualreports'));
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

    public function store(Request $request)
    {
        if ($request->ajax()) {
            if ($request->action == "create") {
                $validator = Validator::make($request->all(), [
                    'year_name' => 'required:annualreports|max:255',
                    'banner' => 'required:annualreports',
                    'pdf' => 'required:annualreports',
                ], [
                    'year_name.required' => trans('annualreports.The Year name is required'),
                    'banner.required' => trans('annualreports.The Banner is required'),
                    'pdf.required' => trans('annualreports.The PDF is required'),
                ]);

                if ($validator->passes()) {
                    $data = new AnnualReports();
                    $data->year_name = $request->year_name;
                    $data->banner = $request->banner;
                    $data->pdf = $request->pdf;
                    $data->created_at = Carbon::now();
                    $data->save();
                    return response()->json(['success' => trans('annualreports.Successfully Create')]);
                }
                return response()->json(['error' => $validator->errors()->toArray()]);
            }
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        return AnnualReports::query()->find($id);
    }


    public function update(Request $request, $id)
    {
        if ($request->ajax()) {
            if ($request->action == "update") {
                $validator = Validator::make($request->all(), [
                    'year_name' => 'required:annualreports|max:255',
                    'banner' => 'required:annualreports',
                    'pdf' => 'required:annualreports',
                ], [
                    'year_name.required' => trans('annualreports.The Year name is required'),
                    'banner.required' => trans('annualreports.The Banner is required'),
                    'pdf.required' => trans('annualreports.The PDF is required'),
                ]);

                if ($validator->passes()) {
                    $data = AnnualReports::query()->find($id);
                    $data->year_name = $request->year_name;
                    $data->banner = $request->banner;
                    $data->pdf = $request->pdf;
                    $data->save();
                    return response()->json(['success' => trans('annualreports.Successfully Update')]);
                }
                return response()->json(['error' => $validator->errors()->toArray()]);
            }
        }
    }

    public function destroy($id)
    {
        $annual_report = AnnualReports::query()->find($id)->delete();
        if ($annual_report)
            return response()->json(['success' => trans('Success')]);
        else
            return response()->json(['error' => 'Failed']);
    }

    public function upload_image(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'banner' => 'mimes:jpeg,png,jpg|dimensions:width=1920,height=960|max:1920',
        ], [
            'banner.mimes' => 'صيغة المرفق يجب ان تكون  jpeg , png , jpg',
            'banner.dimensions' => 'ابعاد الصورة يجب ان تكون 960*1920',
        ]);


        if ($validator->passes()) {
            if ($request->ajax()) {
                $data = $request->file('file');
                $extension = $data->getClientOriginalExtension();
                $filename = time() . '.' . $extension; // renameing image
                $path = public_path('uploadreportsimage/');
                $usersImage = public_path("uploadreportsimage/{$filename}"); // get previous image from folder
                $upload_success = $data->move($path, $filename);
                return response()->json([
                    'success' => trans('events.Success-Uploaded-banner'),
                    'banner' => $filename
                ]);
            }
        }
        return response()->json(['error' => $validator->errors()->toArray()]);
    }

    public function upload_pdf(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->file('file');
            $extension = $data->getClientOriginalExtension();
            $filename = time() . '.' . $extension; // renameing image
            $path = public_path('uploadreportspdf/');
            $usersImage = public_path("uploadreportspdf/{$filename}"); // get previous image from folder
            $upload_success = $data->move($path, $filename);
            return response()->json([
                'success' => trans('annualreports.Success-Uploaded-pdf'),
                'pdf' => $filename
            ]);
        }
        return response()->json(['error' => 'error']);
    }
}
