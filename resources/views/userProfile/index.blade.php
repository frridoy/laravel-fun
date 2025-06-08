<!DOCTYPE html>
<html>
<head>
    <title>User Profiles</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">All User Profiles</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>City</th>
                <th>Area</th>
                <th>Road</th>
                <th>House</th>
            </tr>
        </thead>
        <tbody>
        @foreach($userProfiles as $key => $userProfile)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $userProfile->name }}</td>
                <td>{{ $userProfile->email }}</td>
                <td>{{ $userProfile->phone }}</td>
                <td>{{ $userProfile->address['city'] }}</td>
                <td>{{ $userProfile->address['area_name'] }}</td>
                <td>{{ $userProfile->address['road_name'] }}</td>
                <td>{{ $userProfile->address['house_name'] }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
