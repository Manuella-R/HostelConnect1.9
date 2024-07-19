@extends('profile.profile-layout')

@section('profile')
<div class="container">
    <h1>Expenditure Analysis</h1>

    <div class="row">
        <div class="col-md-6">
            <div>
                {!! $barChart->render() !!}
            </div>
        </div>
        <div class="col-md-6">
            <div>
                {!! $pieChart->render() !!}
            </div>
        </div>
    </div>

    <h2>Expenditure Summary</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Type</th>
                <th>Total Amount</th>
                <th>Count</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($expenditureTypes as $type => $data)
                <tr>
                    <td>{{ $type }}</td>
                    <td>{{ $data['sum'] }}</td>
                    <td>{{ $data['count'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
