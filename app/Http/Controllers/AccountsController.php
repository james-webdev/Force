<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Request;
use Inertia\Inertia;
use App\Models\Contact;
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
        $accounts = new AccountResource(
            Account::withCount('contacts', 'openOpportunities')
                ->with('owner')
                ->filter(request('search'))
                ->paginate(5)
        );

        return Inertia::render(
            'Accounts/Index', [
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

        Account::create($request->all());
        return redirect()->route('account.index');
    }

    /**
     * [show description]
     * 
     * @param Account $account [description]
     * 
     * @return [type]           [description]
     */
    public function show(Account $account)
    {
        
        $account->load('openOpportunities', 'owner', 'contacts.recentActivities.type');

        $recentActivities = $account->contacts->map(
            function ($contact) use ($account) {
                return ['contact'=>$contact->fullName(), 'activities'=>$contact->recentActivities];
            }
        );
               
        return response()->view('accounts.show', compact('account', 'recentActivities'));
    }

    /**
     * [edit description]
     * 
     * @param Account $account [description]
     * 
     * @return [type]           [description]
     */
    public function edit(Account $account)
    {

        $contacts = Account::with('contacts')->get()->where('id', $account->id);
   
        return Inertia::render(
            'Accounts/Edit', [
                'account' => $account,
                'update_url' => URL::route('account.edit', $account),
                'contacts' => $contacts,
            ]
        );
    }

    /**
     * [update description]
     * 
     * @param Account $account [description]
     * @param Request $request [description]
     * 
     * @return [type]           [description]
     */
    public function update(Account $account, Request $request)
    {

        $account->update(request()->all());
        return redirect()->route('account.index');
    }

    /**
     * [destroy description]
     * 
     * @param Account $account [description]
     * 
     * @return [type]           [description]
     */
    public function destroy(Account $account)
    {

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
