<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Educations</title>
</head>

<body>
    <table class="table table-bordered table-hover mt-5">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Degree</th>
                <th>Institution</th>
                <th>Field of Study</th>
                <th>Grade</th>
                <th>Start Date</th>
                <th>End Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($educations as $education)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $education->user->name }}</td>
                    <td>{{ $education->education_details['degree'] }}</td>
                    <td>{{ $education->education_details['institution'] }}</td>
                    <td>{{ $education->education_details['field_of_study'] }}</td>
                    <td>{{ $education->education_details['grade'] }}</td>
                    <td>{{ $education->education_details['start_date'] }}</td>
                    <td>{{ $education->education_details['end_date'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
