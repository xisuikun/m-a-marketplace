<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Deal;
use App\Models\Nda;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        if ($user->role === 'seller') {
            $companies = $user->companies()->with('deals')->get();
            
            // Calculate simple progress
            $isVerified = $user->is_verified;
            $hasCompany = $companies->count() > 0;
            $hasDeal = false;
            foreach ($companies as $c) {
                if ($c->deals->count() > 0) {
                    $hasDeal = true;
                    break;
                }
            }
            
            $progress = 0;
            if ($isVerified) $progress += 33;
            if ($hasCompany) $progress += 33;
            if ($hasDeal) $progress += 34;

            return view('dashboard.seller', compact('companies', 'progress', 'isVerified', 'hasCompany', 'hasDeal'));
        }

        if ($user->role === 'buyer') {
            $offers = $user->offers()->with('deal.company')->get();
            $ndas = $user->ndas()->with('deal.company')->get();
            $suggestedDeal = Deal::where('status', 'published')->inRandomOrder()->first();
            $bookmarkedDeals = $user->bookmarkedDeals()->with('company')->get();
            
            return view('dashboard.buyer', compact('offers', 'ndas', 'suggestedDeal', 'bookmarkedDeals'));
        }

        if ($user->role === 'admin') {
            $totalUsers = User::count();
            $activeDeals = Deal::where('status', 'published')->count();
            $pendingKyc = User::where('is_verified', false)->count();
            $ndasSigned = Nda::where('status', 'signed')->count();
            $pendingDeals = Deal::where('status', 'under_review')->with('company.seller')->get();
            
            return view('dashboard.admin', compact('totalUsers', 'activeDeals', 'pendingKyc', 'ndasSigned', 'pendingDeals'));
        }

        return view('dashboard.admin');
    }
}
