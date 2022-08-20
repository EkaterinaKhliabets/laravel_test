<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use App\Models\Setting;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $settings = Setting::first();
        $organization = $settings->organization;
       // return  dd($organization->unp);
        return view('organization.index', ['name' => $organization->name, 'unp' => $organization->unp,
            'address' => $organization->address, 'phone' => $organization->phone, 'email' => $organization->email]);
    }
}
