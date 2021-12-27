<?php

namespace App\Http\Controllers;

use App\Models\CustomUser;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;

//$lang = config('app.locale');
//$language = LanguageSit($lang);


/*{{--//TODO:: *** MOOMEN *S.* AL//DAHDOUH 12/19/2021--}}*/

class CustomUsersController extends Controller
{

    public function index(Request $request)
    {
        $user_type = $request->type;
        $custom_users = CustomUser::query()->where('type', $user_type);
        if ($request->ajax()) {
            return DataTables::of($custom_users)
                ->addColumn('banner', function ($custom_users) {
                    $banner = asset("uploadcustomuser/" . $custom_users->banner);//file_put_contents
                    return '<img style="width: 60px; height: 30px;" src="' . $banner . '">';//object-position: center; object-fit: none;
                })
                ->addColumn('name', function ($custom_users) {
                    return '<p>' . $custom_users->name . '</p>';
                })
                ->addColumn('action', function ($custom_users) {
                    $button = '<button data-id="' . $custom_users->id . '" id="delete" class="btn btn-danger btn-sm" title="delete"><i class="fa fa-trash"></i></button>&nbsp;
                           <button data-id="' . $custom_users->id . '" data-type="' . $custom_users->type . '" id="edit" class="btn btn-info btn-sm" title="settings"><i class="fa fa-edit"></i></button>';
                    return $button;
                })
                ->rawColumns(['banner'], ['name'])
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
                    'banner.required' => trans('customusers.Agents-Banner-is-required'),
                    'name_ar.required' => trans('customusers.Arabic-agent-name-is-required'),
                    'name_en.required' => trans('customusers.English-agent-name-is-required'),
                    'country_ar.required' => trans('customusers.Arabic-country-name-is-required'),
                    'country_en.required' => trans('customusers.English-country-name-is-required'),
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
                    return response()->json(['success' => trans('customusers.Successfully-create-Agents')]);
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
                    'banner.required' => trans('customusers.Partners-Banner-is-required'),
                    'name_ar.required' => trans('customusers.Arabic-Partners-name-is-required'),
                    'name_en.required' => trans('customusers.English-Partners-name-is-required'),
                    'country_ar.required' => trans('customusers.Arabic-country-name-is-required'),
                    'country_en.required' => trans('customusers.English-country-name-is-required'),
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
                    return response()->json(['success' => trans('customusers.Successfully-create-Partner')]);
                }
                return response()->json(['error' => $validator->errors()->toArray()]);
            }
        }
    }

    public function store_managers(Request $request)
    {
        //$lang = new LanguageSit();
        $lang = config('app.locale');
        //app()->setLocale(trans('customusers.current_lang'));
        if ($request->ajax()) {
            if ($request->action == "create") {
                $validator = Validator::make($request->all(), [
                    'banner' => 'required',
                    'name_ar' => 'required:custom_users|max:255',
                    'name_en' => 'required:custom_users|max:255',
                    'position_ar' => 'required:custom_users',
                    'position_en' => 'required:custom_users',
                    'exhibition_manager' => 'required:custom_users',
                ], [
                    'banner.required' => trans('customusers.Manager-Exhibition-Banner-is-required'),
                    'name_ar.required' => trans('customusers.Arabic-Exhibition-Manager-name-is-required'),
                    'name_en.required' => trans('customusers.English-Exhibition-Manager-name-is-required'),
                    'position_ar.required' => trans('customusers.Manager-position-is-required-ar'),
                    'position_en.required' => trans('customusers.Manager-position-is-required-en'),
                    'exhibition_manager.required' => trans('customusers.Exhibition-Manager-is-required'),
                ]);

                if ($validator->passes()) {
                    $data = new CustomUser();
                    $banner = $request->banner;
                    $data->banner = $banner;
                    $data->name = ['en' => $request->name_en, 'ar' => $request->name_ar];
                    $data->position = ['en' => $request->position_en, 'ar' => $request->position_ar];
                    $data->extension_number = $request->extension_number;
                    $data->exhibition_manager = $request->exhibition_manager;
                    $data->email = $request->email;
                    $data->phone = $request->phone;
                    $data->type = $request->type;
                    $data->created_at = Carbon::now();
                    $data->updated_at = Carbon::now();
                    $data->save();
                    return response()->json(['success' => trans('customusers.Successfully-create-Exhibition-Manager')]);
                }
                //dd(Config::get('app.locale'));

                return response()->json(['error' => $validator->errors()->toArray(), 'lang' => $lang]);
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
                    'company_ar' => 'required:custom_users|max:255',
                    'company_en' => 'required:custom_users|max:255',
                ], [
                    'banner.required' => trans('customusers.Provider-Banner-is-required'),
                    'name_ar.required' => trans('customusers.Arabic-Service-name-is-required'),
                    'name_en.required' => trans('customusers.English-Service-name-is-required'),
                    'company_ar.required' => trans('customusers.Arabic-company-name-is-required'),
                    'company_en.required' => trans('customusers.English-company-name-is-required'),
                ]);

                if ($validator->passes()) {
                    $data = new CustomUser();
                    $banner = $request->banner;
                    $data->banner = $banner;
                    $data->name = ['en' => $request->name_en, 'ar' => $request->name_ar];
                    $data->company_name = ['en' => $request->company_en, 'ar' => $request->company_ar];
                    $data->email = $request->email;
                    $data->phone = $request->phone;
                    $data->website_name = $request->website_name;
                    $data->website_url = $request->website_url;
                    $data->type = $request->type;
                    $data->created_at = Carbon::now();
                    $data->updated_at = Carbon::now();
                    $data->save();
                    return response()->json(['success' => trans('customusers.Successfully-create-Partner')]);
                }
                return response()->json(['error' => $validator->errors()->toArray()]);
            }
        }
    }

    public function upload_image(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'banner' => 'mimes:jpeg,png,jpg|dimensions:width=2000,height=1000',
        ], [
            'banner.mimes' => 'صيغة المرفق يجب ان تكون  jpeg , png , jpg',
            'banner.dimensions' => 'ابعاد الصورة يجب ان تكون 1000*2000',
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
                    'success' => trans('customusers.Success-Uploaded-banner'),
                    'banner' => $filename
                ]);
            }
        }
        return response()->json(['error' => $validator->errors()->toArray()]);
    }

    public function edit(Request $request, $id)
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

    public function update_agents(Request $request, $id)
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
                    'banner.required' => trans('customusers.Agents-Banner-is-required'),
                    'name_ar.required' => trans('customusers.Arabic-agent-name-is-required'),
                    'name_en.required' => trans('customusers.English-agent-name-is-required'),
                    'country_ar.required' => trans('customusers.Arabic-country-name-is-required'),
                    'country_en.required' => trans('customusers.English-country-name-is-required'),
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
                    $data->updated_at = Carbon::now();
                    $data->save();
                    /* $update = Activity::query()->find($id)->update([
                         'name' => $request->name,
                         'description' => $request->description,
                         'status' => $request->status,
                     ]);*/
                    if ($data)
                        return response()->json(['success' => trans('customusers.Save-update-succeeded')]);
                    else
                        return response()->json(['error' => trans('customusers.Save-update-failed')]);
                }
                return response()->json(['error' => $validator->errors()->toArray()]);
            }
        }
    }

    public function update_partners(Request $request, $id)
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
                    'banner.required' => trans('customusers.Partners-Banner-is-required'),
                    'name_ar.required' => trans('customusers.Arabic-Partners-name-is-required'),
                    'name_en.required' => trans('customusers.English-Partners-name-is-required'),
                    'country_ar.required' => trans('customusers.Arabic-country-name-is-required'),
                    'country_en.required' => trans('customusers.English-country-name-is-required'),
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
                    $data->updated_at = Carbon::now();
                    $data->save();
                    /* $update = Activity::query()->find($id)->update([
                         'name' => $request->name,
                         'description' => $request->description,
                         'status' => $request->status,
                     ]);*/
                    if ($data)
                        return response()->json(['success' => trans('customusers.Save-update-succeeded')]);
                    else
                        return response()->json(['error' => trans('customusers.Save-update-failed')]);
                }
                return response()->json(['error' => $validator->errors()->toArray()]);
            }
        }
    }

    public function update_managers(Request $request, $id)
    {
        if ($request->ajax()) {
            if ($request->action == "update") {
                $validator = Validator::make($request->all(), [
                    'banner' => 'required',
                    'name_ar' => 'required:custom_users|max:255',
                    'name_en' => 'required:custom_users|max:255',
                    'position_ar' => 'required:custom_users',
                    'position_en' => 'required:custom_users',
                    'exhibition_manager' => 'required:custom_users',
                ], [
                    'banner.required' => trans('customusers.Manager-Exhibition-Banner-is-required'),
                    'name_ar.required' => trans('customusers.Arabic-Exhibition-Manager-name-is-required'),
                    'name_en.required' => trans('customusers.English-Exhibition-Manager-name-is-required'),
                    'position_ar.required' => trans('customusers.Manager-position-is-required-ar'),
                    'position_en.required' => trans('customusers.Manager-position-is-required-en'),
                    'exhibition_manager.required' => trans('customusers.Exhibition-Manager-is-required'),
                ]);


                if ($validator->passes()) {
                    $data = CustomUser::query()->find($id);
                    $banner = $request->banner;
                    $data->banner = $banner;
                    $data->name = ['en' => $request->name_en, 'ar' => $request->name_ar];
                    $data->position = ['en' => $request->position_en, 'ar' => $request->position_ar];
                    $data->extension_number = $request->extension_number;
                    $data->exhibition_manager = $request->exhibition_manager;
                    $data->email = $request->email;
                    $data->phone = $request->phone;
                    $data->updated_at = Carbon::now();
                    $data->save();
                    if ($data)
                        return response()->json(['success' => trans('customusers.Save-update-succeeded')]);
                    else
                        return response()->json(['error' => trans('customusers.Save-update-failed')]);
                }
                return response()->json(['error' => $validator->errors()->toArray()]);
            }
        }
    }

    public function update_providers(Request $request, $id)
    {
        if ($request->ajax()) {
            if ($request->action == "update") {
                $validator = Validator::make($request->all(), [
                    'banner' => 'required',
                    'name_ar' => 'required:custom_users|max:255',
                    'name_en' => 'required:custom_users|max:255',
                    'company_ar' => 'required:custom_users|max:255',
                    'company_en' => 'required:custom_users|max:255',
                ], [
                    'banner.required' => trans('customusers.Provider-Banner-is-required'),
                    'name_ar.required' => trans('customusers.Arabic-Service-name-is-required'),
                    'name_en.required' => trans('customusers.English-Service-name-is-required'),
                    'company_ar.required' => trans('customusers.Arabic-company-name-is-required'),
                    'company_en.required' => trans('customusers.English-company-name-is-required'),
                ]);


                if ($validator->passes()) {
                    $data = CustomUser::query()->find($id);
                    $banner = $request->banner;
                    $data->banner = $banner;
                    $data->banner = $banner;
                    $data->name = ['en' => $request->name_en, 'ar' => $request->name_ar];
                    $data->company_name = ['en' => $request->company_en, 'ar' => $request->company_ar];
                    $data->email = $request->email;
                    $data->phone = $request->phone;
                    $data->website_name = $request->website_name;
                    $data->website_url = $request->website_url;
                    $data->updated_at = Carbon::now();
                    $data->save();
                    /* $update = Activity::query()->find($id)->update([
                         'name' => $request->name,
                         'description' => $request->description,
                         'status' => $request->status,
                     ]);*/
                    if ($data)
                        return response()->json(['success' => trans('customusers.Save-update-succeeded')]);
                    else
                        return response()->json(['error' => trans('customusers.Save-update-failed')]);
                }
                return response()->json(['error' => $validator->errors()->toArray()]);
            }
        }
    }

    public function destroy(Request $request, $id)
    {
        if ($request->ajax()) {
            $customuser = CustomUser::query()->find($id);
            if ($customuser->delete()) {
                return response()->json(['success' => trans('customusers.Remove-succeeded')]);
            }
            return response()->json(['error' => trans('customusers.Remove-failed')]);
        }
    }


}

