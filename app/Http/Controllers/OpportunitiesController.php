<?php

namespace App\Http\Controllers;

use App\Models\Opportunity;
use App\Models\Account;
use Illuminate\Http\Request;
use App\Models\SalesStage;
use App\Http\Requests\OpportunityFormRequest;

class OpportunitiesController extends Controller
{
    
    public $opportunity;
    /**
     * [__construct description]
     * 
     * @param Opportunity $opportunity [description]
     */
    public function __construct(Opportunity $opportunity)
    {
        $this->opportunity = $opportunity;


    }
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->view('opportunities.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Account $account = null)
    {
        $stages = SalesStage::all()->pluck('stage', 'id')->toArray();
        return response()->view('opportunities.create', compact('account', 'stages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OpportunityFormRequest $request)
    {
        $user_id = auth()->user()->id;
  
        $opportunity = Opportunity::create(array_merge(request()->all(), ['user_id'=>$user_id]));

        return redirect()->route('account.show', request('account_id'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Opportunity  $opportunity
     * @return \Illuminate\Http\Response
     */
    public function show(Opportunity $opportunity)
    {

        $opportunity->load('owner', 'account');
        $statuses = $this->opportunity->statuses;
        

        return response()->view('opportunities.show', compact('opportunity', 'statuses'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Opportunity  $opportunity
     * @return \Illuminate\Http\Response
     */
    public function edit(Opportunity $opportunity)
    {
        $opportunity->load('owner', 'account');
        $stages = SalesStage::all()->pluck('stage', 'id')->toArray();
        return response()->view('opportunities.edit', compact('opportunity', 'stages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Opportunity  $opportunity
     * @return \Illuminate\Http\Response
     */
    public function update(OpportunityFormRequest $request, Opportunity $opportunity)
    {
        $opportunity->update(request()->all());
        return redirect()->route('opportunity.show', $opportunity->id)->withMessage('opportunity updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Opportunity  $opportunity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Opportunity $opportunity)
    {
        $account = $opportunity->account_id;
        $opportunity->delete();
        return redirect()->route('account.show', $accont)->withMessage('opportunity deleted');
    }
}
