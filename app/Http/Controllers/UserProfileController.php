<?php

namespace App\Http\Controllers;

use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserProfileController extends Controller
{

    public function index(){
        $userProfiles = UserProfile::all();
        return view('userProfile.index', compact('userProfiles'));
    }
    public function create(){
        return view('userProfile.create');
    }

    public function store(Request $request){

        $validateData = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => [
            'required',
            'regex:/^(?:\+?88)?01[3-9]\d{8}$/'
            ],
        ]);

        if ($validateData->fails()) {
            return redirect()->back()->withErrors($validateData)->withInput();
        }

        $address = [
            'city'       => $request->city,
            'area_name'  => $request->area_name,
            'road_name'  => $request->road_name,
            'house_name' => $request->house_name,
        ];

        $userProfile = UserProfile::create([
            'name'    => $request->name,
            'email'   => $request->email,
            'phone'   => $request->phone,
            'address' => $address,
        ]);

        return redirect()->back()->with('success', 'User profile created successfully.');
    }
}
