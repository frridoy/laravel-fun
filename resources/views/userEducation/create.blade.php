<div class="education-form-container">
    <h2><i class="fas fa-user-graduate"></i> Add Education</h2>
    <form action="{{ route('user-educations.store') }}" method="POST" class="education-form">
        @csrf
        <div class="form-group">
            <label for="user_id">Select User</label>
            <select name="user_id" id="user_id" required>
                <option value="" disabled selected>Choose a user</option>
                @foreach ($userProfiles as $profile)
                    <option value="{{ $profile->id }}">{{ $profile->id }} - {{ $profile->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="degree">Degree</label>
            <input type="text" name="degree" id="degree" placeholder="e.g. B.Sc in Computer Science" required>
        </div>

        <div class="form-group">
            <label for="institution">Institution</label>
            <input type="text" name="institution" id="institution" placeholder="e.g. University of XYZ" required>
        </div>

        <div class="form-group">
            <label for="field_of_study">Field of Study</label>
            <input type="text" name="field_of_study" id="field_of_study" placeholder="e.g. Software Engineering">
        </div>

        <div class="form-group">
            <label for="grade">Grade</label>
            <input type="text" name="grade" id="grade" placeholder="e.g. 3.8 GPA">
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="start_date">Start Date</label>
                <input type="date" name="start_date" id="start_date">
            </div>

            <div class="form-group">
                <label for="end_date">End Date</label>
                <input type="date" name="end_date" id="end_date">
            </div>
        </div>

        <button type="submit" class="submit-btn">
            <i class="fas fa-save"></i> Save Education
        </button>
    </form>
</div>

<!-- Font Awesome (for icons) -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: #f3f4f6;
        margin: 0;
        padding: 0;
    }

    .education-form-container {
        max-width: 600px;
        margin: 60px auto;
        padding: 35px 30px;
        background: linear-gradient(to right, #f9fafb, #fff);
        border-radius: 12px;
        box-shadow: 0 8px 40px rgba(0, 0, 0, 0.1);
        transition: 0.3s ease-in-out;
    }

    .education-form-container h2 {
        text-align: center;
        margin-bottom: 25px;
        color: #1f2937;
        font-size: 24px;
        font-weight: bold;
    }

    .education-form .form-group {
        margin-bottom: 20px;
    }

    .education-form label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        color: #374151;
    }

    .education-form input[type="text"],
    .education-form input[type="date"],
    .education-form select {
        width: 100%;
        padding: 10px 14px;
        border: 1px solid #d1d5db;
        border-radius: 6px;
        font-size: 15px;
        background-color: #f9fafb;
        transition: border 0.3s, background 0.3s;
    }

    .education-form input:focus,
    .education-form select:focus {
        border-color: #6366f1;
        background: #fff;
        outline: none;
    }

    .form-row {
        display: flex;
        gap: 15px;
    }

    .form-row .form-group {
        flex: 1;
    }

    .submit-btn {
        width: 100%;
        padding: 12px;
        background: #4f46e5;
        color: #fff;
        border: none;
        border-radius: 6px;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        transition: background 0.3s;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }

    select {
        background-color: #f9fafb;
    }
</style>
