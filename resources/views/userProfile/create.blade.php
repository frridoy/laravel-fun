<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Custom User</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        body {
            background: linear-gradient(to right, #ece9e6, #ffffff);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .card {
            border-radius: 15px;
        }

        .card-header {
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
            background: linear-gradient(to right, #007bff, #00c6ff);
        }

        .card-header h4 {
            margin: 0;
        }

        .form-label {
            font-weight: 600;
        }

        .form-control {
            border-radius: 10px;
        }

        .btn-success {
            background-color: #28a745;
            border: none;
            border-radius: 10px;
            padding: 10px 25px;
        }

        .btn-success:hover {
            background-color: #218838;
        }

        .section-title {
            border-bottom: 1px solid #ddd;
            margin-bottom: 15px;
            padding-bottom: 5px;
            font-size: 18px;
            font-weight: 600;
            color: #555;
        }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">

            <div class="card shadow">
                <div class="card-header text-white text-center">
                    <h4>Create User Profile</h4>
                </div>
                <div class="card-body px-5 py-4">

                    @if(session('success'))
                        <div class="alert alert-success text-center">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('user-profiles.store') }}" method="POST">
                        @csrf

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="name" class="form-label">Full Name</label>
                                <input type="text" name="name" id="name" class="form-control" required>
                            </div>

                            <div class="col-md-6">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" name="email" id="email" class="form-control" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="text" name="phone" id="phone" class="form-control" required>
                            </div>
                        </div>

                        <div class="section-title">Address Details</div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="city" class="form-label">City</label>
                                <input type="text" name="city" id="city" class="form-control" required>
                            </div>

                            <div class="col-md-6">
                                <label for="area_name" class="form-label">Area Name</label>
                                <input type="text" name="area_name" id="area_name" class="form-control" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="road_name" class="form-label">Road Name</label>
                                <input type="text" name="road_name" id="road_name" class="form-control" required>
                            </div>

                            <div class="col-md-6">
                                <label for="house_name" class="form-label">House Name/Number</label>
                                <input type="text" name="house_name" id="house_name" class="form-control" required>
                            </div>
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-success">Save User</button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
