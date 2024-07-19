@extends('profile.profile-layout')

@section('profile')
<body>
  
    <div style="width:75%;">
        <h2>Hostel Features</h2>
        {!! $barChart->render() !!}
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Feature</th>
                    <th>Number of Hostels</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($hostelCounts as $feature => $count)
                    <tr>
                        <td>{{ $feature }}</td>
                        <td>{{ $count }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div style="width:75%;">
        <h2>Hostel Rents</h2>
        {!! $lineChart->render() !!}
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Average Rent</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>KSH {{ number_format($averageRent, 2) }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
@endsection
