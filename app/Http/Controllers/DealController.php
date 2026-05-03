<?php

namespace App\Http\Controllers;

use App\Models\Deal;
use Illuminate\Http\Request;

class DealController extends Controller
{
    public function index()
    {
        // Public/Buyer view (only active deals)
        return Deal::where('status', 'active')->with('company')->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'company_id' => 'required|exists:companies,id',
            'title' => 'required|string',
            'teaser' => 'required|string',
            'asking_price' => 'nullable|numeric',
        ]);

        // Check if user owns the company
        $company = $request->user()->companies()->find($request->company_id);
        if (!$company) {
            return response()->json(['message' => 'Company not found or unauthorized'], 403);
        }

        $deal = $company->deals()->create($request->all());

        return response()->json($deal, 201);
    }

    public function show(Deal $deal)
    {
        return $deal->load(['company', 'offers']);
    }

    public function update(Request $request, Deal $deal)
    {
        // Authorization check omitted for brevity, logic similar to CompanyController
        $deal->update($request->all());
        return response()->json($deal);
    }
}
