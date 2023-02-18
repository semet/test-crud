<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index()
    {
        $accounts = Account::all();
        return view('pages.account', [
            'accounts' => $accounts
        ]);
    }

    public function create()
    {
        return view('pages.account-create');
    }

    public function store(Request $request)
    {
        $data  = $request->validate([
            'username' => 'required',
            'name' => 'required',
            'role' => 'required',
            'password' => 'required'
        ]);

        Account::create($data);

        return redirect()->route('account.page');
    }


    public function edit(Account $account)
    {
        return view('pages.account-edit', ['account' => $account]);
    }

    public function update(Request $request, Account $account)
    {
        $data  = $request->validate([
            'username' => 'required',
            'name' => 'required',
            'role' => 'required',
            'password' => 'required'
        ]);

        $account->update($data);

        return redirect()->route('account.page');
    }

    public function destroy(Account $account)
    {
        $account->delete();

        return back();
    }
}
