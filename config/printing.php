<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Printing Driver
    |--------------------------------------------------------------------------
    */
    'driver' => 'printnode',

    /*
    |--------------------------------------------------------------------------
    | Driver Configurations
    |--------------------------------------------------------------------------
    */
    'drivers' => [

        'printnode' => [
            // langsung hardcode API key di sini
            'api_key' => '2zPogBrB_NqpGugpRZ8lcRXqCEYqwfebxzuk6i0PoKI',
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Default Printer ID (opsional, kalau mau langsung fix ke satu printer)
    |--------------------------------------------------------------------------
    */
    'default_printer_id' => 74703545  ,

    /*
    |--------------------------------------------------------------------------
    | Special Part Numbers
    |--------------------------------------------------------------------------
    | Part numbers that require special QR formatting (e.g. include shift/date).
    */
    'special_part_nos' => [
        '25051-BZ190-00-KZ',
        '67401-BZ190-00',
        '67401-BZ150-00',
        // add more part numbers here...
    ],

];
