<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\ActivityType;
use App\Models\Contact;
use Illuminate\Http\Request;
use Inertia\Inertia;


class ActivitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activities = Activity::with('contact', 'account', 'type')->get();
        return response()->view('activities.index', compact('activities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Contact $contact=null)
    {
        ddd($contact);
        $activitytypes = ActivityType::all();
        $contacts = Contact::all();
        return Inertia::render(
            'Activities/Create', [
                'activitytypes' => $activitytypes,
                'contacts' => $contacts,
                'contact' => $contact,
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $activity = Activity::create($request->all());
        return redirect()->route('contact.show', $request->contact_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function show(Activity $activity)
    {
        $activity->load('owner', 'account', 'contact');
        return response()->view('activities.show', compact('activity'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function edit(Activity $activity)
    {

        $thisactivitytype = ActivityType::get()->where('id', $activity->activity_type_id);
        $activitytypes = ActivityType::all();
        return Inertia::render(
            'Activities/Edit', [
                'activity' => $activity,
                'thisactivitytype' => $thisactivitytype,
                'activitytypes' => $activitytypes
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Activity $activity)
    {
        $activity->update(request()->all());
        return redirect()->route('contact.show')->withMessage('Activity updated');
    }

    /**
     * Remove the specified resource from storage.
     * 
     * @param Activity $activity [description]
     * 
     * @return redirect             [return to contact]
     */
    public function destroy(Activity $activity)
    {
        $activity->delete();
        return redirect()->route('contact.show', $activity->contact_id)->withMessage('Activity deleted');

    }

    public function contactActivity(Contact $contact)
    {
        // dd($contact);
        $contacts = Contact::all();
        $activitytypes = ActivityType::all();
        // return response()->view('contacts.addactivity', compact('contact', 'activitytypes'));
        return Inertia::render(
            'Activities/Create', [
                'activitytypes' => $activitytypes,
                'selected_contact' => $contact->id,
                'contacts' => $contacts,
            ]
        );
    }
}
