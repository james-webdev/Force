<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Account;
use App\Models\Activity;
use App\Models\ActivityType;
use Inertia\Inertia;
use URL;
use Request;
use App\Http\Resources\ContactResource;

class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $contacts = new ContactResource(Contact::with('company')->filter(request('search'))->paginate(5));

        return Inertia::render(
            'Contacts/Index', [
                'filters' => Request::all('search'),
                'contacts' => $contacts,
                'activities' => Activity::all(),
                ]
        );

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Contacts/Create',[
            'accounts' => Account::orderBy('name')->get()
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
        // dd($request->all());
      Contact::create(request()->all());
    //   $contact->accounts()->attach(request('account'));
      return redirect()->route('contact.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contacts
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {

        $contact->load('activities.type', 'company');
       
        //$activitytypes = Activity::with('type')->get()->where('contact_id', $contact->id);

        
        /*return Inertia::render('Contacts/Show', [
            'update_url' => URL::route('contact.show', $contact),
            'contact' => $contact,
            // 'activities' => $contact->activities,
            'activitytypes' => $activitytypes,
        ]);*/
        return response()->view('contacts.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {

     $contact->load('activities');
     $activitytypes = Activity::with('type')->get()->where('contact_id', $contact->id);

        // $activities = Activity::get()->where('contact_id', $contact->id);
        // dd($contact->load('activities'));
        return Inertia::render('Contacts/Edit', [
            'update_url' => URL::route('contact.edit', $contact),
            'contact' => $contact,
            'activities' => $contact->activities,
            'activitytypes' => $activitytypes,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contacts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        $contact->update(request()->all());
        return redirect()->route('contact.show', $contact->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contacts
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('contact.index');
    }
}
