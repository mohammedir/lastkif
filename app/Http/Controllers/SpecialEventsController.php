<?php

namespace App\Http\Controllers;

use App\Models\CustomUser;
use App\Models\Hall;
use App\Models\hallsPage;
use App\Models\SpecialEvents;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class SpecialEventsController extends Controller
{
    public function index(Request $request)
    {
        $special_events = SpecialEvents::query()->get();
        if ($request->ajax()) {
            return DataTables::of($special_events)
                ->addColumn('name', function ($special_events) {
                    return '<p>' . $special_events->getTranslation('name', config('app.locale')) . '</p>';
                })
                ->addColumn('action', function ($special_events) {
                    $button = '<button data-id="' . $special_events->id . '" id="delete" class="btn btn-danger btn-sm" title="delete"><i class="fa fa-trash"></i></button>&nbsp;
                           <button data-id="' . $special_events->id . '" id="edit" class="btn btn-info btn-sm" title="settings"><i class="fa fa-edit"></i></button>';
                    return $button;
                })
                ->rawColumns(['name'], ['action'])
                ->make(true);
        }
        return view("specialevents.specialevents", compact('special_events'));
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
                    'name_ar' => 'required:special_events|max:255',
                    'name_en' => 'required:special_events|max:255',
                    'url' => 'required:special_events,url|url',
                ], [
                    'name_ar.required' => trans('specialevents.The Arabic Name is required'),
                    'name_en.required' => trans('specialevents.The English Name is required'),
                    'url.required' => trans('specialevents.The URL is required'),
                    'url.url' => trans('specialevents.Enter valid URL'),
                ]);

                if ($validator->passes()) {
                    $data = new SpecialEvents();
                    $data->name = ['en' => $request->name_en, 'ar' => $request->name_ar];
                    $data->url = $request->url;
                    $data->created_at = Carbon::now();
                    $data->save();
                    $event_fk_id = $data->id;
                    if ($data) {
                        /*Add Hall in admin menu*/
                        /*$hallsPage = new hallsPage();
                        $hallsPage->page_fk_id = $event_fk_id;
                        $hallsPage->label = $request->name_en;
                        $hallsPage->sort = 1;
                        $hallsPage->status = 1;
                        $hallsPage->type = 0;
                        $hallsPage->menu = 1;
                        $hallsPage->depth = 1;
                        $hallsPage->class = 3;
                        $hallsPage->created_at = Carbon::now();
                        $hallsPage->save();*/
                    }
                    return response()->json(['success' => trans('specialevents.Successfully Create')]);
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
        return SpecialEvents::query()->find($id);
    }

    public function update(Request $request, $id)
    {
        if ($request->ajax()) {
            if ($request->action == "update") {
                $validator = Validator::make($request->all(), [
                    'name_ar' => 'required:special_events|max:255',
                    'name_en' => 'required:special_events|max:255',
                    'url' => 'required:special_events,url|url',
                ], [
                    'name_ar.required' => trans('specialevents.The Arabic Name is required'),
                    'name_en.required' => trans('specialevents.The English Name is required'),
                    'url.required' => trans('specialevents.The URL is required'),
                    'url.url' => trans('specialevents.Enter valid URL'),
                ]);

                if ($validator->passes()) {
                    $data = SpecialEvents::query()->find($id);
                    //dd($data);
                    $data->name = ['en' => $request->name_en, 'ar' => $request->name_ar];
                    $data->url = $request->url;
                    $data->save();
                    return response()->json(['success' => trans('specialevents.Successfully Update')]);
                }
                return response()->json(['error' => $validator->errors()->toArray()]);
            }
        }
    }

    public function destroy($id)
    {
        $s_event = SpecialEvents::query()->find($id)->delete();
        if ($s_event)
            return response()->json(['success' => trans('Success')]);
        else
            return response()->json(['error' => 'Failed']);
    }


}
