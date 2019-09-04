<?php
/**
 * Created by PhpStorm.
 * User: ms
 * Date: 03-09-2019
 * Time: 01:05 AM
 */
return [




    "Master_All_Feature"=>[
        'tableName'=>'MS_CORE_Mod',
        'connection'=>'MS_Core',

        'fields'=>
            [

                //auto & Locaked //done
                [

                    'name'=>'test0',
                    'vName'=>'ID',
                    'type'=>'string',
                    'input'=>'auto',
                    'callback'=>'genUniqId',
                    'validation'=>['required'=>true,'unique'=>true],
                    'inputInfo'=>"It is auto genrated Field.It can not edit by Any Human."

                ],

                ['name'=>'test1','vName'=>'Name of Module 0', 'input'=>'text',],
                ['name'=>'test2','vName'=>'Name of Module 1', 'input'=>'textarea',],
                ['name'=>'test3','vName'=>'Name of Module 2', 'input'=>'number',],
                ['name'=>'test4','vName'=>'Name of Module 3', 'input'=>'email',],
                ['name'=>'test5','vName'=>'Name of Module 4', 'input'=>'date',],
                ['name'=>'test6','vName'=>'Name of Module 5', 'input'=>'time',],

                ['name'=>'test7','vName'=>'Name of Module 6', 'input'=>'radio',"validation"=>[ 'existIn'=>MSCORE_UI_STATUS_1,'required'=>true,]],
                ['name'=>'test8','vName'=>'Name of Module 7', 'input'=>'checkbox',"validation"=>[ 'existIn'=>MSCORE_UI_STATUS_1,'required'=>true,]],
                ['name'=>'test9','vName'=>'Name of Module 8', 'input'=>'option',"validation"=>[ 'existIn'=>MSCORE_UI_STATUS_1,'required'=>false,]],


                ['name'=>'test10','vName'=>'Module Icon','type'=>'string', 'input'=>'file',
                    'storeTo'=>"MS-MASTER-Storage:MAS.UniqId.ModIcon->icon"
                ],

            ],

        'fieldGroup'=>[
            'Add Module'=>['test0','test1','test2','test3','test4','test5','test6','test7','test8','test9','test10',],
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

            'test8.required'=>":attribute is Required to go on .Please Contact on help@millionsllp.comask'klas'll",
            'test7.required'=>":attribute is Required to go on .Please Contact on help@millionsllp.com 2",



        ],


    ],


];
