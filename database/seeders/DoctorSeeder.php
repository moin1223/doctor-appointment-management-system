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
                'specialist' => 'মেডিসিন, হূদরোগ ,ডায়াবেটিস, হরমোন',
                'mobile_number' => '+৮৮০১৭১১৯১৫৪০৭',
                'keyword' => 'মেডিসিন, হূদরোগ ,ডায়াবেটিস, হরমোন, শেখ নাসির উদ্দিন'
            ),
                
                array(
                'name' => 'ডঃ মোহাম্মদ সাজ্জাদ হোসেন',
                'specialist' => 'কিডনি স্ট্রোক বাত ব্যাথা',
                'mobile_number' => '+৮৮০১৭১৫০৪৪৯৪৫',
                'keyword' => 'কিডনি স্ট্রোক বাত ব্যাথা, মোহাম্মদ সাজ্জাদ হোসেন'
                ),
                
                array(
                'name' => 'ডঃ জাকির হোসেন',
                'specialist' => 'চিকিৎসা ব্যথা ডায়াবেটিস',
                'mobile_number' => '+৮৮০১৭১২৩৪৫৬৭৮',
                'keyword' => 'চিকিৎসা ব্যথা ডায়াবেটিস, জাকির হোসেন'
                ),
                
                array(
                'name' => 'ডঃ আহমেদ রাশেদ',
                'specialist' => 'হার্ট সার্জারি দিমাগি স্যার্জারি',
                'mobile_number' => '+৮৮০১৭১৩২৩৪৫৬৭',
                'keyword' => 'হার্ট সার্জারি দিমাগি স্যার্জারি, আহমেদ রাশেদ'
                ),
                
                array(
                'name' => 'ডঃ সালিম আক্তার',
                'specialist' => 'পানিশাক অস্থি ও যন্ত্রণা',
                'mobile_number' => '+৮৮০১৭১৪৫৬৭৮৯',
                'keyword' => 'পানিশাক অস্থি ও যন্ত্রণা, সালিম আক্তার'
                ),
                
                array(
                'name' => 'ডঃ জাহিদুর রহমান',
                'specialist' => 'মেডিসিন, হূদরোগ, প্যানক্রিয়াটিস',
                'mobile_number' => '+৮৮০১৭১৫৬৭৮৯০',
                'keyword' => 'মেডিসিন, হূদরোগ, প্যানক্রিয়াটিস, জাহিদুর রহমান'
                ),
                
                array(
                'name' => 'ডঃ মোহাম্মদ ইকবাল',
                'specialist' => 'বাত, রুমাটোলজি',
                'mobile_number' => '+৮৮০১৭১৬৭৮৯০১',
                'keyword' => 'বাত, রুমাটোলজি, মোহাম্মদ ইকবাল'
                ),
                
                array(
                'name' => 'ডঃ জামাল উদ্দিন',
                'specialist' => 'অ্যান্ড্রলজি মাইক্রোসার্জারি',
                'mobile_number' => '+৮৮০১৭১৭৮৯০১২',
                'keyword' => 'অ্যান্ড্রলজি মাইক্রোসার্জারি, জামাল উদ্দিন'
                ),
                
                array(
                'name' => 'ডঃ আব্দুল্লাহ আল মামুন',
                'specialist' => 'গলা নাক কান স্বাস্থ্য',
                'mobile_number' => '+৮৮০১৭১৮৯০১২৩',
                'keyword' => 'গলা নাক কান স্বাস্থ্য, আব্দুল্লাহ আল মামুন'
                ),
                
                array(
                'name' => 'ডঃ কামাল হোসেন',
                'specialist' => 'ডায়াবেটিস, হৃদরোগ, কিডনি',
                'mobile_number' => '+৮৮০১৭১৯০১২৩৪',
                'keyword' => 'ডায়াবেটিস, হৃদরোগ, কিডনি, কামাল হোসেন'
                ),
                
                array(
                'name' => 'ডঃ জয় মুখার্জি',
                'specialist' => 'নিউরোলজি, স্ট্রোক, ডিমেনশিয়া',
                'mobile_number' => '+৮৮০১৭২০১২৩৪৫',
                'keyword' => 'নিউরোলজি, স্ট্রোক, ডিমেনশিয়া, জয় মুখার্জি'
                ),
                
                array(
                'name' => 'ডঃ মুহিউদ্দিন আহমেদ',
                'specialist' => 'প্যানক্রিয়াটিস, লিভার',
                'mobile_number' => '+৮৮০১৭২১২৩৪৫৬',
                'keyword' => 'প্যানক্রিয়াটিস, লিভার, মুহিউদ্দিন আহমেদ'
                ),
                
                array(
                'name' => 'ডঃ ফারিদ উদ্দিন',
                'specialist' => 'কিডনি, যন্ত্রপাতি, মেডিসিন',
                'mobile_number' => '+৮৮০১৭২২৩৪৫৬৭',
                'keyword' => 'কিডনি, যন্ত্রপাতি, মেডিসিন, ফারিদ উদ্দিন'
                ),
                
                array(
                'name' => 'ডঃ আহমেদ করিম',
                'specialist' => 'কাতিয়াম রোগ বিশেষজ্ঞ',
                'mobile_number' => '+৮৮০১৭২৩৪৫৬৭৮',
                'keyword' => 'কাতিয়াম রোগ বিশেষজ্ঞ, আহমেদ করিম'
                ),


        );

      Doctor::insert($doctors);

    }

}
