<!DOCTYPE html>
<html>
<head>
    <title>New Consultation Request</title>
</head>
<body>
    <h1>New Consultation Request</h1>
    <p><strong>First Name:</strong> {{ $data['first_name'] }}</p>
    <p><strong>Last Name:</strong> {{ $data['last_name'] }}</p>
    @if(!empty($data['company_name']))
        <p><strong>Company Name:</strong> {{ $data['company_name'] }}</p>
    @endif
    <p><strong>Business Phone:</strong> {{ $data['business_phone'] }}</p>
    <p><strong>Business Email:</strong> {{ $data['business_email'] }}</p>
    <p><strong>Services:</strong> {{ $data['services'] }}</p>
    <p><strong>Start Time:</strong> {{ $data['start_time'] }}</p>
    <p><strong>Team Members:</strong> {{ $data['team_members'] }}</p>
    <p><strong>Outsourcing Journey:</strong> {{ $data['outsourcing_journey'] }}</p>
    @if(!empty($data['additional_info']))
        <p><strong>Additional Info:</strong> {{ $data['additional_info'] }}</p>
    @endif
</body>
</html>
