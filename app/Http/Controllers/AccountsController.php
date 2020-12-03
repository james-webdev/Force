<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Request;
use Inertia\Inertia;
use App\Imports\AccountsImport;
use Excel;
use URL;
use App\Http\Resources\AccountResource;




class AccountsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $accounts = new AccountResource(Account::withCount('contacts')->filter(request('search'))->paginate(5));
        // $filteredAccounts = Account::all(Request::only('search'));
        // dd($accounts);
        return Inertia::render('Accounts/Index', [
            'filters' => Request::all('search'),
            'accounts' => $accounts,
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
        // dd('hi there');
        return Inertia::render('Accounts/Create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        Account::create($request->all());
        return redirect()->route('account.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Accounts  $accounts
     * @return \Illuminate\Http\Response
     */
    public function show(Account $account)
    {
        $contacts = Account::with('contacts')->get()->where('id', $account->id);
        //   $contacts = Account::find(1)->contacts;
            return Inertia::render('Accounts/Show', [
                'account' => $account,
                'update_url' => URL::route('account.edit', $account),
                'contacts' => $contacts,
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Accounts  $accounts
     * @return \Illuminate\Http\Response
     */
    public function edit(Account $account)
    {

        $contacts = Account::with('contacts')->get()->where('id', $account->id);
    //   $contacts = Account::find(1)->contacts;
        return Inertia::render('Accounts/Edit', [
            'account' => $account,
            'update_url' => URL::route('account.edit', $account),
            'contacts' => $contacts,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Accounts  $accounts
     * @return \Illuminate\Http\Response
     */
    public function update(Account $account, Request $request)
    {

        $account->update(request()->all());
        return redirect()->route('account.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Accounts  $accounts
     * @return \Illuminate\Http\Response
     */
    public function destroy(Account $account, Request $request)
    {
        // dd($request->id);

        $account->delete();
        return redirect()->route('account.index');
    }


    public function importForm()
    {
        return Inertia::render('Accounts/Import');
    }

    public function import(Request $request)
    {
       $path = $request->file('import_file');
       $data = Excel::import(new AccountsImport, $path);
       return redirect()->route('account.index');
    }
}
