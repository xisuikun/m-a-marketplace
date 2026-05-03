<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        if ($user->role === 'seller') {
            $companies = $user->companies()->with('deals')->get();
            return view('dashboard.seller', compact('companies'));
        }

        if ($user->role === 'buyer') {
            $offers = $user->offers()->with('deal.company')->get();
            $ndas = $user->ndas()->with('deal.company')->get();
            return view('dashboard.buyer', compact('offers', 'ndas'));
        }

        return view('dashboard.admin');
    }
}
