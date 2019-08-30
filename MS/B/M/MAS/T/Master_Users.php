<?php
/**
 * Created by PhpStorm.
 * User: ms
 * Date: 04-06-2019
 * Time: 01:47 AM
 */

return [

    "Master_User"=>[
        'tableName'=>'MAS_Master_Root',
        'connection'=>'MAS_Master',
        //'dynamic'=>true,
        'fields'=>
            [

                [

                    'name'=>'UniqId',
                    'vName'=>'ID',
                    'type'=>'string',
                    'input'=>'locked',
                    'callback'=>'genUniqId',
                    'validation'=>['unique']

                ],

                ['name'=>'FirstName','vName'=>'First Name','type'=>'string', 'input'=>'text',

                    'style'=>[
                        //'prefix'=>"lock",
                        //'perfix'=>"lock",
                 //       'inputSize'=>"3",
                        //'onlyInput'=>true,
                    ],

                    'validation'=>[
                        'minL'=>"",
                        'minV'=>"",
                        'lessThen'=>"",
                        'greaterThen'=>"",
                        'lessThenDay'=>"",
                        'greaterThenDay'=>"",
                        'unique'=>true
                        ,'required'=>true
                    ]


                ],

                ['name'=>'LastName','vName'=>'Last Name','type'=>'string', 'input'=>'text',

                    'style'=>[
                        //'prefix'=>"lock",
                        //'perfix'=>"lock",
             //Password Must have a lowercase, upercase, number, symbol & 8 char. required
                        //Min. 8 char. required           'inputSize'=>"9",
                        //'onlyInput'=>true,
                    ],

                    ],

                ['name'=>'MobileNo','vName'=>'Mobile No.','type'=>'string', 'input'=>'number',  'validation'=>['unique' ,'required'=>true]],

                ['name'=>'Email','vName'=>'Email','type'=>'string', 'input'=>'email',  'validation'=>['unique']],

                ['name'=>'Username','vName'=>'Username','type'=>'string', 'input'=>'text',  'validation'=>['unique','required'=>true]],
                ['name'=>'Password','vName'=>'Password','type'=>'string', 'input'=>'password',   'validation'=>['required'=>true]],
                ['name'=>'ConfirmPassword','vName'=>'Confirm Password', 'input'=>'password',    'validation'=>['required'=>true]],
                ['name'=>'Role','vName'=>'Select Role','type'=>'string', 'input'=>'option','data'=>'getRole'  ],

                ['name'=>'HubId','vName'=>'Select Hub','type'=>'string', 'input'=>'option','data'=>'getHub'  ],
                ['name'=>'LedgerId','vName'=>'Master Ledger','type'=>'string', 'input'=>'generated','callback'=>'genAPIToken'  ,'validation'=>['unique']],

                ['name'=>'APIToken','vName'=>'API Token','type'=>'string', 'input'=>'generated' ,'callback'=>'genAPIToken','validation'=>['unique'] ,'hidden'=>true ],
                ['name'=>'APISecrete','vName'=>'API Secrete','type'=>'string', 'input'=>'generated' ,'callback'=>'genAPISecrete',  ],

            ],
        'action'=>[
            'add'=>"",
            'edit'=>"",

        ],

        'notification'=>[

            'mail'=>"Email",
            'number'=>"MobileNo",
            'name'=>"FirstName.LastName",
            'birthdate'=>null,

        ],

        'fieldGroup'=>[
            'Basic Details'=>['FirstName','LastName','MobileNo','Email'],
            'Login Details 1'=>['Username','Password','ConfirmPassword','Role'],
            'Login Details 2'=>['Username','Password','ConfirmPassword','Role']

        ],
        'perFix'=>true
    ],



];
