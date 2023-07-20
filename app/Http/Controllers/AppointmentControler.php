<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Appointment;
use RealRashid\SweetAlert\Facades\Alert;
class AppointmentControler extends Controller
{
    public function index1()
    {
        $requestedAppointments = Appointment:: with('doctor')-> where('status', 0)->paginate(10);
        return view('admin.appointment.index', compact('requestedAppointments'));

    }
    public function create($appointmentId)
    {
        $requestedAppointment = Appointment::with('doctor')->findOrfail($appointmentId);
        return view('admin.appointment.create', compact('requestedAppointment'));

    }
    public function store(Request $request)
    {
        // dd($request->all());
        $requestedAppointment = Appointment::findOrfail($request->appointment_id);
        $requestedAppointment->update([
         'serial_no' => $request->serial_no,
         'status' =>1,
        ]);
        return redirect()->route('admin.appointment.index');

    }
    public function destroy($appointmentId)
    {
        $appointment = Appointment::findOrFail($appointmentId);
        $appointment->delete();
        return redirect()->route('admin.appointment.index');
    
    }






    public function index()
    {

            return view('user.find-doctor');

        }
        public function doctorPost(Request $request)
        {
   
            // $doctor_serial = Doctor
            // // $serial = 3;
            // // $serial1 = 6;
            // if($serial == $serial1){
            //     session()->put('serial', 'serial khali ace');
            // } 
            // else{
            //     session()->put('serial', ' serial khali nai'); 
            // }
            $searchTerm = $request->name;
            $keywords = explode(' ', $searchTerm);
        
            if (!empty($keywords)) {
                $doctors = Doctor::where(function ($query) use ($keywords) {
                    foreach ($keywords as $keyword) {
                        $query->orWhere('keyword', 'LIKE', '%' . $keyword . '%');
                    }
                })->paginate(10);
        
                if ($doctors->isNotEmpty()) {
                    return view('user.doctor', compact('doctors'));
                }
            }
        
            return redirect()->route('find_doctor')->with('message', 'কোন ডাক্তার খুঁজে পাওয়া যায়নি');
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
        $doctor = Doctor::findOrFail($request->doctor_id);
        // dd($serial);
        $serial_no = $doctor->serial + 1;
        $doctor->update([
           "serial" => $doctor->serial + 1,

        ]);

         Appointment::create([
            'patient_name' =>$request->patient_name,
            'mobile_number' =>$request->mobile_number,
            'schedule' =>$request->schedule,
            'doctor_id' =>$request->doctor_id,
            'serial_no' => $serial_no,

        ]);
        Alert::success('আপনার অ্যাপোয়েন্টমেন্ট বুক করা হয়েছে!');
        // return  redirect()->back();
        return redirect()->route('check.serial.number');
    }
    public function checkSerialNumber(Request $request)
    {

     $serialNumbers = Appointment::with('doctor')->where('status', 1)

         ->where('mobile_number', $request->mobile_number)->get();
    //  $serialNumbers = Appointment::where('status', 1)->get();
    //  dd($serialNumbers);

         return view('user.check-serial-number',compact('serialNumbers'));
    }

    public function doctorList()
    {
        $doctors = Doctor::orderBy('id', 'desc')
        ->paginate(10);
        return view('user.doctor', compact('doctors'));
    }


}
