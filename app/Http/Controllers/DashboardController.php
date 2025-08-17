<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\TopupRequest;
use App\Models\BalanceHistory;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class DashboardController extends Controller
{
    /**
     * Display the user dashboard.
     */
    public function index()
    {
        $user = Auth::user();
        
        // Get recent transactions (empty for now)
        $recentTransactions = collect();

        // Get recent top-ups (empty for now)
        $recentTopups = collect();

        // Get balance history (empty for now)
        $balanceHistory = collect();

        // Calculate statistics (default values for now)
        $stats = [
            'total_transactions' => 0,
            'successful_transactions' => 0,
            'total_spent' => 0,
            'total_topups' => 0,
            'referral_count' => $user->referrals()->count(),
        ];

        return Inertia::render('dashboard', [
            'user' => $user,
            'recentTransactions' => $recentTransactions,
            'recentTopups' => $recentTopups,
            'balanceHistory' => $balanceHistory,
            'stats' => $stats,
        ]);
    }
}