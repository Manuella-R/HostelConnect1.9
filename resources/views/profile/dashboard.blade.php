@extends('profile.profile-layout')
@section('profile')
<div class="card">
  <div class="card-header">
    Dashboard
  </div>
  <div class="card-body">
    <h5 class="card-title">Welcome to your profile {{ $user->first_name }}</h5>

    <table class="table">
      <thead>
        <tr>
          <th scope="col">Field</th>
          <th scope="col">Value</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>First Name</td>
          <td>{{ $user->first_name }}</td>
        </tr>
        <tr>
          <td>Last Name</td>
          <td>{{ $user->last_name }}</td>
        </tr>
        <tr>
          <td>Email</td>
          <td>{{ $user->email }}</td>
        </tr>
        <tr>
          <td>Gender</td>
          <td>{{ $userDescription->gender }}</td>
        </tr>
        <tr>
          <td>Age</td>
          <td>{{ $userDescription->age }}</td>
        </tr>
        <tr>
          <td>Current Year of University</td>
          <td>{{ $userDescription->current_year_of_university }}</td>
        </tr>
        <tr>
          <td>Personality</td>
          <td>{{ $userDescription->personality }}</td>
        </tr>
        <tr>
          <td>Neighbor Expectations</td>
          <td>{{ $userDescription->neighbor_expectations }}</td>
        </tr>
        <tr>
          <td>Self Description</td>
          <td>{{ $userDescription->self_description }}</td>
        </tr>
        <tr>
          <td>Additional Info</td>
          <td>{{ $userDescription->additional_info }}</td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
@endsection
