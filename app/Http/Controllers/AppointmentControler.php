<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Appointment;
use RealRashid\SweetAlert\Facades\Alert;
class AppointmentControler extends Controller
{
    public function index(Request $request)
    {
    //     $contentData = User::where('is_grapherbook_user', false)
    //     ->where(User::raw("CONCAT(first_name, ' ', last_name)"), 'like', '%' . $request->name . '%')
    //     ->orderBy('id', 'desc')
    //     ->paginate(config('pagination.paginate'))
    //     ->appends($request->all());
    // return view('admin.user.index', compact('contentData'));
        // $doctors = Doctor:: all();
        // dd($request->name);
        $searchTerm = $request->name;

        $keywords = explode(' ', $searchTerm);
        
        $doctors = Doctor::where(function ($query) use ($keywords) {
            foreach ($keywords as $keyword) {
                $query->orWhere('keyword', 'LIKE', '%' . $keyword . '%');
            }
        })->get();
     
        return view('user.find-doctor', compact('doctors'));
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

    public function bookAppointment($doctorId)
    {
        // dd($doctorId);
        $doctor = Doctor::findOrFail($doctorId);
        return view('user.book-appointment', compact('doctor'));
    }
    public function bookAppointmentStore(Request $request)
    {
        //  dd($request->all());
         Appointment::create([
            'patient_name' =>$request->patient_name,
            'mobile_number' =>$request->mobile_number,
            'schedule' =>$request->schedule,
            'doctor_id' =>$request->doctor_id,

        ]);
        Alert::success('আপনার অ্যাপোয়েন্টমেন্ট বুক করা হয়েছে!');
        // return  redirect()->back();
        return redirect()->route('check.serial.number');
    }
    public function checkSerialNumber(Request $request)
    {
    //     $contentData = User::where('is_grapherbook_user', false)
    //     ->where(User::raw("CONCAT(first_name, ' ', last_name)"), 'like', '%' . $request->name . '%')
    //     ->orderBy('id', 'desc')
    //     ->paginate(config('pagination.paginate'))
    //     ->appends($request->all());
    // return view('admin.user.index', compact('contentData'));
        // $doctors = Doctor:: all();
        // dd($request->name);
        $searchTerm = $request->name;

        $keywords = explode(' ', $searchTerm);
        
        $doctors = Doctor::where(function ($query) use ($keywords) {
            foreach ($keywords as $keyword) {
                $query->orWhere('keyword', 'LIKE', '%' . $keyword . '%');
            }
        })->get();
        return view('user.check-serial-number', compact('doctors'));
    }
}
