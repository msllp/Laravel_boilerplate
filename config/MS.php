<?php

return[



    'default_route_load'=> true,

    'backend_module_root'=>'MS/B',

    'front_module_root'=>'MS/F',

    'backend_prefix'=>"admin",
    'Modules'=>

    [

        'Frontend'=>[],
        'Backend'=>[
            'MAS'=>true,
            'HM'=>true,
            'DCM'=>true,

        ],

    ],

];
