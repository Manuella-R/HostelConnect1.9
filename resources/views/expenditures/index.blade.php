@extends('profile.profile-layout')

@section('profile')
<div class="container">
    <h1 class="my-4">Expenditures</h1>
    
    <!-- Success message -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Add Expenditure Form -->
    <div class="card mb-4">
        <div class="card-header">
            Add New Expenditure
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('expenditures.store') }}">
                @csrf
                <div class="form-group">
                    <label for="date">Date</label>
                    <input type="date" class="form-control" id="date" name="date" required>
                </div>
                <div class="form-group">
    <label for="type">Type</label>
    <select class="form-control" id="type" name="type" required>
        <option value="shopping">Shopping</option>
        <option value="repair">Repair</option>
        <option value="medical">Medical</option>
        <option value="emergency">Emergency</option>
    </select>
</div>

                <div class="form-group">
                    <label for="amount">Amount</label>
                    <input type="number" class="form-control" id="amount" name="amount" required>
                </div>
                <button type="submit" class="btn btn-primary">Add Expenditure</button>
            </form>
        </div>
    </div>

    <!-- Expenditures List -->
    <div class="card">
        <div class="card-header">
            Expenditures List
        </div>
        <div class="card-body">
            @if ($expenditures->isEmpty())
                <p>No expenditures found.</p>
            @else
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Type</th>
                            <th>Amount</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($expenditures as $expenditure)
                            <tr>
                                <td>{{ $expenditure->date }}</td>
                                <td>{{ $expenditure->type }}</td>
                                <td>{{ $expenditure->amount }}</td>
                                <td>
                                    <form action="{{ route('expenditures.destroy', $expenditure->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this expenditure?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>
@endsection
