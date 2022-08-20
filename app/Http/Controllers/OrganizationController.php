<?php

namespace App\Http\Controllers;

use App\Http\Requests\Organization\UpdateOrganizationRequest;
use App\Models\Organization;
use App\Models\Setting;


class OrganizationController extends Controller
{
    public function index()
    {
        $organization = Organization::first();

        return view('organization.index', ['organization' => $organization]);
        /*
        это больше подходит для настроек
        $settings = Setting::first();
        $organization = $settings->organization;
        // return  dd($organization->unp);
        return view('organization.index', ['name' => $organization->name, 'unp' => $organization->unp,
            'address' => $organization->address, 'phone' => $organization->phone, 'email' => $organization->email]);
        */
    }

    public function update(UpdateOrganizationRequest $request, Organization $organization)
    {
        if ($request->get('id') == null)
        {
            $organization = Organization::create($request->all());
        }
        else{
            $organization = Organization::find($request->get('id'));
            $organization->update($request->validated());
        }
        return redirect()->route('organization.index');
    }
}
