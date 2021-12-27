<?php

namespace App\Http\Controllers;

use App\Models\CustomUser;
use App\Models\Hall;
use App\Models\hallsPage;
use App\Models\widgetsTable;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class HallsController extends Controller
{

    public function index(Request $request)
    {
        $halls = Hall::query()->get();
        if ($request->ajax()) {
            return DataTables::of($halls)
                ->addColumn('name', function ($halls) {
                    return '<p>' . $halls->name . '</p>';
                })
                ->addColumn('title', function ($halls) {
                    return '<p>' . $halls->title . '</p>';
                })
                ->addColumn('type', function ($halls) {
                    if ($halls->type == 0)
                        return '<p>' . trans('halls.External-Hall') . '</p>';
                    else
                        return '<p>' . trans('halls.Internal-Hall') . '</p>';
                })
                ->addColumn('action', function ($halls) {
                    $button = '<button data-id="' . $halls->id . '" id="delete" class="btn btn-danger btn-sm" title="delete"><i class="fa fa-trash"></i></button>&nbsp;
                           <button data-id="' . $halls->id . '" data-type="' . $halls->type . '" id="edit" class="btn btn-info btn-sm" title="settings"><i class="fa fa-edit"></i></button>';
                    return $button;
                })
                ->rawColumns(['name'], ['title'], ['type'])
                ->escapeColumns(['action' => 'action'])
                ->make(true);
        }
        return view("Hall.hall", compact('halls'));
    }

    public function create()
    {
        return view('Hall.create_halls');
    }

    public function store(Request $request)
    {
        if ($request->ajax()) {
            if ($request->action == "create") {
                $validator = null;
                $type = (int)$request->type;
                $widget_fk_id = "";
                if ($type == 0) {
                    $validator = Validator::make($request->all(), [
                        'name_ar' => 'required:halls|max:255',
                        'name_en' => 'required:halls|max:255',
                        'hall_url' => 'required|url',
                    ], [
                        'name_ar.required' => trans("halls.Arabic-hall-name-is-required"),
                        'name_en.required' => trans("halls.English-hall-name-is-required"),
                        'hall_url.required' => trans("halls.URL-is-required"),
                        'hall_url.url' => trans("halls.Enter-valid-URL"),
                    ]);
                } else {
                    $validator = Validator::make($request->all(), [
                        'name_ar' => 'required:halls|max:255',
                        'name_en' => 'required:halls|max:255',
                        'description_ar' => 'required',
                        'description_en' => 'required',
                    ], [
                        'name_ar.required' => trans("halls.Arabic-hall-name-is-required"),
                        'name_en.required' => trans("halls.English-hall-name-is-required"),
                        'description_ar.required' => trans("halls.Arabic-hall-description-is-required"),
                        'description_en.required' => trans("halls.English hall description is required"),
                    ]);
                }

                if ($validator->passes()) {
                    $data = new Hall();
                    $data->name = ['en' => $request->name_en, 'ar' => $request->name_ar];
                    $data->title = ['en' => $request->name_en, 'ar' => $request->name_ar];
                    if ($type == 0) {
                        $data->url = $request->hall_url;
                    } else {
                        $data->description = ['en' => $request->description_en, 'ar' => $request->description_ar];
                        $data->widget_value = $request->widget_value;
                        /*Crete widget*/
                        /*$wedget = widgetsTable::query()->create([
                            'title' => ['en' => $request->widget_name_en, 'ar' => $request->widget_name_ar],
                            'value' => $request->widget_value
                        ]);*/
                        /*$wedget = new widgetsTable();
                        $wedget->title = ['en' => $request->widget_name_en, 'ar' => $request->widget_name_ar];
                        $wedget->value = $request->widget_value;
                        $wedget->value_ar = $request->widget_value;
                        $wedget->value_en = $request->widget_value;
                        $wedget->created_at = Carbon::now();
                        $wedget->updated_at = Carbon::now();
                        $wedget->save();
                        $widget_fk_id = $wedget->id;
                        $data->widget_fk_id = $widget_fk_id;*/
                    }
                    $data->type = $type;
                    $data->created_at = Carbon::now();
                    $data->updated_at = Carbon::now();
                    $data->save();
                    if ($data) {
                        $hall_fk_id = $data->id;
                        /*Add Hall in admin menu*/
                        $hallsPage = new hallsPage();
                        $hallsPage->page_fk_id = $hall_fk_id;
                        $hallsPage->label = $request->name_en;
                        $hallsPage->sort = 4;
                        $hallsPage->status = 1;
                        $hallsPage->type = 0;
                        $hallsPage->menu = 1;
                        $hallsPage->depth = 1;
                        $hallsPage->class = 4;
                        $hallsPage->created_at = Carbon::now();
                        $hallsPage->save();
                    }
                    return response()->json(['success' => trans("halls.Successfully-create-Hall")]);
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
        $hall = Hall::query()->find($id);
        return view('Hall.edit_halls', compact('hall'));
    }

    public function update(Request $request, $id)
    {
        if ($request->ajax()) {
            if ($request->action == "update") {
                $data = Hall::query()->find($id);
                $validator = null;
                $type = (int)$request->type;
                $url = "";
                $description = "";

                if ($type == 0) {
                    $validator = Validator::make($request->all(), [
                        'name_ar' => 'required:halls|max:255',
                        'name_en' => 'required:halls|max:255',
                        'hall_url' => 'required|url',
                    ], [
                        'name_ar.required' => trans("halls.Arabic-hall-name-is-required"),
                        'name_en.required' => trans("halls.English-hall-name-is-required"),
                        'hall_url.required' => trans("halls.URL-is-required"),
                        'hall_url.url' => trans("halls.Enter-valid-URL"),
                    ]);
                } else {
                    $validator = Validator::make($request->all(), [
                        'name_ar' => 'required:halls|max:255',
                        'name_en' => 'required:halls|max:255',
                        'description_ar' => 'required',
                        'description_en' => 'required',
                    ], [
                        'name_ar.required' => trans("halls.Arabic-hall-name-is-required"),
                        'name_en.required' => trans("halls.English-hall-name-is-required"),
                        'description_ar.required' => trans("halls.Arabic-hall-description-is-required"),
                        'description_en.required' => trans("halls.English hall description is required"),
                    ]);
                }

                if ($validator->passes()) {
                    $data->name = ['en' => $request->name_en, 'ar' => $request->name_ar];
                    $data->title = ['en' => $request->name_en, 'ar' => $request->name_ar];
                    if ($type == 0) {
                        $data->url = $request->hall_url;
                        $data->description = ['en' => "", 'ar' => ""];
                        $data->widget_value = $request->widget_value;
                        /*if ($data->widget) {
                            $wedget = widgetsTable::query()->find($data->widget->id);
                            $wedget->title = ['en' => "", 'ar' => ""];
                            $wedget->value = "";
                            $wedget->value_ar = "";
                            $wedget->value_en = "";
                            $wedget->updated_at = Carbon::now();
                            $wedget->save();
                        }*/
                    } else {
                        $data->url = "";
                        $data->description = ['en' => $request->description_en, 'ar' => $request->description_ar];
                        $data->widget_value = $request->widget_value;
                        /*if ($data->widget) {
                            $wedget = widgetsTable::query()->find($data->widget->id);
                            $wedget->title = ['en' => $request->widget_name_en, 'ar' => $request->widget_name_ar];
                            $wedget->value = $request->widget_value;
                            $wedget->value_ar = $request->widget_value;
                            $wedget->value_en = $request->widget_value;
                            $wedget->updated_at = Carbon::now();
                            $wedget->save();
                        }*/
                    }
                    $data->type = $type;
                    $data->updated_at = Carbon::now();
                    $data->save();
                    return response()->json(['success' => trans("halls.Successfully-update-Hall")]);
                }
                return response()->json(['error' => $validator->errors()->toArray()]);
            }
        }
    }

    public function destroy(Request $request, $id)
    {
        if ($request->ajax()) {
            $hall = Hall::query()->find($id);
            if ($hall->widget != null)
                $hall->widget->delete();
            if ($hall->delete()) {
                return response()->json(['success' => trans("halls.Remove-succeeded")]);
            }
            return response()->json(['error' => trans("halls.Remove-failed")]);
        }
    }
}
