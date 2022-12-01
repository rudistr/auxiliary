<?php

return [
    'oracle' => [
        'driver'         => 'Oci8',
        'tns'            => env('DB_TNS', '(DESCRIPTION = (ADDRESS = (PROTOCOL = TCP)(HOST = 127.0.0.1)(PORT = 1521)) (CONNECT_DATA = (SERVICE_NAME = auxorcl) (SID = auxorcl)))'),
        'host'           => env('DB_HOST', '127.0.0.1'),
        'port'           => env('DB_PORT', '1521'),
        'database'       => env('DB_DATABASE', 'auxorcl'),
        'service_name'   => env('DB_SERVICENAME', 'auxorcl'),
        'username'       => env('DB_USERNAME', 'rudi_as'),
        'password'       => env('DB_PASSWORD', 'kucingkaca'),
        'charset'        => env('DB_CHARSET', 'AL32UTF8'),
        'prefix'         => env('DB_PREFIX', ''),
        'prefix_schema'  => env('DB_SCHEMA_PREFIX', ''),
        'edition'        => env('DB_EDITION', 'ora$base'),
        'server_version' => env('DB_SERVER_VERSION', '11g'),
        'load_balance'   => env('DB_LOAD_BALANCE', 'yes'),
        'dynamic'        => [],
    ],
];

