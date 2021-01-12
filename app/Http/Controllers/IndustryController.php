<?php

namespace App\Http\Controllers;

use App\Models\Industry;
use Illuminate\Http\Request;
use App\Http\Requests\IndustryFormRequest;

class IndustryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->view('industries.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('industries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(IndustryFormRequest $request)
    {
        Industry::create(request()->all());
        return redirect()->route('industries.index')->withMessage('Industry created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Industry  $industry
     * @return \Illuminate\Http\Response
     */
    public function show(Industry $industry)
    {
         
        return response()->view('industries.show', compact('industry'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Industry  $industry
     * @return \Illuminate\Http\Response
     */
    public function edit(Industry $industry)
    {
        return response()->view('industries.edit', compact('industry'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Industry  $industry
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Industry $industry)
    {
        $industry->updated(reqest()->all());
        return redirect()
            ->route('industries.index')
            ->withMessage("Industry updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Industry  $industry
     * @return \Illuminate\Http\Response
     */
    public function destroy(Industry $industry)
    {
        $industry->loadCount('accounts');
        if ($industry->accounts_count == 0) {
            $industry->delete();
            return redirect()->route('industries.index')->withMessage("Industry deleted");
        } else {
            return redirect()->back()->withMessage('Unable to delete indusutry as '. $industry->accounts_count. ' accounts are associated with this industry');
        }

    }
}
