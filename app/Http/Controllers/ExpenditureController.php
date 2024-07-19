<?php
namespace App\Http\Controllers;

use App\Expenditure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

class ExpenditureController extends Controller
{
    public function index()
    {
        $expenditures = Expenditure::where('user_id', Auth::id())->orderByDesc('date')->get();
        return view('expenditures.index', compact('expenditures'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'type' => 'required|string|max:255',
            'amount' => 'required|numeric',
        ]);

        Expenditure::create([
            'user_id' => Auth::id(),
            'date' => $request->date,
            'type' => $request->type,
            'amount' => $request->amount,
        ]);

        return redirect()->route('expenditures.index')->with('success', 'Expenditure added successfully.');
    }

    public function destroy(Expenditure $expenditure)
    {
        $this->authorize('delete', $expenditure);
        $expenditure->delete();
        return redirect()->route('expenditures.index')->with('success', 'Expenditure deleted successfully.');
    }

    public function analysis()
    {
        $userId = Auth::id();
        $expenditures = Expenditure::where('user_id', $userId)->get();

        $expenditureTypes = $expenditures->groupBy('type')->map(function ($row) {
            return [
                'sum' => $row->sum('amount'),
                'count' => $row->count(),
            ];
        });

        $labels = $expenditureTypes->keys()->toArray();
        $sumData = $expenditureTypes->pluck('sum')->toArray();
        $countData = $expenditureTypes->pluck('count')->toArray();

        $barChart = app()->chartjs
            ->name('barChart')
            ->type('bar')
            ->size(['width' => 400, 'height' => 200])
            ->labels($labels)
            ->datasets([
                [
                    'label' => 'Total Amount',
                    'backgroundColor' => 'rgba(38, 185, 154, 0.31)',
                    'borderColor' => 'rgba(38, 185, 154, 0.7)',
                    'data' => $sumData,
                ],
            ])
            ->options([
                'responsive' => true,
                'plugins' => [
                    'title' => [
                        'display' => true,
                        'text' => 'Total Expenditure Amount by Type'
                    ]
                ]
            ]);

        $pieChart = app()->chartjs
            ->name('pieChart')
            ->type('pie')
            ->size(['width' => 400, 'height' => 200])
            ->labels($labels)
            ->datasets([
                [
                    'label' => 'Total Amount',
                    'backgroundColor' => [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                    ],
                    'borderColor' => [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                    ],
                    'data' => $sumData,
                ],
            ])
            ->options([
                'responsive' => true,
                'plugins' => [
                    'title' => [
                        'display' => true,
                        'text' => 'Expenditure Amount Distribution'
                    ]
                ]
            ]);

        return view('expenditures.analysis', compact('expenditureTypes', 'barChart', 'pieChart'));
    }
}
