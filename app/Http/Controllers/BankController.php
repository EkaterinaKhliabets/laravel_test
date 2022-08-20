<?php

namespace App\Http\Controllers;

use App\Http\Requests\Bank\StoreBankRequest;
use App\Http\Requests\Bank\UpdateBankRequest;
use App\Models\Bank;
use Illuminate\Http\Request;

class BankController extends Controller
{

    public function index()
    {
        $banks = Bank::paginate(5);
        return view('banks.index', ['banks' => $banks]);
    }

    public function create()
    {
        return view('banks.create');
    }

    public function store(StoreBankRequest $request)
    {
        Bank::create($request->validated());

        return redirect()->route('banks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Bank $bank
     * @return \Illuminate\Http\Response
     */
    public function show(Bank $bank)
    {
        //
    }

    public function edit(Bank $bank)
    {
        return view('banks.edit', ['bank' => $bank]);
    }

    public function update(UpdateBankRequest $request, Bank $bank)
    {
        $bank->update($request->validated());
        return redirect()->route('banks.index');
    }

    public function destroy(Bank $bank)
    {
        $bank->delete();
        return redirect()->route("banks.index");
    }
}
