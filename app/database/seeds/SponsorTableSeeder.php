<?php

class SponsorTableSeeder
extends Seeder
{
    public function run()
    {
        DB::table("sponsor")->truncate();

        $sponsors = [
            [
                "name"        => "ACME",
                "description" => "Makers of fine quality dynomite.",
                "url"         => "http://www.kersplode.com",
                "created_at"  => date("Y-m-d H:i:s"),
                "updated_at"  => date("Y-m-d H:i:s")
            ],
            [
                "name"        => "Cola Company",
                "description" => "Making cola like no other.",
                "url"         => "http://www.cheerioteeth.com",
                "created_at"  => date("Y-m-d H:i:s"),
                "updated_at"  => date("Y-m-d H:i:s")
            ],
            [
                "name"        => "MacDougles",
                "description" => "SUper sandwiches.",
                "url"         => "http://www.imenjoyingit.com",
                "created_at"  => date("Y-m-d H:i:s"),
                "updated_at"  => date("Y-m-d H:i:s")
            ]
        ];

        DB::table("sponsor")->insert($sponsors);
    }

}
