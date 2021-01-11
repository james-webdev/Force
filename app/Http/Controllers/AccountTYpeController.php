<?php

namespace App\Http\Controllers;

use App\Models\AccountType;
use App\Http\Requests\AccountTypeRequest;
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
        return response()->view('accounttypes.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return view [description]
     */
    public function create()
    {
        return response()->view('accounttypes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AccountTypeRequest $request [description]
     *
     * @return [type]                      [description]
     */
    public function store(AccountTypeRequest $request)
    {
        $accountType = AccountType::create(request()->all());
        return redirect()->route('accounttypes.index')->withMessage('Account type created');
    }

    /**
     * Display the specified resource.
     *
     * @param AccountType $accountType [description]
     *
     * @return [type]                   [description]
     */
    public function show(AccountType $accounttype)
    {
       
        return response()->view('accounttypes.show', compact('accounttype'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param AccountType $accountType [description]
     *
     * @return [view]                   [description]
     */
    public function edit(AccountType $accountType)
    {
        return response()->view('accounttypes.edit', compact($accountType));
    }

    /**
     * Update the specified resource in storage
     *
     * @param AccountTypeRequest $request     [description]
     * @param AccountType        $accountType [description]
     *
     * @return [type]                          [description]
     */
    public function update(AccountTypeRequest $request, AccountType $accountType)
    {
        $accountType = $accounttype->update(request()->all());
        return redirect()->route('accounttypes.index')->withMessage('Account type created');
    }

    /**
     * Remove specified resource from storage
     *
     * @param AccountType $accountType [description]
     *
     * @return [type]                   [description]
     */
    public function destroy(AccountType $accountType)
    {
        $accountType->loadCount('accounts');
        if (! $accountType->accounts_count ==0) {
            $accountType->delete();
            return redirect()->route('accounttypes.index')->withMessage('Account type deleted');

        } else {
            return redirect()->back()
                ->withError('Cannot delete account type as ' .$accounttype->accounts->count() . ' accounts are associated with this type');
        }
    }
}
