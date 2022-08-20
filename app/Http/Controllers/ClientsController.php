<?php

namespace App\Http\Controllers;

use App\Http\Filters\ClientFilter;
use App\Http\Requests\Client\FilterClientRequest;
use App\Http\Requests\Client\StoreClientRequest;
use App\Http\Requests\Client\UpdateClientRequest;
use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientsController extends Controller
{
    public function index(FilterClientRequest $request)
    {
        $data = $request->validated();
        $filter = app()->make(ClientFilter::class, ['queryParams' => array_filter($data)]);

        if (Auth::user()->is_admin) {
            $clients = Client::filter($filter)->paginate(9);
        } else {
            $clients = Client::where('user_id', Auth::user()->id)->paginate(9);
        }

        $users = User::all();
        $user_id = $request->user_id;

        //dd($clients);

        //$clients = Client::paginate(3);

        return view('clients.index', ['clients' => $clients, 'users' => $users, 'user_id' => $user_id]);
    }

    public function create()
    {
        $users = User::not_valid()->get();

        return view('clients.create', ['users' => $users]);
    }

    public function store(StoreClientRequest $request)
    {
        $client = Client::create($request->validated());

        return redirect()->route('clients.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Client $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    public function edit(Client $client)
    {
        $users = User::all();
        return view('clients.edit', ['client' => $client, 'users' => $users]);
    }

    public function update(UpdateClientRequest $request, Client $client)
    {
        $client->update($request->validated());
        return redirect()->route('clients.index');
    }

    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->route('clients.index');
    }
}
