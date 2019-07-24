<?php
/**
 * Created by PhpStorm.
 * User: ms
 * Date: 04-06-2019
 * Time: 01:47 AM
 */

return [

    "Master_Hub"=>[
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
                        'inputSize'=>"1",
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

                ['name'=>'LastName','vName'=>'Last Name','type'=>'string', 'input'=>'text',   ],

                ['name'=>'MobileNo','vName'=>'Mobile No.','type'=>'string', 'input'=>'number',  'validation'=>['unique' ,'required'=>true]],

                ['name'=>'Email','vName'=>'Email','type'=>'string', 'input'=>'email',  'validation'=>['unique']],

                ['name'=>'Username','vName'=>'Username','type'=>'string', 'input'=>'text',  'validation'=>['unique','required'=>true]],
                ['name'=>'Password','vName'=>'Password','type'=>'string', 'input'=>'text',   'validation'=>['required'=>true]],
                ['name'=>'ConfirmPassword','vName'=>'Confirm Password', 'input'=>'text',    'validation'=>['required'=>true]],
                ['name'=>'Role','vName'=>'Select Role','type'=>'string', 'input'=>'option','data'=>'getRole'  ],

            //    ['name'=>'HubId','vName'=>'Select Hub','type'=>'string', 'input'=>'option','data'=>'getHub'  ],
                ['name'=>'LedgerId','vName'=>'Master Ledger','type'=>'string', 'input'=>'generated','callback'=>'genAPIToken'  ,'validation'=>['unique']],

                ['name'=>'APIToken','vName'=>'API Token','type'=>'string', 'input'=>'generated' ,'callback'=>'genAPIToken','validation'=>['unique'] ,'hidden'=>true ],
                ['name'=>'APISecrete','vName'=>'API Secrete','type'=>'string', 'input'=>'generated' ,'callback'=>'genAPISecrete',  ],

            ],
        'action'=>[
            'add'=>[
                "btnColor"=>"btn-success",
                "route"=>"Test.Post.With.Data",
                "btnIcon"=>"fa fa-home",
                'btnText'=>"add Module"
            ],


        ],

        'fieldGroup'=>[
            'Basic Details'=>['FirstName','LastName','MobileNo','Email'],
            'Login Details'=>['Username','Password','ConfirmPassword','Role'],
            'Login Details 2'=>['Username','Password','ConfirmPassword','Role']

        ],

        'fieldGroupMultiple'=>[
            'Login Details 2'
        ],
        'perFix'=>true
    ],

    'action'=>[
        'add'=>"",
        'edit'=>"",
        'delete'=>"",
    ],





];
