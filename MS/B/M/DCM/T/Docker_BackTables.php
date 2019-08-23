<?php


return [


    "Master_Image"=>[
        'tableName'=>'All_Image',
        'connection'=>'DCM_Master_Data',
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

                ['name'=>'imageGenByUserId','vName'=>'Name of Module','type'=>'string', 'input'=>'text',"validation"=>[ 'required'=>true],'inputInfo'=>"Full Module Name that can display all over application."],
                ['name'=>'imageName','vName'=>'Description of Module','type'=>'string', 'input'=>'text',],
                ['name'=>'imageTag','vName'=>'Module Code','type'=>'string', 'input'=>'text',],


            ],

        'fieldGroup'=>[],
        'fieldGroupMultiple'=>[],
        'action'=>[],
        'validationMessage'=>['UniqId.required'=>":attribute is Required to go on .Please Contact on help@millionsllp.com",],


    ],

    "Master_Container"=>[
        'tableName'=>'All_Container',
        'connection'=>'DCM_Master_Data',
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

                ['name'=>'ContainerGenByUserId','vName'=>'Name of Module','type'=>'string', 'input'=>'text',"validation"=>[ 'required'=>true],'inputInfo'=>"Full Module Name that can display all over application."],
                ['name'=>'ContainerName','vName'=>'Description of Module','type'=>'string', 'input'=>'text',],
                ['name'=>'ContainerPortCount','vName'=>'Module Code','type'=>'string', 'input'=>'text',],
                ['name'=>'ContainerStatus','vName'=>'Module Code','type'=>'string', 'input'=>'text',],



            ],

        'fieldGroup'=>[],
        'fieldGroupMultiple'=>[],
        'action'=>[],
        'validationMessage'=>['UniqId.required'=>":attribute is Required to go on .Please Contact on help@millionsllp.com",],


    ],

    "Master_Port"=>[
        'tableName'=>'All_Port',
        'connection'=>'DCM_Master_Data',
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

                ['name'=>'port','vName'=>'Name of Module','type'=>'string', 'input'=>'text',"validation"=>[ 'required'=>true],'inputInfo'=>"Full Module Name that can display all over application."],
                ['name'=>'portUsedByUserId','vName'=>'Description of Module','type'=>'string', 'input'=>'text',],
                ['name'=>'portAllocatedContainerId','vName'=>'Module Code','type'=>'string', 'input'=>'text',],


            ],

        'fieldGroup'=>[],
        'fieldGroupMultiple'=>[],
        'action'=>[],
        'validationMessage'=>['UniqId.required'=>":attribute is Required to go on .Please Contact on help@millionsllp.com",],


    ],


    "User_Image"=>[
        'tableName'=>'MS_Docker_User_Image_',
        'tablePerFix'=>'MS_User:UniqId',
        'connection'=>'DCM_User_Data',

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

                ['name'=>'imageGenByUserId','vName'=>'Name of Module','type'=>'string', 'input'=>'text',"validation"=>[ 'required'=>true],'inputInfo'=>"Full Module Name that can display all over application."],
                ['name'=>'imageName','vName'=>'Description of Module','type'=>'string', 'input'=>'text',],
                ['name'=>'imageTag','vName'=>'Module Code','type'=>'string', 'input'=>'text',],


            ],

        'fieldGroup'=>[],
        'fieldGroupMultiple'=>[],
        'action'=>[],
        'validationMessage'=>['UniqId.required'=>":attribute is Required to go on .Please Contact on help@millionsllp.com",],


    ],


];
