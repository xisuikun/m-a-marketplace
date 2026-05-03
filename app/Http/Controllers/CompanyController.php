<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index(Request $request)
    {
        // Sellers can see their own companies
        if ($request->user()->isSeller()) {
            return $request->user()->companies()->get();
        }
        
        // Admins can see all
        if ($request->user()->isAdmin()) {
            return Company::all();
        }

        return response()->json(['message' => 'Unauthorized'], 403);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'industry' => 'required|string',
            'description' => 'nullable|string',
        ]);

        $company = $request->user()->companies()->create($request->all());

        return response()->json($company, 201);
    }

    public function show(Company $company)
    {
        return $company->load(['deals', 'seller']);
    }

    public function update(Request $request, Company $company)
    {
        if ($request->user()->id !== $company->user_id && !$request->user()->isAdmin()) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $company->update($request->all());

        return response()->json($company);
    }
}
