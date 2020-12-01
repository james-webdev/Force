<?php

namespace App\Http\Controllers;

use App\Models\ActivityType;
use Illuminate\Http\Request;

class ActivityTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $activityTypes = ActivityType::withCount('activities')->get();
       return Inertia::render('ActivityType/Index', [
        'activitytypes' => $activityTypes,
    ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('ActivityType/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ActivityType::create(request()->all());
        return redirect()->route('activitytype.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ActivityType  $activityType
     * @return \Illuminate\Http\Response
     */
    public function show(ActivityType $activityType)
    {
         $activityType->loadCount('activities');
         return Inertia::render('ActivityType/Show', [
            'activitytype' => $activityType,
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ActivityType  $activityType
     * @return \Illuminate\Http\Response
     */
    public function edit(ActivityType $activityType)
    {
        return Inertia::render('ActivityType/Edit', [
            'activitytype' => $activityType,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ActivityType  $activityType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ActivityType $activityType)
    {
        $activityType->update(request()->all());
        return redirect()->route('activitytype.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ActivityType  $activityType
     * @return \Illuminate\Http\Response
     */
    public function destroy(ActivityType $activityType)
    {
        $activityType->delete();
        return redirect()->route('activitytype.index');
    }
}
