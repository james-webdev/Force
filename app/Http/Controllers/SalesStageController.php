<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SalesStageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->view('stages.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('stages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        SalesStage::create(request()->all());
        return redirect()->route('stages.index')->withMessage("Stage Created");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(SalesStage $stage)
    {
        return response()->view('stages.show', compact('stage'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(SalesStage $stage)
    {
        return response()->view('stages.edit', compact('stage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SalesStage $stage)
    {
        $stage->update(request()->all());
        return redirect()->route('stages.index')->withMessage("Stage Updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SalesStage $stage)
    {
        $stage->loadCount('opportunities');
        if ($stage->opporunities_count == 0) {
            $stage->delete();
            return redirect()->route('stages.index')->withMessage("Stage Deleted");
        }
        return redirect()->back()->withMessage("There are " .$stage->opportunities_count. " opportunities associated the " . $stage->stage . " stage");
    }
}
