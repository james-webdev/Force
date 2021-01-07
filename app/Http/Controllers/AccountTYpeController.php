<?php

namespace App\Http\Controllers;

use App\Models\AccountType;
use Illuminate\Http\Request;

class AccountTypeController extends Controller
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
<<<<<<< Updated upstream
     * @return \Illuminate\Http\Response
=======
     * @return view [description]
>>>>>>> Stashed changes
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
<<<<<<< Updated upstream
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
=======
     * @param AccountTypeRequest $request [description]
     *
     * @return [type]                      [description]
>>>>>>> Stashed changes
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
<<<<<<< Updated upstream
     * @param  \App\Models\AccountTYpe  $accountTYpe
     * @return \Illuminate\Http\Response
=======
     * @param AccountType $accountType [description]
     *
     * @return [type]                   [description]
>>>>>>> Stashed changes
     */
    public function show(AccountTYpe $accountTYpe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
<<<<<<< Updated upstream
     * @param  \App\Models\AccountTYpe  $accountTYpe
     * @return \Illuminate\Http\Response
=======
     * @param AccountType $accountType [description]
     *
     * @return [view]                   [description]
>>>>>>> Stashed changes
     */
    public function edit(AccountTYpe $accountTYpe)
    {
        //
    }

    /**
<<<<<<< Updated upstream
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AccountTYpe  $accountTYpe
     * @return \Illuminate\Http\Response
=======
     * Update the specified resource in storage
     *
     * @param AccountTypeRequest $request     [description]
     * @param AccountType        $accountType [description]
     *
     * @return [type]                          [description]
>>>>>>> Stashed changes
     */
    public function update(Request $request, AccountTYpe $accountTYpe)
    {
        //
    }

    /**
<<<<<<< Updated upstream
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AccountTYpe  $accountTYpe
     * @return \Illuminate\Http\Response
=======
     * Remove specified resource from storage
     *
     * @param AccountType $accountType [description]
     *
     * @return [type]                   [description]
>>>>>>> Stashed changes
     */
    public function destroy(AccountTYpe $accountTYpe)
    {
        //
    }
}
