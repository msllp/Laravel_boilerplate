<?php

//dd(MSCORE_UI_STATUS_1);

return [


    "Master_Mod"=>[
        'tableName'=>'MS_CORE_Mod',
        'connection'=>'MS_Core',
        //'dynamic'=>true,
        'fields'=>
            [
                [

                    'name'=>'UniqId',
                    'vName'=>'ID',
                    'type'=>'string',
                    'input'=>'auto',
                    'callback'=>'genUniqId',
                    'validation'=>['required'=>true,'unique'=>true],
                    'inputInfo'=>"It is auto genrated Field.It can not edit by Any Human."

                ],

                ['name'=>'modName','vName'=>'Name of Module','type'=>'string', 'input'=>'text',"validation"=>[ 'required'=>true],'inputInfo'=>"Full Module Name that can display all over application."],
                ['name'=>'modDesc','vName'=>'Description of Module','type'=>'string', 'input'=>'text',],
                ['name'=>'modCode','vName'=>'Module Code','type'=>'string', 'input'=>'text',],
                ['name'=>'modIcon','vName'=>'Module Icon','type'=>'string', 'input'=>'file',
                    'storeTo'=>"MS-MASTER-Storage:MAS.UniqId.ModIcon->icon"

                    ],
                ['name'=>'modPrefix','vName'=>'Route Prefix','type'=>'string', 'input'=>'text',],
                ['name'=>'modForSuperAdmin','vName'=>'Module For Super Admin Only','type'=>'boolean', 'input'=>'radio',"validation"=>[ 'existIn'=>MSCORE_UI_STATUS_1]],
                ['name'=>'modForAdmin','vName'=>'Module For Admin Only','type'=>'boolean', 'input'=>'checkbox',"validation"=>[ 'existIn'=>MSCORE_UI_STATUS_1]],
                ['name'=>'modStatus','vName'=>'Module Status','type'=>'boolean', 'input'=>'radio',"validation"=>[ 'existIn'=>MSCORE_UI_STATUS_1,'required'=>true,]],
                ['name'=>'modHomeAction','vName'=>'Home Action','type'=>'boolean', 'input'=>'text',],
                ['name'=>'modDataAction','vName'=>'Home-Data Action','type'=>'boolean', 'input'=>'text',],

        ],

        'fieldGroup'=>[
            'Add Module'=>['UniqId','modName','modDesc','modCode','modIcon','modPrefix','modForSuperAdmin','modForAdmin','modStatus','modHomeAction','modDataAction'],
           // 'Add Module2'=>['modName','modDesc','modCode','modIcon','modPrefix','modForSuperAdmin','modForAdmin','modStatus','modHomeAction','modDataAction'],
           // 'Login Details'=>['modName','modDesc','modCode','modIcon',],
         //   'Login Details 2'=>['Username','Password','ConfirmPassword','Role']

        ],


        'fieldGroupMultiple'=>[

        ],

        'action'=>[
            'add'=>[
                "btnColor"=>"bg-green",
                "route"=>"Test.Post.With.Data",
                "btnIcon"=>"fa fa-home",
                'btnText'=>"add Module"
            ],

            'edit'=>[
                "btnColor"=>"btn-info",
                "route"=>"MAS.Index",
                "btnIcon"=>"fa fa-home",
                'btnText'=>"edit Module"
            ],
           // 'edit'=>"",

        ],

        'validationMessage'=>[

            'UniqId.required'=>":attribute is Required to go on .Please Contact on help@millionsllp.com",



        ],


    ],
    'Master_Mod_Details'=>[
        'tableName'=>'MS_CORE_Mod_action_',
        'connection'=>'MAS_Core',

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

                ['name'=>'modActionName','vName'=>'Name of Action','type'=>'string', 'input'=>'text',],
                ['name'=>'modDefaultAccess','vName'=>'Name of Action','type'=>'string', 'input'=>'text',],
                ['name'=>'modRoute','vName'=>'Name of Action','type'=>'string', 'input'=>'text',],
                ['name'=>'modType','vName'=>'Module Code','type'=>'string', 'input'=>'text',],
                ['name'=>'modStatus','vName'=>'State of Action','type'=>'boolean', 'input'=>'radio',],
            ]


    ],

    'CORE_UI_Status_1'=>[
        'tableName'=>'MS_CORE_UI_Status_1',
        'connection'=>'MS_Core',

        'fields'=>
            [
                ['name'=>'StatusName','vName'=>'Name of Action','type'=>'string', 'input'=>'text',],
                ['name'=>'StatusBoolean','vName'=>'Name of Action','type'=>'string', 'input'=>'text',],
                ['name'=>'status','vName'=>'Name of Action','type'=>'string', 'input'=>'text',],
            ],

        'action'=>[]


    ],



    ];
