<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Deal;
use Illuminate\Http\Request;

class MarketplaceController extends Controller
{
    public function index(Request $request)
    {
        $query = Deal::where('status', 'published')->with('company');

        // Search Filter (Keyword)
        if ($request->filled('search')) {
            $keyword = "%{$request->search}%";
            $query->where(function ($q) use ($keyword) {
                $q->where('title', 'like', $keyword)
                  ->orWhere('teaser', 'like', $keyword)
                  ->orWhereHas('company', function ($q2) use ($keyword) {
                      $q2->where('name', 'like', $keyword);
                  });
            });
        }

        // Industry Filter
        if ($request->filled('industry')) {
            $query->whereHas('company', function ($q) use ($request) {
                $q->where('industry', $request->industry);
            });
        }

        // Deal Type Filter
        if ($request->filled('deal_type')) {
            $query->where('deal_type', $request->deal_type);
        }

        // Location Filter
        if ($request->filled('location')) {
            $location = "%{$request->location}%";
            $query->where(function ($q) use ($location) {
                $q->where('location', 'like', $location)
                  ->orWhereHas('company', function ($q2) use ($location) {
                      $q2->where('location', 'like', $location);
                  });
            });
        }

        // Price Range Filter
        if ($request->filled('min_price')) {
            $query->where('asking_price', '>=', $request->min_price);
        }
        if ($request->filled('max_price')) {
            $query->where('asking_price', '<=', $request->max_price);
        }

        $deals = $query->latest()->paginate(9)->withQueryString();

        return view('marketplace', compact('deals'));
    }
}
