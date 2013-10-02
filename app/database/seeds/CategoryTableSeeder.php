<?php

class CategoryTableSeeder extends Seeder {

    public function run()
    {
        DB::table("category")->truncate();

        $categories = [
            [
                "name"        => "Concert",
                "description" => "Music for the masses.",
                "created_at"  => date("Y-m-d H:i:s"),
                "updated_at"  => date("Y-m-d H:i:s")
            ],
            [
                "name"         => "Competition",
                "descriptions" => "Prizes galore.",
                "created_at"  => date("Y-m-d H:i:s"),
                "updated_at"  => date("Y-m-d H:i:s")
            ],
            [
                "name"        => "General",
                "description" => "Things of interest.",
                "created_at"  => date("Y-m-d H:i:s"),
                "updated_at"  => date("Y-m-d H:i:s")
            ]
        ];

        DB::table("category")->insert($categories);
    }

}
