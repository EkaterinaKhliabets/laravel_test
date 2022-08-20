<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactFace\StoreContactFaceRequest;
use App\Http\Requests\ContactFace\UpdateContactFaceRequest;
use App\Models\Client;
use App\Models\ContactFace;
use Illuminate\Http\Request;

class ContactFaceController extends Controller
{
    public function index()
    {
        $contactFaces = ContactFace::paginate(5);
        return view('contactFaces.index', ['contactFaces' => $contactFaces]);
    }

    public function create()
    {
        $clients = Client::all();
        return view('contactFaces.create', ['clients' => $clients]);
    }

    public function store(StoreContactFaceRequest $request)
    {
        ContactFace::create($request->validated());

        return redirect()->route('contact_faces.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ContactFace  $contactFace
     * @return \Illuminate\Http\Response
     */
    public function show(ContactFace $contactFace)
    {
        //
    }

    public function edit(ContactFace $contactFace)
    {
        $clients = Client::all();

        return view('contactFaces.edit', ['contactFace' => $contactFace, 'clients' => $clients]);
    }

    public function update(UpdateContactFaceRequest $request, ContactFace $contactFace)
    {
        $contactFace->update($request->validated());
        return redirect()->route('contact_faces.index');
    }

    public function destroy(ContactFace $contactFace)
    {
        $contactFace->delete();
        return redirect()->route('contact_faces.index');
    }
}
