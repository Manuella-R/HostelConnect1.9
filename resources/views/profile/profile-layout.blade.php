@extends('layout.main-layout')

@section('body')
<div class="row">
    <div class="col-md-4">
        <ul class="list-group profile-nav">
            <li class="list-group-item {{ (request()->route()->getName() == 'dashboard') ? 'active' : '' }}"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="list-group-item {{ (request()->route()->getName() == 'edit_profile') ? 'active' : '' }}"><a href="{{ route('edit_profile') }}">Edit Profile</a></li>
            <li class="list-group-item {{ (request()->route()->getName() == 'change_password') ? 'active' : '' }}"><a href="{{ route('change_password') }}">Change Password</a></li>
            
            {{-- Rendered dynamically based on user role --}}
            <li class="list-group-item" data-role="user-info"><a href="{{ route('notifications.view') }}">View Notifications</a></li>
            <li class="list-group-item" data-role="user-info"><a href="{{ route('tickets.index') }}">Post Ticket</a></li>
            <li class="list-group-item" data-role="user-info"><a href="{{ route('payment.form') }}">Pay Rent
                       
                
            </a></li>
     


            <li class="list-group-item" data-role="manage-hostel"><a href="{{ route('manager') }}">Manage Hostel Owners</a></li>
            <li class="list-group-item" data-role="manage-hostel"><a href="{{ route('admin.reviews.flagged-reviews') }}">Manage Comments</a></li>
            <li class="list-group-item" data-role="manage-hostel"><a href="{{ route('showCharts') }}">Hostel Analysis</a></li>

            <li class="list-group-item" data-role="hostel-info"><a href="{{ route('hostel_info') }}">Create/View Hostel Info</a></li>
            <li class="list-group-item" data-role="hostel-info"><a href="{{ route('hostel_info_main') }}">View Hostel Info</a></li>
            <li class="list-group-item" data-role="hostel-info"><a href="{{ route('search_user_form') }}">Add Residents</a></li>
            <li class="list-group-item" data-role="hostel-info"><a href="{{ route('notifications.index') }}">Manage Notifications</a></li>
            <li class="list-group-item" data-role="hostel-info"><a href="{{ route('viewResidents') }}">View Residents</a></li>
            <li class="list-group-item" data-role="hostel-info"><a href="{{ route('tickets.view') }}">View Tickets</a></li>
            <li class="list-group-item" data-role="hostel-info"><a href="{{ route('expenditures.index') }}">Add Expenditures</a></li>
            <li class="list-group-item" data-role="hostel-info"><a href="{{ route('expenditures.analysis') }}">Analysis of Expenditures</a></li>
        </ul>
    </div>
    <div class="col-md-8">
        @yield('profile') {{-- This is where the profile content will be injected --}}
    </div>
</div>

{{-- Debugging --}}
<p style="visibility: hidden;">User Role ID: {{ auth()->check() ? auth()->user()->user_role_id : 'Not logged in' }}</p>
<p style="visibility: hidden;">User is Resident: {{ auth()->check() ? auth()->user()->is_resident : 'Not logged in' }}</p>

{{-- JavaScript to hide/show elements based on user role --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var userRole = {{ auth()->check() ? auth()->user()->user_role_id : '0' }}; // Fetch user role ID
        var isResident = {{ auth()->check() ? auth()->user()->is_resident : '0' }}; // Fetch user is_resident

        // Function to hide elements based on user role and is_resident
        function hideElementsBasedOnUserRoleAndResidentStatus(roleId, residentStatus) {
            var elementsToHide = document.querySelectorAll('.list-group-item');

            elementsToHide.forEach(function(element) {
                var role = element.getAttribute('data-role');

                // Hide elements based on user role and is_resident
                if (roleId == 1 && (role === 'manage-hostel' || role === 'hostel-info')) {
                    element.style.display = 'none';
                } else if (roleId == 2 && (role === 'user-info' || role === 'hostel-info')) {
                    element.style.display = 'none';
                } else if (roleId == 3 && (role === 'user-info' || role === 'manage-hostel')) {
                    element.style.display = 'none';
                } else if (!residentStatus && role === 'user-info') {
                    element.style.display = 'none';
                }
            });
        }

        // Call function based on user role and resident status after DOM loaded
        hideElementsBasedOnUserRoleAndResidentStatus(userRole, isResident);
    });
</script>

@endsection
