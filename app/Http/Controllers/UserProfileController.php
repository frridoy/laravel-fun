<?php

namespace App\Http\Controllers;

use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserProfileController extends Controller
{
    public function index()
    {
        $userProfiles = UserProfile::all();
        return view('userProfile.index', compact('userProfiles'));
    }
    public function create()
    {
        return view('userProfile.create');
    }

    public function store(Request $request)
    {

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

    public function downloadSampleCsv()
    {
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="sample_users.csv"',
        ];

        $callback = function () {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, ['Name', 'Email', 'Phone', 'City', 'Area Name', 'Road Name', 'House Name']);
            fclose($handle);
        };

        return response()->stream($callback, 200, $headers);
    }

    public function importCsv()
    {
        return view('userProfile.exportCsv');
    }

    public function importCsvStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'csv_file' => 'required|file|mimes:csv,txt',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        try {
            $file = $request->file('csv_file');
            $csv = array_map('str_getcsv', file($file));

            $rawHeader = $csv[0];
            $header = array_map(function ($h) {
                return trim(preg_replace('/\s+/', ' ', $h));
            }, $rawHeader);

            unset($csv[0]);

            foreach ($csv as $row) {
                $row = array_map('trim', $row);

                if (empty(array_filter($row))) {
                    continue;
                }

                $data = array_combine($header, $row);

                if (UserProfile::where('email', $data['Email'] ?? null)->exists()) {
                    continue;
                }

                UserProfile::create([
                    'name'    => $data['Name'] ?? null,
                    'email'   => $data['Email'] ?? null,
                    'phone'   => $data['Phone'] ?? null,
                    'address' => [
                        'city'        => $data['City'] ?? null,
                        'area_name'   => $data['Area Name'] ?? null,
                        'road_name'   => $data['Road Name'] ?? null,
                        'house_name'  => $data['House Name'] ?? null,
                    ],
                ]);
            }

            return redirect()->back()->with('success', 'User profiles imported successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Error processing CSV file: ' . $e->getMessage()]);
        }
    }
}
