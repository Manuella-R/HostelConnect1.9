@extends('layout.main-layout')
@section('body')
 <div class="row mb-3">
     <form action="{{route('postRegister')}}" method="POST" class="col-md-6 col-xs-12 offset-md-3 auth-form"  id="regitration_form">
     	  @csrf
          <div class="form-title">
             SIGN UP
          </div>
     	   <div class="row">
	     	  <div class="form-group">
			    <label for="HO_name">Caretaker Name</label>
			    <input type="text" class="form-control" value="{{old('HO_name')}}" name="HO_name" id="HO_name" placeholder="Full Name">
				@if($errors->any('HO_name'))
					<span class="text-danger">{{$errors->first('HO_name')}}</span>
				@endif
			  </div>
     	   </div>
		  <div class="form-group">
		    <label for="HO_email">Email address</label>
		    <input type="email" class="form-control" value="{{old('HO_email')}}" id="HO_email" name="HO_email" aria-describedby="emailHelp" placeholder="Enter email">
		    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
			@if($errors->any('HO_email'))
				<span class="text-danger">{{$errors->first('HO_email')}}</span>
			@endif
		  </div>
		  <div class="form-group">
		    <label for="Password">Password</label>
		    <input type="Password" class="form-control" name="Password" autocomplete="false" id="Password" placeholder="Password">
			@if($errors->any('Password'))
				<span class="text-danger">{{$errors->first('Password')}}</span>
			@endif
		  </div>

		  <div class="form-group">
		    <label for="confirm_password">Confirm Password</label>
		    <input type="password" class="form-control" name="confirm_password" autocomplete="false" id="confirm_password" placeholder="Confirm Password">
			@if($errors->any('confirm_password'))
				<span class="text-danger">{{$errors->first('confirm_password')}}</span>
			@endif
		  </div>
		  
	     	  <div class="form-group">
			    <label for="Phone_number">Phone Number</label>
			    <input type="text" class="form-control" value="{{old('Phone_number')}}" name="Phone_number" id="Phone_number" placeholder="School Name">
			    @if($errors->any('Phone_number'))
					<span class="text-danger">{{$errors->first('Phone_number')}}</span>
				@endif
			 	   	
		   <div class="form-check">
		    <input type="checkbox" {{(old('terms'))?'checked':''}} name="terms" id="terms" class="form-check-input" >
		    <label class="form-check-label" for="terms_check">Check our <a href="#">terms</a> and <a href="#">conditions</a></label>

		  </div>
		  <div id="terms_error"></div>
			@if($errors->any('terms'))
				<span class="text-danger">{{$errors->first('terms')}}</span>
			@endif
		   
		   <div><button type="submit" class="btn btn-primary mt-2">Submit</button>&nbsp; Already have an account <a href="">sign in</a> here</div>
	</form>	
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