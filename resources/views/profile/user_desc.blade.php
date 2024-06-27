@extends('profile.profile-layout')
@section('profile')
<div class="card">
  <div class="card-header">
    Update Profile
  </div>
  <div class="card-body">
    <form action="{{ route('updateUserinfo') }}" id="update_profile_form" method="post">
    @csrf
    @method('PUT')
      <div class="form-group">
        <label for="first_name">First Name</label>
        <input type="text" name="first_name" value="{{ old('first_name', $user->first_name ?? '') }}" class="form-control" id="first_name" placeholder="Enter first name">
        @if($errors->has('first_name'))
          <span class="text-danger">{{ $errors->first('first_name') }}</span>
        @endif
      </div>
      <div class="form-group">
        <label for="last_name">Last Name</label>
        <input type="text" name="last_name" value="{{ old('last_name', $user->last_name ?? '') }}" class="form-control" id="last_name" placeholder="Enter last name">
        @if($errors->has('last_name'))
          <span class="text-danger">{{ $errors->first('last_name') }}</span>
        @endif
      </div>
      <!-- Additional fields from user_desc table -->
      <div class="form-group">
        <label for="gender">Gender</label>
        <input type="text" name="gender" value="{{ old('gender', $UserDescription->gender?? '') }}" class="form-control" id="gender" placeholder="Enter gender">
        @if($errors->has('gender'))
          <span class="text-danger">{{ $errors->first('gender') }}</span>
        @endif
      </div>
      <div class="form-group">
        <label for="age">Age</label>
        <input type="number" name="age" value="{{ old('age', $UserDescription->age ?? '') }}" class="form-control" id="age" placeholder="Enter age">
        @if($errors->has('age'))
          <span class="text-danger">{{ $errors->first('age') }}</span>
        @endif
      </div>
      <div class="form-group">
        <label for="current_year_of_university">Current Year of University</label>
        <input type="text" name="current_year_of_university" value="{{ old('current_year_of_university', $UserDescription->current_year_of_university ?? '') }}" class="form-control" id="current_year_of_university" placeholder="Enter current year of university">
        @if($errors->has('current_year_of_university'))
          <span class="text-danger">{{ $errors->first('current_year_of_university') }}</span>
        @endif
      </div>
      <div class="form-group">
        <label for="personality">Personality</label>
        <textarea name="personality" value="{{ old('personality', $UserDescription->personality ?? '') }}" class="form-control" id="personality" placeholder="Describe your personality"></textarea>
        @if($errors->has('personality'))
          <span class="text-danger">{{ $errors->first('personality') }}</span>
        @endif
      </div>
      <div class="form-group">
        <label for="neighbor_expectations">Neighbor Expectations</label>
        <textarea name="neighbor_expectations"  value="{{ old('neighbor_expectations', $UserDescription->neighbor_expectations ?? '') }}"class="form-control" id="neighbor_expectations" placeholder="Describe your neighbor expectations"></textarea>
        @if($errors->has('neighbor_expectations'))
          <span class="text-danger">{{ $errors->first('neighbor_expectations') }}</span>
        @endif
      </div>
      <div class="form-group">
        <label for="self_description">Self Description</label>
        <textarea name="self_description" value="{{ old('self_description',  $UserDescription->self_description ?? '') }}" class="form-control" id="self_description" placeholder="Describe yourself"></textarea>
        @if($errors->has('self_description'))
          <span class="text-danger">{{ $errors->first('self_description') }}</span>
        @endif
      </div>
      <div class="form-group">
        <label for="additional_info">Additional Info</label>
        <textarea name="additional_info" value="{{ old('additional_info', $UserDescription->additional_info ?? '') }}" class="form-control" id="additional_info" placeholder="Additional information"></textarea>
        @if($errors->has('additional_info'))
          <span class="text-danger">{{ $errors->first('additional_info') }}</span>
        @endif
      </div>
      <button type="submit" class="btn btn-primary">Update Profile</button>
    </form>
  </div>
</div>
@endsection
