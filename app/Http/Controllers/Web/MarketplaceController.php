<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Deal;
use Illuminate\Http\Request;

class MarketplaceController extends Controller
{
    public function index(Request $request)
    {
        $query = Deal::where('status', 'active')->with('company');

        // Search Filter
        if ($request->filled('search')) {
            $query->where('title', 'like', "%{$request->search}%");
        }

        // Industry Filter
        if ($request->filled('industry')) {
            $query->whereHas('company', function ($q) use ($request) {
                $q->where('industry', $request->industry);
            });
        }

        // Location Filter (In this schema location is on Deal or Company?)
        // Let's assume on Deal based on model $fillable
        if ($request->filled('location')) {
            $query->whereHas('company', function ($q) use ($request) {
                $q->where('location', 'like', "%{$request->location}%");
            });
        }

        $deals = $query->latest()->paginate(9)->withQueryString();

        return view('marketplace', compact('deals'));
    }
}
