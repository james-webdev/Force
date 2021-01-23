<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Request;
use Inertia\Inertia;
use App\Models\Contact;
use App\Imports\AccountsImport;
use App\Models\AccountType;
use App\Models\Industry;
use App\Http\Requests\AccountFormRequest;
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

        return response()->view('accounts.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $industries = Industry::orderBy('industry')->pluck('industry', 'id')->toArray();

        $accounttypes  = AccountType::orderBy('type')->pluck('type', 'id')->toArray();
        return response()->view('accounts.create', compact('industries', 'accounttypes'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AccountFormRequest $request)
    {
        $data = request()->all();
        $data['user_id'] = auth()->user()->id;
        $account = Account::create($data);
        return redirect()->route('account.show', $account->id)->withMessage('Account created');;
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
        $account = Account::withLastActivityId()
            ->totalBusiness()
            ->with('openOpportunities.stage', 'owner', 'lastActivity')
            ->withCount('opportunities', 'wonOpportunities', 'openOpportunities')
            ->findOrFail($account->id);

        return response()->view('accounts.show', compact('account'));
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
        
        if ($account->user_id !== auth()->user()->id) {
            return redirect()->back()->withWarning("Unauthorized to edit. You are not the owner");
        }
        $industries = Industry::orderBy('industry')->pluck('industry', 'id')->toArray();

        $accounttypes  = AccountType::orderBy('type')->pluck('type', 'id')->toArray();
        //contacts = Account::with('contacts')->get()->where('id', $account->id);

        return response()->view('accounts.edit', compact('account', 'industries', 'accounttypes'));
    }

    /**
     * [update description]
     *
     * @param Account $account [description]
     * @param Request $request [description]
     *
     * @return [type]           [description]
     */
    public function update(Account $account, AccountFormRequest $request)
    {

        $account->update(request()->all());
        return redirect()->route('account.show', $account->id)->withMessage('Account updated');
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
