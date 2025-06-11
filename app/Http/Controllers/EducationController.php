<?php

namespace App\Http\Controllers;

use App\Models\Education;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function index() {}
    public function create()
    {
        $userProfiles = UserProfile::select('id', 'name')->get();
        return view('userEducation.create', compact('userProfiles'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:user_profiles,id',
            'degree' => 'required|string|max:255',
            'institution' => 'required|string|max:255',
            'field_of_study' => 'nullable|string|max:255',
            'grade' => 'nullable|string|max:50',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ]);

        $educationDetails = [
            'degree' => $request->degree,
            'institution' => $request->institution,
            'field_of_study' => $request->field_of_study,
            'grade' => $request->grade,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ];

        try {
            $education = Education::create([
                'user_id' => $request->user_id,
                'education_details' => $educationDetails,
            ]);

            if ($education) {
                return redirect()->back()
                    ->withInput([])
                    ->with('success', 'Education details added successfully.');
            } else {
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'Failed to add education details.');
            }
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
}
