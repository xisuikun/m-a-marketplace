<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Deal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ListingController extends Controller
{
    //
    public function create()
    {
        return view('listings.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'company_name' => 'required|string|max:255',
            'industry' => 'required|string|max:255',
            'description' => 'required|string',
            'deal_title' => 'required|string|max:255',
            'asking_price' => 'required|numeric|min:0',
            'revenue_annual' => 'required|numeric|min:0',
            'ebitda' => 'required|numeric|min:0',
            'is_confidential' => 'boolean',
        ]);

        // 1. Create Company
        $company = Company::create([
            'user_id' => Auth::id(),
            'name' => $request->company_name,
            'industry' => $request->industry,
            'description' => $request->description,
        ]);

        // 2. Create Deal
        Deal::create([
            'company_id' => $company->id,
            'title' => $request->deal_title,
            'teaser' => $request->description, // Using description as initial teaser
            'asking_price' => $request->asking_price,
            'revenue_annual' => $request->revenue_annual,
            'ebitda' => $request->ebitda,
            'status' => 'active',
            'is_confidential' => $request->has('is_confidential'),
        ]);

        return redirect('/dashboard')->with('success', 'Your business listing has been published!');}
}

