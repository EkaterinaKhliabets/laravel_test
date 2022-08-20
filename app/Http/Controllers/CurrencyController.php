<?php

namespace App\Http\Controllers;

use App\Http\Requests\Currency\StoreCurrencyRequest;
use App\Http\Requests\Currency\UpdateCurrencyRequest;
use App\Models\Currency;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    public function index()
    {
        $currencies = Currency::paginate(5);
        return view('currencies.index', ['currencies' => $currencies]);
    }

    public function create()
    {
        return view('currencies.create');
    }

    public function store(StoreCurrencyRequest $request)
    {
        Currency::create($request->validated());

        return redirect()->route('currencies.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function show(Currency $currency)
    {
        //
    }

    public function edit(Currency $currency)
    {
        return view('currencies.edit', ['currency' => $currency]);
    }

    public function update(UpdateCurrencyRequest $request, Currency $currency)
    {
        $currency->update($request->validated());
        return redirect()->route('currencies.index');
    }

    public function destroy(Currency $currency)
    {
        $currency->delete();
        return redirect()->route('currencies.index');
    }
}
