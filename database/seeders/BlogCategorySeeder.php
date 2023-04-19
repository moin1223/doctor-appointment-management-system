<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BlogCategory;


class BlogCategorySeeder extends Seeder
{
    /**
     * Run the database seeds
     *
     * @return void
     */
    public function run()
    {
        $blogCategories = array(
            array(
                'id' => '1',
                'name' => ' Business',
            ),

            array(
                'id' => '2',
                'name' => 'News',
            ),

            array(
                'id' => '3',
                'name' => 'Fashion',
            ),
            array(
                'id' => '4',
                'name' => 'Food',
            ),

        );

        BlogCategory::insert($blogCategories);

    }

}
