<!DOCTYPE html>
<html>
<head>
    <title>Hostel Application</title>
</head>
<body>
    <h1>Hostel Application from {{ $details['user']->name }}</h1>
    <p><strong>Email:</strong> {{ $details['user']->email }}</p>
    <p><strong>Hostel Name:</strong> {{ $details['hostel']->name }}</p>
    <p><strong>Full name:</strong></p>
    <p>{{ $details['name'] }}</p>
    <p><strong>Gender:</strong></p>
    <p>{{ $details['gender'] }}</p>
    <p><strong>University:</strong></p>
    <p>{{ $details['University'] }}</p>
    <p><strong>Personality Description:</strong></p>
    <p>{{ $details['personality'] }}</p>
    <p><strong>Neighbour Expectations:</strong></p>
    <p>{{ $details['expectations'] }}</p>
    <p>Looking forward hearing a favourable response from you soon</p>
</body>
</html>
