<?php

namespace App\Http\Controllers;

use App\Models\ProductTransaction;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Handle the incoming dashboard request.
     */
    public function __invoke(Request $request): View
    {
        $user = $request->user();

        $baseQuery = ProductTransaction::query()
            ->when(!$user->hasRole('owner'), fn ($query) => $query->where('user_id', $user->id));

        $recentTransactions = (clone $baseQuery)
            ->with(['user'])
            ->withCount('transactionDetails')
            ->latest()
            ->take(5)
            ->get();

        $transactionStats = [
            'total' => (clone $baseQuery)->count(),
            'success' => (clone $baseQuery)->where('is_paid', true)->count(),
            'pending' => (clone $baseQuery)->where('is_paid', false)->count(),
        ];

        return view('dashboard', [
            'user' => $user,
            'recentTransactions' => $recentTransactions,
            'transactionStats' => $transactionStats,
            'showCustomerColumn' => $user->hasRole('owner'),
        ]);
    }
}
