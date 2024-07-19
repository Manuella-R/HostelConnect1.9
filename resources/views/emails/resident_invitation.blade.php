<!DOCTYPE html>
<html>
<head>
    <title>Resident Invitation</title>
</head>
<body>
    <h1>Hello, {{ $user->name }}</h1>
    <p>You have been invited to join the hostel {{ $hostel->name }}.</p>
    <p>Please click the link below to accept the invitation:</p>
    <a href="{{ route('accept_invitation', ['token' => $token]) }}">Accept Invitation</a>
    <p>If you do not expect this invitation, you can ignore this email.</p>
</body>
</html>
