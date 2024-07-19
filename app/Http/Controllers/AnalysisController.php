<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Analysis;

class AnalysisController extends Controller
{
    public function index()
    {
        // Fetch data for analytics
        $expenditures = Analysis::with('hostel')
            ->orderBy('date')
            ->get();

        // Calculate totals for each type
        $shoppingTotal = $expenditures->where('type', 'shopping')->sum('amount');
        $repairTotal = $expenditures->where('type', 'repair')->sum('amount');
        $medicalTotal = $expenditures->where('type', 'medical')->sum('amount');
        $emergencyTotal = $expenditures->where('type', 'emergency')->sum('amount');

        // Pass data to view
        return view('analytics.index', [
            'expenditures' => $expenditures,
            'shoppingTotal' => $shoppingTotal,
            'repairTotal' => $repairTotal,
            'medicalTotal' => $medicalTotal,
            'emergencyTotal' => $emergencyTotal,
        ]);
    }
}
