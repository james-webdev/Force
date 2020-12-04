<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\ActivityType;
use App\Models\Contact;
use Illuminate\Http\Request;
use Inertia\Inertia;


class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $activitytypes = ActivityType::all();
        $contacts = Contact::all();
        return Inertia::render('Activities/Create', [
            'activitytypes' => $activitytypes,
            'contacts' => $contacts
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());
        $activity = Activity::create($request->all());
        // dd($activity);
    //   $contact->accounts()->attach(request('account'));
      return redirect()->route('contact.edit', $request->contact_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function show(Activity $activity)
    {
        // dd($activity);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function edit(Activity $activity)
    {
        // dd($activity);
        $thisactivitytype = ActivityType::get()->where('id', $activity->activity_type_id);
        $activitytypes = ActivityType::all();
        return Inertia::render('Activities/Edit', [
            'activity' => $activity,
            'thisactivitytype' => $thisactivitytype,
            'activitytypes' => $activitytypes
        ]);
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
        return redirect()->route('contact.show');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Activity $activity)
    {
        $activity->delete();
        // dd($activity->contact_id);
        return redirect()->route('contact.show', $activity->contact_id);

        // $contact = Contact::where('id', $activity->contact_id)->get();
        // // $contact->load('activities');
        // // dd($contact);
        // $activitytypes = Activity::with('type')->get()->where('contact_id', $activity->contact_id);

        //    return Inertia::render('Contacts/Show', [
        //        'contact' => $contact,
        //        'activitytypes' => $activitytypes,
        //    ]);
    }

    public function contactActivity(Contact $contact)
    {
        // dd($contact);
        $contacts = Contact::all();
        $activitytypes = ActivityType::all();
        // return response()->view('contacts.addactivity', compact('contact', 'activitytypes'));
        return Inertia::render('Activities/Create', [
            'activitytypes' => $activitytypes,
            'selected_contact' => $contact->id,
            'contacts' => $contacts,
        ]);
    }
}
