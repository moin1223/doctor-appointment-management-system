<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Doctor;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $doctors = array(
            array(

                'name' => 'Dr. Md. Aminul Islam ',
                'specialist' => 'Cardiologist',
                'mobile_number' => +8801711522425,
        
            ),
            array(

                'name' => 'Dr. Farhana Ahmed',
                'specialist' => 'Dermatologist',
                'mobile_number' => +8801715016282,
        
            ),
            array(

                'name' => 'Dr. Md. Monirul Islam',
                'specialist' => 'Neurologist',
                'mobile_number' => +8801819427380,
        
            ),
            array(

                'name' => 'Dr. Shaikh Nasir Uddin',
                'specialist' => 'Oncologist',
                'mobile_number' => +8801711915407,
        
            ),
            array(

                'name' => 'Dr. Mohammad Sazzad Hossain',
                'specialist' => 'Psychiatrist',
                'mobile_number' => +8801715044945,
        
            ),
            array(

                'name' => 'Dr. Mohammad Ali',
                'specialist' => 'Orthopedic Surgeon',
                'mobile_number' => +8801713079596,
        
            ),
            array(

                'name' => 'Dr. Nasima Akter',
                'specialist' => 'Gynecologist',
                'mobile_number' => +8801711743522,
        
            ),
            array(

                'name' => 'Dr. Nazrul Islam',
                'specialist' => 'Endocrinologist',
                'mobile_number' => +8801711521162,
        
            ),
            array(

                'name' => 'Dr. Abdullah Al Mamun',
                'specialist' => 'Ophthalmologist',
                'mobile_number' => +8801819412361,
        
            ),
            array(

                'name' => 'Dr. Tania Sultana',
                'specialist' => 'Pediatrician',
                'mobile_number' => +8801715004944,
        
            ),
            array(

                'name' => 'Dr. Abu Zafor Md. Salahuddin',
                'specialist' => 'Urologist',
                'mobile_number' => +8801711521437,
        
            ),
            array(

                'name' => 'Dr. Mohammed Hossain',
                'specialist' => 'Gastroenterologist',
                'mobile_number' => +8801711520809,
        
            ),
            array(

                'name' => 'Dr. Firoz Ahmed',
                'specialist' => 'ENT Specialist',
                'mobile_number' => +8801819440020,
        
            ),
            array(

                'name' => 'Dr. Md. Sadequr Rahman',
                'specialist' => 'Pulmonologist',
                'mobile_number' => +8801711521924,
        
            ),
            array(

                'name' => 'Dr. Mahbubur Rahman',
                'specialist' => 'Nephrologist',
                'mobile_number' => +8801711521801,
        
            ),


        );

      Doctor::insert($doctors);

    }

}
