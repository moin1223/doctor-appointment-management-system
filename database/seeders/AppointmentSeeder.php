<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Appointment;

class AppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $requestAppointments = array(
            array(
                'patient_name' => 'মোহাম্মদ সাজ্জাদ হোসেন',
                'mobile_number' =>'01',
                'schedule' =>'১০-১',
                'status' =>1,
                'serial_no' =>'১',
                'doctor_id' =>1,
    
            ),
            array(
                'patient_name' => 'রহিম মিয়া',
                'mobile_number' => '01',
                'status' =>1,
                'serial_no' =>'১',
                'schedule' => '৭-১০',
                'doctor_id' => 2
            ),
            array(
                'patient_name' => 'আলি আহমেদ',
                'mobile_number' => '০১৭২০৩৪৫৬৭৮',
                'schedule' => '৭-১০',
                'doctor_id' => 3
            ),
            array(
                'patient_name' => 'ফারিদা বেগম',
                'mobile_number' => '০১৭৮৯৬৫৪৩২১',
                'schedule' => '৭-১০',
                'doctor_id' => 4
            ),
            array(
                'patient_name' => 'কামরুল হাসান',
                'mobile_number' => '০১৭৪৫৬৭৮৯৭',
                'schedule' => '১০-১',
                'doctor_id' => 5
            ),
            array(
                'patient_name' => 'মেহরাজ উদ্দিন',
                'mobile_number' => '০১৭৪৫৬৭৫৬',
                'schedule' => '১০-১',
                'doctor_id' => 6
            ),
            array(
                'patient_name' => 'তাসমিনা আক্তার',
                'mobile_number' => '০১৫৬৫৬৭৮৯০',
                'schedule' => '১০-১',
                'doctor_id' => 1
            ),
            array(
                'patient_name' => 'জামাল উদ্দিন',
                'mobile_number' => '০১৭৪৫৬৭৮৯৮',
                'schedule' => '১০-১',
                'doctor_id' => 1
            ),
            array(
                'patient_name' => 'কামরুল হাসান',
                'mobile_number' => '০১৭৪৫৬৭৮৮০',
                'schedule' => '১০-১',
                'doctor_id' => 5
            ),
            array(
                'patient_name' => 'নাজমুল হোসেন',
                'mobile_number' => '০১৭৮৯০৯৮৭৬৫',
                'schedule' => '১০-১',
                'doctor_id' => 7
            ),
            array(
                'patient_name' => 'ফাহিমা আক্তার',
                'mobile_number' => '০১৭৮৯০৯৮৯০৯',
                'schedule' => '১০-১',
                'doctor_id' => 5
            ),
            array(
                'patient_name' => 'কামরুল হাসান',
                'mobile_number' => '০১৭৮৯০৯৮৭৮৯',
                'schedule' => '১০-১',
                'doctor_id' => 7
            )
            

        );

        foreach ($requestAppointments as $requestAppointment) {

            $status= null;
            if(array_key_exists('status', $requestAppointment)){
                $grapherbook_user = $requestAppointment['status'];
                unset($requestAppointment['status']);
            }

            $serial_no= null;
            if(array_key_exists('serial_no', $requestAppointment)){
                $role = $requestAppointment['serial_no'];
                unset($requestAppointment['serial_no']);
            }
 
        Appointment::create($requestAppointment);

    }

}
}