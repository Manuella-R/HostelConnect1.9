@extends('profile.profile-layout')
@section('profile')
 <div class="card">
	<div class="card-header">Update Profile</div>
	<div class="card-body">
		<form action="{{route('update_profile')}}" id="edit_profile_form" method="post">
			@csrf
			@method('PUT')
			 <div class="form-group">
			    <label for="first_name">First Name</label>
			    <input type="text" name="first_name" value="{{(old('first_name'))?old('first_name'):$user->first_name}}"  class="form-control" id="first_name"  placeholder="Enter first name">
        	   @if($errors->any('first_name'))
				<span class="text-danger">{{$errors->first('first_name')}}</span>
			   @endif
			  </div>
			  <div class="form-group ">
			    <label for="last_name">Last Name</label>
			    <input type="text" value="{{(old('last_name'))?old('last_name'):$user->last_name}}"  name="last_name" class="form-control" id="last_name" placeholder="Enter last name">
          	   @if($errors->any('last_name'))
				<span class="text-danger">{{$errors->first('last_name')}}</span>
			   @endif
			  </div>
			  <div class="form-group">
			    <label for="Schoolname">School Name</label>
			    <input type="text" name="Schoolname" value="{{(old('Schoolname'))?old('Schoolname'):$user->Schoolname}}"  class="form-control" id="Schoolname"  placeholder="Enter your school name">
        	   @if($errors->any('Schoolname'))
				<span class="text-danger">{{$errors->first('Schoolname')}}</span>
			   @endif
			  </div>
			  <div class="form-group">
			    <label for="AdmNo">Admission number</label>
			    <input type="text" name="AdmNo" value="{{(old('AdmNo'))?old('AdmNo'):$user->AdmNo}}"  class="form-control" id="first_name"  placeholder="Enter first name">
        	   @if($errors->any('AdmNo'))
				<span class="text-danger">{{$errors->first('AdmNo')}}</span>
			   @endif
			  </div>
			  <div class="form-group">
			    <label for="DOB">Date of Birth</label>
			    <input type="text" name="DOB" value="{{(old('DOB'))?old('DOB'):$user->DOB}}"  class="form-control" id="DOB"  placeholder="Enter first name">
        	   @if($errors->any('DOB'))
				<span class="text-danger">{{$errors->first('DOB')}}</span>
			   @endif
			  </div>
	
		    <button type="submit" class="btn btn-primary">Update</button>
		</form>

	</div>

</div>
<script>
$(document).ready(function() {
        $(".datepicker").datepicker({
            dateFormat: 'yy-mm-dd', // Format the date as YYYY-MM-DD
            changeMonth: true, // Allow changing the month
            changeYear: true, // Allow changing the year
            yearRange: "1900:2100" // Specify the year range
        });
    });
</script>

@endsection