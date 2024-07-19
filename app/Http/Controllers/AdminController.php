<?php

namespace App\Http\Controllers;

use App\Hostel;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function showCharts()
    {
        // Data for bar chart
        $hostelCounts = [
            'Constant Water Supply' => Hostel::where('constant_water_supply', true)->count(),
            'Private Security' => Hostel::where('private_security', true)->count(),
            'Parking Space' => Hostel::where('parking_space', true)->count(),
            'Caretaker' => Hostel::where('caretaker', true)->count(),
        ];

        $barLabels = array_keys($hostelCounts);
        $barData = array_values($hostelCounts);

        $barChart = app()
            ->chartjs->name('HostelFeaturesChart')
            ->type('bar')
            ->size(['width' => 400, 'height' => 200])
            ->labels($barLabels)
            ->datasets([
                [
                    'label' => 'Number of Hostels',
                    'backgroundColor' => ['rgba(75, 192, 192, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(255, 206, 86, 0.2)', 'rgba(153, 102, 255, 0.2)'],
                    'borderColor' => ['rgba(75, 192, 192, 1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)', 'rgba(153, 102, 255, 1)'],
                    'data' => $barData
                ]
            ])
            ->options([
                'plugins' => [
                    'title' => [
                        'display' => true,
                        'text' => 'Hostel Features'
                    ]
                ]
            ]);

        // Data for line chart
        $hostels = Hostel::all();
        $lineLabels = $hostels->pluck('name')->toArray();
        $lineData = $hostels->pluck('rent')->toArray();
        $averageRent = $hostels->avg('rent');

        $lineChart = app()
            ->chartjs->name('HostelRentChart')
            ->type('line')
            ->size(['width' => 400, 'height' => 200])
            ->labels($lineLabels)
            ->datasets([
                [
                    'label' => 'Rent (Kenya Shillings)',
                    'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                    'borderColor' => 'rgba(54, 162, 235, 1)',
                    'data' => $lineData
                ]
            ])
            ->options([
                'plugins' => [
                    'title' => [
                        'display' => true,
                        'text' => 'Hostel Rents'
                    ]
                ]
            ]);

        // Pass additional data to the view
        return view('admin.charts', compact('barChart', 'lineChart', 'hostelCounts', 'averageRent'));
    }
}
