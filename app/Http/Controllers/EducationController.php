<?php

namespace App\Http\Controllers;

use App\Models\Education;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function index()
    {

        $educations = Education::with('user:id,name')->get();
        return view('userEducation.index', compact('educations'));
    }
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
            'field_of_study' => 'required|string|max:255',
            'grade' => 'required|string|max:50',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
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
    public function edit($id)
    {
        $education = Education::findorFail($id);
        $userProfiles = UserProfile::select('id', 'name')->get();
        return view('userEducation.create', compact('education', 'userProfiles'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required|exists:user_profiles,id',
            'degree' => 'required|string|max:255',
            'institution' => 'required|string|max:255',
            'field_of_study' => 'required|string|max:255',
            'grade' => 'required|string|max:50',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
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
            $education = Education::findOrFail($id);
            $education->update([
                'user_id' => $request->user_id,
                'education_details' => $educationDetails,
            ]);

            return redirect()->route('user-educations.index')
                ->with('success', 'Education details updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
}
