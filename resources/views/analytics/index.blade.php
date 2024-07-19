@extends('profile.profile-layout')

@section('profile')
    <div class="container">
        <h1>Expenditure Analysis</h1>

        <h2>Total Expenditures</h2>
        <ul>
            <li>Shopping: ${{ number_format($shoppingTotal, 2) }}</li>
            <li>Repair: ${{ number_format($repairTotal, 2) }}</li>
            <li>Medical: ${{ number_format($medicalTotal, 2) }}</li>
            <li>Emergency: ${{ number_format($emergencyTotal, 2) }}</li>
        </ul>

        <h2>Expenditure Details</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Type</th>
                    <th>Amount</th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach ($expenditures as $expenditure)
                    <tr>
                        <td>{{ $expenditure->date }}</td>
                        <td>{{ $expenditure->type }}</td>
                        <td>${{ number_format($expenditure->amount, 2) }}</td>
                       
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
