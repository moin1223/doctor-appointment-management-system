<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;

class AppointmentControler extends Controller
{
    public function index()
    {
        return view('user.find-doctor');
    }
    public function suggestDoctor(Request $request)
    {
        
            // $keyword = $request->input('keyword');
            // $keyword = 'moin';
        
            // $filteredRecords = Doctor::where('keyword', 'like', '%' . $request->voiceInput . '%')->get();
        
            // return response()->json($filteredRecords);
            $searchTerm = $request->voiceInput;

            $keywords = explode(' ', $searchTerm);
            
            $users = Doctor::where(function ($query) use ($keywords) {
                foreach ($keywords as $keyword) {
                    $query->orWhere('keyword', 'LIKE', '%' . $keyword . '%');
                }
            })->get();
    
            return response()->json($users );
    }
}
