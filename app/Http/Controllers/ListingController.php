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
            'location' => 'required|string|max:255',
            'description' => 'required|string',
            'deal_title' => 'required|string|max:255',
            'deal_type' => 'required|string',
            'asking_price' => 'required|numeric|min:0',
            'revenue_annual' => 'required|numeric|min:0',
            'ebitda' => 'required|numeric|min:0',
            'net_profit' => 'nullable|numeric',
            'is_confidential' => 'boolean',
        ]);

        // 1. Create Company
        $company = Company::create([
            'user_id' => Auth::id(),
            'name' => $request->company_name,
            'industry' => $request->industry,
            'location' => $request->location,
            'description' => $request->description,
        ]);

        // 2. Create Deal
        Deal::create([
            'company_id' => $company->id,
            'title' => $request->deal_title,
            'teaser' => $request->description, // Using description as initial teaser
            'deal_type' => $request->deal_type,
            'location' => $request->location,
            'asking_price' => $request->asking_price,
            'revenue_annual' => $request->revenue_annual,
            'ebitda' => $request->ebitda,
            'net_profit' => $request->net_profit ?? 0,
            'status' => 'submitted', // Under review automatically
            'is_confidential' => $request->has('is_confidential'),
        ]);

        return redirect('/dashboard')->with('success', 'Your business listing has been submitted and is under review!');
    }

    public function edit(Deal $deal)
    {
        // Ensure the user owns the deal
        if ($deal->company->user_id !== Auth::id()) {
            abort(403);
        }

        $deal->load('company');
        return view('listings.edit', compact('deal'));
    }

    public function update(Request $request, Deal $deal)
    {
        // Ensure the user owns the deal
        if ($deal->company->user_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'company_name' => 'required|string|max:255',
            'industry' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'description' => 'required|string',
            'deal_title' => 'required|string|max:255',
            'deal_type' => 'required|string',
            'asking_price' => 'required|numeric|min:0',
            'revenue_annual' => 'required|numeric|min:0',
            'ebitda' => 'required|numeric|min:0',
            'net_profit' => 'nullable|numeric',
            'is_confidential' => 'boolean',
        ]);

        // 1. Update Company
        $deal->company->update([
            'name' => $request->company_name,
            'industry' => $request->industry,
            'location' => $request->location,
            'description' => $request->description,
        ]);

        // 2. Update Deal
        $deal->update([
            'title' => $request->deal_title,
            'teaser' => $request->description,
            'deal_type' => $request->deal_type,
            'location' => $request->location,
            'asking_price' => $request->asking_price,
            'revenue_annual' => $request->revenue_annual,
            'ebitda' => $request->ebitda,
            'net_profit' => $request->net_profit ?? 0,
            'is_confidential' => $request->has('is_confidential'),
        ]);

        return redirect('/dashboard')->with('success', 'Your business listing has been updated!');
    }
}

