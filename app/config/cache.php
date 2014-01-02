<?php

return [
    "driver"    => "memcached",
    "memcached" => [
        [
            "host"   => "127.0.0.1",
            "port"   => 11211,
            "weight" => 100
        ]
    ],
    "prefix" => "laravel"
];