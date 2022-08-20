<?php

namespace App\Http\Controllers;

use App\Http\Requests\BankAccount\StoreBankAccountRequest;
use App\Http\Requests\BankAccount\UpdateBankAccountRequest;
use App\Models\Bank;
use App\Models\BankAccount;
use App\Models\Currency;
use App\Models\Organization;
use Illuminate\Http\Request;

class BankAccountController extends Controller
{
    public function index()
    {
        $bankAccounts = BankAccount::paginate(5);
        return view('bankAccounts.index', ['bankAccounts' => $bankAccounts]);
    }

    public function create()
    {
        $banks = Bank::all();
        $currencies = Currency::all();
        return view('bankAccounts.create', ['banks'=>$banks, 'currencies' => $currencies]);
    }

    public function store(StoreBankAccountRequest $request)
    {
        $organization = Organization::first();
        BankAccount::create($request->validated() + ['organization_id' => $organization->id]);
        return redirect()->route('bankAccounts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BankAccount  $bankAccount
     * @return \Illuminate\Http\Response
     */
    public function show(BankAccount $bankAccount)
    {
        return ['bankAccount' => $bankAccount, 'currency_bankAccount' => $bankAccount->currency];
    }

    public function edit(BankAccount $bankAccount)
    {
        $banks = Bank::all();
        $currencies = Currency::all();
        return view('bankAccounts.edit', ['bankAccount' => $bankAccount, 'banks'=>$banks, 'currencies' => $currencies]);
    }

    public function update(UpdateBankAccountRequest $request, BankAccount $bankAccount)
    {
        $organization = Organization::first();
        $bankAccount->update($request->validated() + ['organization_id' => $organization->id]);
        return redirect()->route('bankAccounts.index');
    }

    public function destroy(BankAccount $bankAccount)
    {
        $bankAccount->delete();
        return redirect()->route('bankAccounts.index');
    }
}
