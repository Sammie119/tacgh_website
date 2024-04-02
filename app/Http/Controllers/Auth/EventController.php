<?php

namespace App\Http\Controllers\Auth;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\VWEvent;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = VWEvent::all();
        return view('auth.events.index', ['events' => $events]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        Validator::make($request->all(), [
            'name' => ['required', 'max:255'],
            'description' => ['required', 'max:255'],
            'start_date' => ['required', 'date'],
            'end_date' => ['nullable','date'],
            'start_time' => ['date_format:H:i'],
            'venue' => ['required', 'max:255'],
            'file' => ['nullable', 'image', 'mimes:jpg,jpeg,png,gif,svg'],
        ])->validate();

        $data = [
            'name' => "Event",
            'description' => "Event",
            'file' => $request['file'],
            'width' => 600,
            'height' => 600,
        ];

        $asset = 1;
        if ($request->has('file')){
            $asset = $this->save_asset_image($data);

            $asset = $asset->id;
        }

        Event::firstOrCreate(
            [
                'name' => $request['name'],
                'start_date' => $request['start_date']
            ],
            [
                'description' => $request['description'],
                'asset_id' => $asset,
                'venue' => $request['venue'],
                'end_date' => empty($request['end_date']) ? $request['start_date'] : $request['end_date'],
                'start_time' => $request['start_time'],
                'created_by' => get_logged_in_user_id(),
                'updated_by' => get_logged_in_user_id(),
            ]
        );

        return redirect('events')->with('success','Events Added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $event = Event::find($id);
        return view('auth.events.create', ['event' => $event]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());
        Validator::make($request->all(), [
            'name' => ['required', 'max:255'],
            'description' => ['required', 'max:255'],
            'start_date' => ['required', 'date'],
            'end_date' => ['nullable','date'],
            // 'start_time' => ['date_format:H:i'],
            'venue' => ['required', 'max:255'],
            'file' => ['nullable', 'image', 'mimes:jpg,jpeg,png,gif,svg'],
        ])->validate();

        $event = Event::find($id);

        $data = [
            'name' => "Event",
            'description' => "Event",
            'file' => $request['file'],
            'width' => 600,
            'height' => 600,
        ];

        $this->update_asset_image($event->asset_id, $data);

        $event->update(
            [
                'name' => $request['name'],
                'start_date' => $request['start_date'],
                'description' => $request['description'],
                'asset_id' => $event->asset_id,
                'venue' => $request['venue'],
                'end_date' => empty($request['end_date']) ? $request['start_date'] : $request['end_date'],
                'start_time' => $request['start_time'],
                'updated_by' => get_logged_in_user_id(),
            ]
        );

        return redirect('events')->with('success','Events Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $event = Event::find($id);

        $event->delete();

        return back()->with('success','Event Deleted successfully');
    }
}
