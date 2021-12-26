<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Event;
use App\Models\EventUser;
use App\Models\SponsoImage;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

/*{{--//TODO::* MOO*MEN* S. ALD*AHDOUH* 12/15/2021 *-- *}}*/

class EventsController extends Controller
{
    public function index()
    {
        $categories = Categories::query()->get();
        $sponsor_images = SponsoImage::query()->get();
        return view("Events.events", compact('categories'));
    }

    public function table(Request $request)
    {
        $events = Event::query()->get();
        if ($request->ajax()) {
            return DataTables::of($events)
                ->addColumn('start', function ($events) {
                    if ($events->start == NULL)
                        return '<p>---</p>';
                    else
                        return '<p>' . $events->start . '</p>';
                })
                ->addColumn('end', function ($events) {
                    if ($events->end == NULL)
                        return '<p>---</p>';
                    else
                        return '<p>' . $events->end . '</p>';
                })
                ->addColumn('type', function ($events) {
                    if ($events->type == 0)
                        return '<p>' . trans('events.External-Event') . '</p>';
                    else
                        return '<p>' . trans('events.Internal-Event') . '</p>';
                })
                ->addColumn('action', function ($events) {
                    $button = '<button data-id="' . $events->id . '" id="delete" class="btn btn-danger btn-sm" title="delete"><i class="fa fa-trash"></i></button>&nbsp;
                           <button data-id="' . $events->id . '" data-type="' . $events->type . '" id="edit" class="btn btn-info btn-sm" title="settings"><i class="fa fa-edit"></i></button>';
                    return $button;
                })
                ->rawColumns(['start'], ['end'], ['type'])
                ->escapeColumns(['action' => 'action'])
                ->make(true);
        }
    }

    public function fetch()
    {
        $events = Event::query()->select('id', 'title', 'start', 'end', 'location', 'description', 'category_fk_id',
            'type', 'sponsors_image', 'details_image', 'photo_gallery', 'video_gallery', 'created_at')->get();
        //$events = Event::all();
        return response()->json($events);
    }

    public function create(Request $request)
    {
        if ($request->ajax()) {
            $event_type = $request->event_type;
            if ($event_type === "0") {
                $validator = Validator::make($request->all(), [
                    'event_key' => 'unique:events,event_key|max:255',
                    'title_ar' => 'required:events,title|max:255',
                    'title_en' => 'required:events,title|max:255',
                    'event_start' => 'required',
                    'event_external_link' => 'required:events,url|url',
                ], [
                    'title_ar.required' => trans('events.Arabic-title-required'),
                    'title_en.required' => trans('events.English-title-required'),
                    'event_start.required' => trans('events.The-date-is-required'),
                    'event_external_link.required' => trans('events.URL-is-required'),
                    'event_external_link.url' => trans('events.Enter-valid-URL'),
                ]);
                if ($validator->passes()) {
                    $event = new Event();
                    $event->title = $request->title_en;
                    $event->description = $request->description_en;
                    $event->start = $request->event_start;
                    $event->end = $request->event_end;
                    $event->location = $request->location;
                    $event->category_fk_id = $request->category;
                    $event->type = $request->event_type;
                    $event->event_key = $request->event_key;
                    $event->url = $request->event_external_link;
                    $event->banner = $request->banner;
                    $event->details_image = $request->details_image;
                    $event->photo_gallery = $request->photo_image;
                    $event->video_gallery = $request->video_image;
                    $event->created_at = Carbon::now();
                    $event->updated_at = Carbon::now();
                    $event->save();
                    $event_fk_id = $event->id;
                    return response()->json(['success' => trans('events.Successfully-create-new-event'), 'event' => $event]);
                } else
                    return response()->json(['error' => $validator->errors()->toArray(), 'langu' => config('app.locale')]);
            } elseif ($event_type === "1") {
                $validatorUser = Validator::make($request->all(), [
                    'event_key' => 'unique:events,event_key|max:255',
                    'title_ar' => 'required:events,title|max:255',
                    'title_en' => 'required:events,title|max:255',
                    'event_start' => 'required',
                    'organizer_ar_name' => 'required:event_user_details,name|max:255',
                    'organizer_en_name' => 'required:event_user_details,name|max:255',
                    'manager_ar_name' => 'required:event_user_details,name|max:255',
                    'manager_en_name' => 'required:event_user_details,name|max:255',
                ], [
                    'title_ar.required' => trans('events.Arabic-title-required'),
                    'title_en.required' => trans('events.English-title-required'),
                    'event_start.required' => trans('events.The-date-is-required'),
                    'organizer_ar_name.required' => trans('events.Arabic-Organizer-name-required'),
                    'organizer_en_name.required' => trans('events.English-Organizer-name-required'),
                    'manager_ar_name.required' => trans('events.Arabic-Manager-name-required'),
                    'manager_en_name.required' => trans('events.English-Manager-name-required'),
                ]);
                if ($validatorUser->passes()) {
                    $event = new Event();
                    $event->title = $request->title_en;
                    $event->description = $request->description_en;
                    $event->start = $request->event_start;
                    $event->end = $request->event_end;
                    $event->location = $request->location;
                    $event->category_fk_id = $request->category;
                    $event->type = $request->event_type;
                    $event->event_key = $request->event_key;
                    $event->url = $request->event_external_link;
                    $event->banner = $request->banner;
                    $event->sponsors_image = "on";
                    $event->details_image = $request->details_image;
                    $event->photo_gallery = $request->photo_image;
                    $event->video_gallery = $request->video_image;
                    $event->created_at = Carbon::now();
                    $event->updated_at = Carbon::now();
                    $event->save();
                    $event_fk_id = $event->id;
                    /*Create orgnizer and manager*/
                    $event->save();
                    $event_organizer = new EventUser();
                    $event_organizer->event_fk_id = $event_fk_id;
                    $event_organizer->name = ['en' => "$request->organizer_en_name", 'ar' => "$request->organizer_ar_name"];
                    $event_organizer->phone = $request->organizer_phone;
                    $event_organizer->email = $request->organizer_email;
                    $event_organizer->website_name = $request->organizer_website_name;
                    $event_organizer->website_url = $request->organizer_website_url;
                    $event_organizer->type = 0;
                    $event_organizer->save();
                    /*Manager*/
                    $event_manager = new EventUser();
                    $event_manager->event_fk_id = $event_fk_id;
                    $event_manager->name = ['en' => "$request->manager_en_name", 'ar' => "$request->manager_ar_name"];
                    $event_manager->phone = $request->manager_phone;
                    $event_manager->email = $request->manager_email;
                    $event_manager->type = 1;
                    $event_manager->save();
                    /*Create Sponsor images*/
                    $sponsors_images_list = $request->sponsors_image;
                    if ($sponsors_images_list != NULL) {
                        foreach ($sponsors_images_list as $sponsors_image) {
                            $image = new SponsoImage();
                            $image->image = $sponsors_image;
                            $image->event_fk_id = $event_fk_id;
                            $image->save();
                        }
                    }
                    return response()->json(['success' => trans('events.Successfully-create-new-event')]);
                }
                return response()->json(['user_error' => $validatorUser->errors()->toArray()]);
            }
            //return response()->json(['error' => 'Failed to create event']);
        }
    }

    /*{{--//TODO:: MOOM*EN S. ALD*AHDOUH 12/15/2021--}}*/
    public function update(Request $request, $id)
    {
        if ($request->ajax()) {
            $event = Event::query()->find($id);
            $event_users = EventUser::query()->where("event_fk_id", $id)->get();
            $event_type = $request->event_type;
            $eventId = $id;
            if ($event_type === "0") {
                $validator = Validator::make($request->all(), [
                    'title_ar' => 'required:events,title|max:255',
                    'title_en' => 'required:events,title|max:255',
                    'event_start' => 'required',
                    'event_external_link' => 'required:events,url|url',
                ], [
                    'title_ar.required' => trans('events.Arabic-title-required'),
                    'title_en.required' => trans('events.English-title-required'),
                    'event_start.required' => trans('events.The-date-is-required'),
                    'event_external_link.required' => trans('events.URL-is-required'),
                    'event_external_link.url' => trans('events.Enter-valid-URL'),
                ]);
                //$event->title = ['en' => $request->title_en, 'ar' => $request->title_ar];
                //$event->description = ['en' => $request->description_en, 'ar' => $request->description_ar];
                if ($validator->passes()) {
                    $event = Event::query()->find($id)->update([
                        'title' => $request->title_en,
                        'description' => $request->description_en,
                        'start' => $request->event_start,
                        'end' => $request->event_end,
                        'location' => $request->location,
                        'category_fk_id' => $request->category,
                        'type' => $request->event_type,
                        'event_key' => $request->event_key,
                        'url' => $request->event_external_link,
                        'details_image' => $request->details_image,
                        'photo_gallery' => $request->photo_image,
                        'video_gallery' => $request->video_image,
                        'updated_at' => Carbon::now(),
                    ]);
                    /*Save event user*/
                    return response()->json(['success' => 'Successfully create new event', 'event' => $event]);
                } else
                    return response()->json(['error' => $validator->errors()->toArray()]);
            } elseif ($event_type === "1") {
                $validatorUser = Validator::make($request->all(), [
                    'title_ar' => 'required:events,title|max:255',
                    'title_en' => 'required:events,title|max:255',
                    'event_start' => 'required',
                    'organizer_ar_name' => 'required:event_user_details,name|max:255',
                    'organizer_en_name' => 'required:event_user_details,name|max:255',
                    'manager_ar_name' => 'required:event_user_details,name|max:255',
                    'manager_en_name' => 'required:event_user_details,name|max:255',
                ], [
                    'title_ar.required' => trans('events.Arabic-title-required'),
                    'title_en.required' => trans('events.English-title-required'),
                    'event_start.required' => trans('events.The-date-is-required'),
                    'organizer_ar_name.required' => trans('events.Arabic-Organizer-name-required'),
                    'organizer_en_name.required' => trans('events.English-Organizer-name-required'),
                    'manager_ar_name.required' => trans('events.Arabic-Manager-name-required'),
                    'manager_en_name.required' => trans('events.English-Manager-name-required'),
                ]);
                if ($validatorUser->passes()) {
                    $event = Event::query()->find($id)->update([
                        'title' => $request->title_en,
                        'description' => $request->description_en,
                        'start' => $request->event_start,
                        'end' => $request->event_end,
                        'location' => $request->location,
                        'category_fk_id' => $request->category,
                        'type' => $request->event_type,
                        'event_key' => $request->event_key,
                        'url' => $request->event_external_link,
                        'details_image' => $request->details_image,
                        'photo_gallery' => $request->photo_image,
                        'video_gallery' => $request->video_image,
                        'updated_at' => Carbon::now(),
                    ]);
                    $event_organizer = EventUser::query()->where("event_fk_id", $eventId)->where('type', '0')->first();
                    //dd($event_organizer);
                    if ($event_organizer) {
                        $event_organizer->update([
                            'name' => ['en' => "$request->organizer_en_name", 'ar' => "$request->organizer_ar_name"],
                            'phone' => $request->organizer_phone,
                            'email' => $request->organizer_email,
                            'website_name' => $request->organizer_website_name,
                            'website_url' => $request->organizer_website_url,
                            'type' => 0,
                        ]);
                        //dd($event_organizer);
                        /*$event_organizer->name = ['en' => "$request->organizer_en_name", 'ar' => "$request->organizer_ar_name"];
                        $event_organizer->phone = $request->organizer_phone;
                        $event_organizer->email = $request->organizer_email;
                        $event_organizer->website_name = $request->organizer_website_name;
                        $event_organizer->website_url = $request->organizer_website_url;
                        $event_organizer->type = 0;
                        $event_organizer->save();*/
                    } else {
                        $event_organizer = new EventUser();
                        $event_organizer->event_fk_id = $eventId;
                        $event_organizer->name = ['en' => "$request->organizer_en_name", 'ar' => "$request->organizer_ar_name"];
                        $event_organizer->phone = $request->organizer_phone;
                        $event_organizer->email = $request->organizer_email;
                        $event_organizer->website_name = $request->organizer_website_name;
                        $event_organizer->website_url = $request->organizer_website_url;
                        $event_organizer->type = 0;
                        $event_organizer->save();
                    }
                    /*Manager*/
                    $event_manager = EventUser::query()->where("event_fk_id", $eventId)->where('type', '1')->first();
                    if ($event_manager) {
                        $event_manager->update([
                            'name' => ['en' => "$request->manager_en_name", 'ar' => "$request->manager_ar_name"],
                            'phone' => $request->manager_phone,
                            'email' => $request->manager_email,
                            'type' => 1,
                        ]);
                        /*$event_manager->name = ['en' => "$request->manager_en_name", 'ar' => "$request->manager_ar_name"];
                        $event_manager->name = $request->manager_en_name;
                        $event_manager->phone = $request->manager_phone;
                        $event_manager->email = $request->manager_email;
                        $event_manager->type = 1;
                        $event_manager->save();*/
                    } else {
                        /*Manager*/
                        $event_manager = new EventUser();
                        $event_manager->event_fk_id = $eventId;
                        $event_manager->name = ['en' => "$request->manager_en_name", 'ar' => "$request->manager_ar_name"];
                        $event_manager->phone = $request->manager_phone;
                        $event_manager->email = $request->manager_email;
                        $event_manager->type = 1;
                        $event_manager->save();
                    }
                    /*Create Sponsor images*/
                    $sponsors_images_list = $request->sponsors_image;
                    // dd($request->sponsors_image);
                    if ($sponsors_images_list != NULL) {
                        foreach ($sponsors_images_list as $sponsors_image) {
                            $image = new SponsoImage();
                            $image->image = $sponsors_image;
                            $image->event_fk_id = $eventId;
                            $image->save();
                        }
                    }
                    return response()->json(['success' => trans('events.Successfully-create-new-event')]);
                }
                return response()->json(['user_error' => $validatorUser->errors()->toArray()]);
            }
            //return response()->json(['error' => 'Failed to create event']);
        }
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $event = Event::find($id);
        return $event;
    }

    public function eventUsers($id)
    {
        $eventUsers = EventUser::query()->where("event_fk_id", $id)->get();
        return $eventUsers;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    public function destroy(Request $request, $id)
    {
        if ($request->ajax()) {
            $event = Event::query()->find($id);
            if ($event->delete()) {
                return response()->json(['success' => trans('events.success-delete')]);
            }
            return response()->json(['error' => trans('events.failed-delete')]);
        }
    }

    public function sponsor_image_destroy(Request $request, $id)
    {
        if ($request->ajax()) {
            $sponsor_image = SponsoImage::query()->find($id);
            if ($sponsor_image->delete()) {
                return response()->json(['success' => trans('events.success-delete')]);
            }
            return response()->json(['error' => trans('events.failed-delete')]);
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
                $path = public_path('uploadsevents/');
                $usersImage = public_path("uploadsevents/{$filename}"); // get previous image from folder
                $upload_success = $data->move($path, $filename);
                return response()->json([
                    'success' => trans('events.Success-Uploaded-banner'),
                    'banner' => $filename
                ]);
            }
        }
        return response()->json(['error' => $validator->errors()->toArray()]);
    }

    public function sponsor_image(Request $request, $id)
    {
        $sponsor_images = SponsoImage::query()->where("event_fk_id", $id)->get();
        return $sponsor_images;
    }
}
