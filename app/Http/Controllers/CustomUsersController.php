<?php

namespace App\Http\Controllers;

use App\Models\CustomUser;
use Illuminate\Http\Request;
use Illuminate\Http\Testing\File;
use Illuminate\Support\Carbon;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

/*{{--//TODO:: *** MOOMEN *S.* AL//DAHDOUH 12/13/2021--}}*/

class CustomUsersController extends Controller
{

    public function index(Request $request)
    {
        $user_type = $request->type;
        $custom_users = CustomUser::query()->where('type', $user_type);
        if ($request->ajax()) {
            return DataTables::of($custom_users)
                ->addColumn('banner', function ($custom_users) {
                    $banner = asset('uploadcustomuser/' . $custom_users->banner);
                    return '<img style="width: 60px; height: 30px;" src="' . $banner . '">';//object-position: center; object-fit: none;
                })
                ->addColumn('name', function ($custom_users) {
                    return '<p>' . $custom_users->name . '</p>';
                })
                ->addColumn('created_at', function ($custom_users) {
                    return '<p>' . \Carbon\Carbon::parse($custom_users->created_at)->diffForHumans() . '</p>';
                })
                ->addColumn('status', function ($custom_users) {
                    $status = '';
                    if ($custom_users->status == 0)
                        $status .= '<p class="text-danger">Pended</p>';
                    else
                        $status .= '<p class="text-primary">Active</p>';
                    return $status;
                })
                ->addColumn('action', function ($custom_users) {
                    $button = '<button data-id="' . $custom_users->id . '" id="delete" class="btn btn-danger btn-sm" title="delete"><i class="fa fa-trash"></i></button>&nbsp;
                           <button data-id="' . $custom_users->id . '" data-type="' . $custom_users->type . '" id="edit" class="btn btn-info btn-sm" title="settings"><i class="fa fa-edit"></i></button>';
                    return $button;
                })
                ->rawColumns(['banner'], ['name'], ['created_at'], ['status'])
                ->escapeColumns(['action' => 'action'])
                ->make(true);
        }

        return view("CustomUser.custom_user", compact('custom_users', 'user_type'));
    }

    public function create_agents()
    {
        return view('CustomUser.create_agents');
    }

    public function create_partners()
    {
        return view('CustomUser.create_partners');
    }

    public function create_managers()
    {
        return view('CustomUser.create_managers');
    }

    public function create_providers()
    {
        return view('CustomUser.create_providers');
    }

    public function store_agents(Request $request)
    {
        if ($request->ajax()) {
            if ($request->action == "create") {
                $validator = Validator::make($request->all(), [
                    'banner' => 'required',
                    'name_ar' => 'required:custom_users|max:255',
                    'name_en' => 'required:custom_users|max:255',
                    'country_ar' => 'required:custom_users|max:255',
                    'country_en' => 'required:custom_users|max:255',
                ], [
                    'banner.required' => 'Agent Banner is required!',
                    'name_ar.required' => 'Arabic agent name is required!',
                    'name_en.required' => 'English agent name is required!',
                    'country_ar.required' => 'Arabic country name is required!',
                    'country_en.required' => 'English country name is required!',
                ]);


                if ($validator->passes()) {
                    $data = new CustomUser();
                    $banner = $request->banner;
                    $data->banner = $banner;
                    $data->name = ['en' => $request->name_en, 'ar' => $request->name_ar];
                    $data->country = ['en' => $request->country_en, 'ar' => $request->country_ar];
                    $data->email = $request->email;
                    $data->phone = $request->phone;
                    $data->website_name = $request->website_name;
                    $data->website_url = $request->website_url;
                    $data->location = $request->location;
                    $data->type = $request->type;
                    $data->created_at = Carbon::now();
                    $data->updated_at = Carbon::now();
                    $data->save();
                    return response()->json(['success' => 'Successfully create Agents']);
                }
                return response()->json(['error' => $validator->errors()->toArray()]);
            }
        }
    }

    public function store_partners(Request $request)
    {
        if ($request->ajax()) {
            if ($request->action == "create") {
                $validator = Validator::make($request->all(), [
                    'banner' => 'required',
                    'name_ar' => 'required:custom_users|max:255',
                    'name_en' => 'required:custom_users|max:255',
                    'country_ar' => 'required:custom_users|max:255',
                    'country_en' => 'required:custom_users|max:255',
                ], [
                    'banner.required' => 'Partner Banner is required!',
                    'name_ar.required' => 'Arabic partner name is required!',
                    'name_en.required' => 'English partner name is required!',
                    'country_ar.required' => 'Arabic country name is required!',
                    'country_en.required' => 'English country name is required!',
                ]);


                if ($validator->passes()) {
                    $data = new CustomUser();
                    $banner = $request->banner;
                    $data->banner = $banner;
                    $data->name = ['en' => $request->name_en, 'ar' => $request->name_ar];
                    $data->country = ['en' => $request->country_en, 'ar' => $request->country_ar];
                    $data->email = $request->email;
                    $data->phone = $request->phone;
                    $data->website_name = $request->website_name;
                    $data->website_url = $request->website_url;
                    $data->location = $request->location;
                    $data->type = $request->type;
                    $data->created_at = Carbon::now();
                    $data->updated_at = Carbon::now();
                    $data->save();
                    return response()->json(['success' => 'Successfully create Partner']);
                }
                return response()->json(['error' => $validator->errors()->toArray()]);
            }
        }
    }

    public function store_managers(Request $request)
    {
        if ($request->ajax()) {
            if ($request->action == "create") {
                $validator = Validator::make($request->all(), [
                    'banner' => 'required',
                    'name_ar' => 'required:custom_users|max:255',
                    'name_en' => 'required:custom_users|max:255',
                    'country_ar' => 'required:custom_users|max:255',
                    'country_en' => 'required:custom_users|max:255',
                ], [
                    'banner.required' => 'Partner Banner is required!',
                    'name_ar.required' => 'Arabic partner name is required!',
                    'name_en.required' => 'English partner name is required!',
                    'country_ar.required' => 'Arabic country name is required!',
                    'country_en.required' => 'English country name is required!',
                ]);


                if ($validator->passes()) {
                    $data = new CustomUser();
                    $banner = $request->banner;
                    $data->banner = $banner;
                    $data->name = ['en' => $request->name_en, 'ar' => $request->name_ar];
                    $data->country = ['en' => $request->country_en, 'ar' => $request->country_ar];
                    $data->email = $request->email;
                    $data->phone = $request->phone;
                    $data->website_name = $request->website_name;
                    $data->website_url = $request->website_url;
                    $data->location = $request->location;
                    $data->type = $request->type;
                    $data->created_at = Carbon::now();
                    $data->updated_at = Carbon::now();
                    $data->save();
                    return response()->json(['success' => 'Successfully create Partner']);
                }
                return response()->json(['error' => $validator->errors()->toArray()]);
            }
        }
    }

    public function store_providers(Request $request)
    {
        if ($request->ajax()) {
            if ($request->action == "create") {
                $validator = Validator::make($request->all(), [
                    'banner' => 'required',
                    'name_ar' => 'required:custom_users|max:255',
                    'name_en' => 'required:custom_users|max:255',
                    'country_ar' => 'required:custom_users|max:255',
                    'country_en' => 'required:custom_users|max:255',
                ], [
                    'banner.required' => 'Partner Banner is required!',
                    'name_ar.required' => 'Arabic partner name is required!',
                    'name_en.required' => 'English partner name is required!',
                    'country_ar.required' => 'Arabic country name is required!',
                    'country_en.required' => 'English country name is required!',
                ]);


                if ($validator->passes()) {
                    $data = new CustomUser();
                    $banner = $request->banner;
                    $data->banner = $banner;
                    $data->name = ['en' => $request->name_en, 'ar' => $request->name_ar];
                    $data->country = ['en' => $request->country_en, 'ar' => $request->country_ar];
                    $data->email = $request->email;
                    $data->phone = $request->phone;
                    $data->website_name = $request->website_name;
                    $data->website_url = $request->website_url;
                    $data->location = $request->location;
                    $data->type = $request->type;
                    $data->created_at = Carbon::now();
                    $data->updated_at = Carbon::now();
                    $data->save();
                    return response()->json(['success' => 'Successfully create Partner']);
                }
                return response()->json(['error' => $validator->errors()->toArray()]);
            }
        }
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
                $path = public_path('uploadcustomuser/');
                $usersImage = public_path("uploadcustomuser/{$filename}"); // get previous image from folder
                $upload_success = $data->move($path, $filename);
                return response()->json([
                    'success' => 'Success Uploaded banner',
                    'banner' => $filename
                ]);
            }
        }
        return response()->json(['error' => $validator->errors()->toArray()]);
    }

    public
    function edit(Request $request, $id)
    {
        $customuser = CustomUser::query()->find($id);
        $user_type = $customuser->type;
        switch ($user_type) {
            case 0:
                return view('CustomUser.edit_agents', compact('customuser'));
            case 1:
                return view('CustomUser.edit_partners', compact('customuser'));
            case 2:
                return view('CustomUser.edit_managers', compact('customuser'));
            case 3:
                return view('CustomUser.edit_providers', compact('customuser'));
        }
    }

    function update_agents(Request $request, $id)
    {
        if ($request->ajax()) {
            if ($request->action == "update") {
                $validator = Validator::make($request->all(), [
                    'banner' => 'required',
                    'name_ar' => 'required:custom_users|max:255',
                    'name_en' => 'required:custom_users|max:255',
                    'country_ar' => 'required:custom_users|max:255',
                    'country_en' => 'required:custom_users|max:255',
                ], [
                    'banner.required' => 'Agents Banner is required!',
                    'name_ar.required' => 'Arabic agents name is required!',
                    'name_en.required' => 'English agents name is required!',
                    'country_ar.required' => 'Arabic country name is required!',
                    'country_en.required' => 'English country name is required!',
                ]);


                if ($validator->passes()) {
                    $data = CustomUser::query()->find($id);
                    $banner = $request->banner;
                    $data->banner = $banner;
                    $data->name = ['en' => $request->name_en, 'ar' => $request->name_ar];
                    $data->country = ['en' => $request->country_en, 'ar' => $request->country_ar];
                    $data->email = $request->email;
                    $data->phone = $request->phone;
                    $data->website_name = $request->website_name;
                    $data->website_url = $request->website_url;
                    $data->location = $request->location;
                    $data->status = $request->status;
                    $data->updated_at = Carbon::now();
                    $data->save();
                    /* $update = Activity::query()->find($id)->update([
                         'name' => $request->name,
                         'description' => $request->description,
                         'status' => $request->status,
                     ]);*/
                    if ($data)
                        return response()->json(['success' => "Save update succeeded"]);
                    else
                        return response()->json(['error' => "Save update failed, Please try again"]);
                }
                return response()->json(['error' => $validator->errors()->toArray()]);
            }
        }
    }

    function update_partners(Request $request, $id)
    {
        if ($request->ajax()) {
            if ($request->action == "update") {
                $validator = Validator::make($request->all(), [
                    'banner' => 'required',
                    'name_ar' => 'required:custom_users|max:255',
                    'name_en' => 'required:custom_users|max:255',
                    'country_ar' => 'required:custom_users|max:255',
                    'country_en' => 'required:custom_users|max:255',
                ], [
                    'banner.required' => 'Agents Banner is required!',
                    'name_ar.required' => 'Arabic agents name is required!',
                    'name_en.required' => 'English agents name is required!',
                    'country_ar.required' => 'Arabic country name is required!',
                    'country_en.required' => 'English country name is required!',
                ]);


                if ($validator->passes()) {
                    $data = CustomUser::query()->find($id);
                    $banner = $request->banner;
                    $data->banner = $banner;
                    $data->name = ['en' => $request->name_en, 'ar' => $request->name_ar];
                    $data->country = ['en' => $request->country_en, 'ar' => $request->country_ar];
                    $data->email = $request->email;
                    $data->phone = $request->phone;
                    $data->website_name = $request->website_name;
                    $data->website_url = $request->website_url;
                    $data->location = $request->location;
                    $data->status = $request->status;
                    $data->updated_at = Carbon::now();
                    $data->save();
                    /* $update = Activity::query()->find($id)->update([
                         'name' => $request->name,
                         'description' => $request->description,
                         'status' => $request->status,
                     ]);*/
                    if ($data)
                        return response()->json(['success' => "Save update succeeded"]);
                    else
                        return response()->json(['error' => "Save update failed, Please try again"]);
                }
                return response()->json(['error' => $validator->errors()->toArray()]);
            }
        }
    }

    function update_managers(Request $request, $id)
    {
        if ($request->ajax()) {
            if ($request->action == "update") {
                $validator = Validator::make($request->all(), [
                    'banner' => 'required',
                    'name_ar' => 'required:custom_users|max:255',
                    'name_en' => 'required:custom_users|max:255',
                    'country_ar' => 'required:custom_users|max:255',
                    'country_en' => 'required:custom_users|max:255',
                ], [
                    'banner.required' => 'Agents Banner is required!',
                    'name_ar.required' => 'Arabic agents name is required!',
                    'name_en.required' => 'English agents name is required!',
                    'country_ar.required' => 'Arabic country name is required!',
                    'country_en.required' => 'English country name is required!',
                ]);


                if ($validator->passes()) {
                    $data = CustomUser::query()->find($id);
                    $banner = $request->banner;
                    $data->banner = $banner;
                    $data->name = ['en' => $request->name_en, 'ar' => $request->name_ar];
                    $data->country = ['en' => $request->country_en, 'ar' => $request->country_ar];
                    $data->email = $request->email;
                    $data->phone = $request->phone;
                    $data->website_name = $request->website_name;
                    $data->website_url = $request->website_url;
                    $data->location = $request->location;
                    $data->status = $request->status;
                    $data->updated_at = Carbon::now();
                    $data->save();
                    /* $update = Activity::query()->find($id)->update([
                         'name' => $request->name,
                         'description' => $request->description,
                         'status' => $request->status,
                     ]);*/
                    if ($data)
                        return response()->json(['success' => "Save update succeeded"]);
                    else
                        return response()->json(['error' => "Save update failed, Please try again"]);
                }
                return response()->json(['error' => $validator->errors()->toArray()]);
            }
        }
    }

    function update_providers(Request $request, $id)
    {
        if ($request->ajax()) {
            if ($request->action == "update") {
                $validator = Validator::make($request->all(), [
                    'banner' => 'required',
                    'name_ar' => 'required:custom_users|max:255',
                    'name_en' => 'required:custom_users|max:255',
                    'country_ar' => 'required:custom_users|max:255',
                    'country_en' => 'required:custom_users|max:255',
                ], [
                    'banner.required' => 'Agents Banner is required!',
                    'name_ar.required' => 'Arabic agents name is required!',
                    'name_en.required' => 'English agents name is required!',
                    'country_ar.required' => 'Arabic country name is required!',
                    'country_en.required' => 'English country name is required!',
                ]);


                if ($validator->passes()) {
                    $data = CustomUser::query()->find($id);
                    $banner = $request->banner;
                    $data->banner = $banner;
                    $data->name = ['en' => $request->name_en, 'ar' => $request->name_ar];
                    $data->country = ['en' => $request->country_en, 'ar' => $request->country_ar];
                    $data->email = $request->email;
                    $data->phone = $request->phone;
                    $data->website_name = $request->website_name;
                    $data->website_url = $request->website_url;
                    $data->location = $request->location;
                    $data->status = $request->status;
                    $data->updated_at = Carbon::now();
                    $data->save();
                    /* $update = Activity::query()->find($id)->update([
                         'name' => $request->name,
                         'description' => $request->description,
                         'status' => $request->status,
                     ]);*/
                    if ($data)
                        return response()->json(['success' => "Save update succeeded"]);
                    else
                        return response()->json(['error' => "Save update failed, Please try again"]);
                }
                return response()->json(['error' => $validator->errors()->toArray()]);
            }
        }
    }

    public
    function destroy(Request $request, $id)
    {
        if ($request->ajax()) {
            $customuser = CustomUser::query()->find($id);
            if ($customuser->delete()) {
                return response()->json(['success' => 'Remove succeeded']);
            }
            return response()->json(['error' => 'Remove failed!, Please try again']);
        }
    }


    public
    function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public
    function show($id)
    {
        //
    }

}
