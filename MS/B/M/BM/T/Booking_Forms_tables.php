<?php
/**
 * Created by PhpStorm.
 * User: ms
 * Date: 05-06-2019
 * Time: 12:51 PM
 */
return [
    "Master_Booking"=>[
        'tableName'=>'HM_Booking_Master',
        'connection'=>'MAS_Master',
        'fields'=>
            [
//                ['name'=>'UniqId','vName'=>'ID','type'=>'string', 'input'=>'locked', 'callback'=>'genUniqId',
//                    'validation'=>['unique'=>true,]],
                ['name'=>'ProductName','vName'=>'Product Name','type'=>'string', 'input'=>'text',"validation"=>[ 'existIn'=>"B\HM:HM_Product_Master:UniqId->HubName,HubCity","required"=>true],'inputMultiple'=>true  ],
                ['name'=>'ProductIcon','vName'=>'Select display images','type'=>'string', 'input'=>'file',  ],
                ['name'=>'ProductImages','vName'=>'Select other images','type'=>'string', 'input'=>'file',  ],
                ['name'=>'Shortcode','vName'=>'Display Short Code','type'=>'string', 'input'=>'text',   ],
                ['name'=>'AverageBuyRate','vName'=>'Buy Rate','type'=>'string', 'input'=>'text' ],
                ['name'=>'TotalInUnit','vName'=>'Open SKU','type'=>'string', 'input'=>'number',   ],
            //    ['name'=>'TotalOutUnit','vName'=>'Total Unit','type'=>'string', 'input'=>'generated','callback'=>'genUniqId',   ],
              //  ['name'=>'TotalBookedUnit','vName'=>'Total Booked Unit','type'=>'string', 'input'=>'generated','callback'=>'genUniqId',   ],
                ['name'=>'Status','vName'=>'Active','type'=>'boolean', 'input'=>'radio','data'=>'getRole'  ],


            ],
        'fieldGroup'=>[
            'Basic Details'=>['Shortcode','AverageBuyRate','TotalInUnit'],
            'Login Details'=>['ProductName','ProductIcon'],
            'Login Details 2'=>['ProductName','ProductIcon']

        ],

        'fieldGroupMultiple'=>[
            'Login Details 2',            'Login Details'
        ],

        'action'=>[
            'back'=>['route' =>'PM.Add.Product',
                'btnText'=>"Back"
            ],
            'add'=>[
                'route' =>'HM.Product.Action.Add.Post',
                'btnIcon'=>"",
                'btnColor'=>"",
                'btnText'=>"Save Product"
            ],
            'edit'=>[
                'route' =>'HM.Product.Action.Add.Post',
                'btnIcon'=>"",
                'btnColor'=>"",
                'btnText'=>"Edit Product"
            ],
        ],
    ],

];
