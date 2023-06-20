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
                'name' => 'ডঃ শেখ নাসির উদ্দিন',
                'specialist' => 'অঙ্কনিক',
                'mobile_number' => '+৮৮০১৭১১৯১৫৪০৭',
            ),
            array(
                'name' => 'ডঃ মোহাম্মদ সাজ্জাদ হোসেন',
                'specialist' => 'মনোরোগ বিশেষজ্ঞ',
                'mobile_number' => '+৮৮০১৭১৫০৪৪৯৪৫',
            ),
            array(
                'name' => 'ডঃ মাহবুব উর রশীদ',
                'specialist' => 'কার্ডিওলজিস্ট',
                'mobile_number' => '+৮৮০১৭১২৩৪৫৬৭৮',
            ),
            array(
                'name' => 'ডঃ মোহাম্মদ ইব্রাহিম',
                'specialist' => 'গাইনিকোলজিস্ট',
                'mobile_number' => '+৮৮০১৭১২৩৪৫৬৭৮',
            ),
            array(
                'name' => 'ডঃ আহমেদ সাকিব',
                'specialist' => 'কার্ডিওলজিস্ট',
                'mobile_number' => '+৮৮০১৭১২৩৪৫৬৭৮',
            ),
            array(
                'name' => 'ডঃ মাহবুবান রহমান',
                'specialist' => 'নিউরোলজিস্ট',
                'mobile_number' => '+৮৮০১৭১২৩৪৫৬৭৮',
            ),
            array(
                'name' => 'ডঃ রিফাত আহমেদ',
                'specialist' => 'কিডনি রোগ বিশেষজ্ঞ',
                'mobile_number' => '+৮৮০১৭১২৩৪৫৬৭৮',
            ),
            array(
                'name' => 'ডঃ আলিমুল হক',
                'specialist' => 'ব্রেস্ট সার্জন',
                'mobile_number' => '+৮৮০১৭১২৩',
            ),


        );

      Doctor::insert($doctors);

    }

}
