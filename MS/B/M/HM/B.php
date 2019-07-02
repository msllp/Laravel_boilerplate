<?php
/**
 * Created by PhpStorm.
 * User: ms
 * Date: 26-05-2019
 * Time: 07:27 PM
 */

namespace B\HM;

use MS\Core\Module\Master;


class B extends Master
{
    public static $controller="B\HM\C";
    public static $model="B\HM\M";


    public static $route=[

        [
            'name'=>'HM.Index',
            'route'=>'/',
            'method'=>'index',
            'type'=>'get',
        ],

        [
            'name'=>'HM.Index.data',
            'route'=>'/data',
            'method'=>'indexData',
            'type'=>'get',
        ],

        [
            'name'=>'HM.Product.Action.Add.Post',
            'route'=>'/product/add',
            'method'=>'addProductPost',
            'type'=>'get',
        ],







    ];


    public static $allOnSameconnection=false;



    public static $tables=[

        //Master Table Start////
        "Master_Hub"=>[
            'tableName'=>'HM_Hub_Master',
            'connection'=>'HM_Master',
            'fields'=>
                [

                    ['name'=>'UniqId','vName'=>'ID','type'=>'string', 'input'=>'locked', 'callback'=>'genUniqId', 'validation'=>['unique']],
                    ['name'=>'HubName','vName'=>'Hub Name','type'=>'string', 'input'=>'text',  ],
                    ['name'=>'HubCity','vName'=>'City','type'=>'string', 'input'=>'text',   ],
                    ['name'=>'HubAddress','vName'=>'Address','type'=>'string', 'input'=>'textarea', ],
                    ['name'=>'HubShortCode','vName'=>'Shortcode','type'=>'string', 'input'=>'email',  'validation'=>['unique']],
                    ['name'=>'HubPincode','vName'=>'incode','type'=>'string', 'input'=>'text', ],
                    ['name'=>'HubInchargeId','vName'=>'Select incharge','type'=>'string', 'input'=>'option',   ],
                    ['name'=>'HubLedger','vName'=>'Select Role','type'=>'string', 'input'=>'option','data'=>'getRole' , 'validation'=>['unique']],
                    ['name'=>'lifeTimeTotalUnit','vName'=>'City','type'=>'string', 'input'=>'text',   ],
                    ['name'=>'lifeTimeTotalInUnit','vName'=>'City','type'=>'string', 'input'=>'text',   ],
                    ['name'=>'lifeTimeTotalOutUnit','vName'=>'Address','type'=>'string', 'input'=>'textarea', ],
                    ['name'=>'inUnit','vName'=>'City','type'=>'string', 'input'=>'text',   ],
                    ['name'=>'outUnit','vName'=>'Address','type'=>'string', 'input'=>'textarea', ],
                    ['name'=>'bookedUnit','vName'=>'Shortcode','type'=>'string', 'input'=>'email',  'validation'=>['unique']],
                    ['name'=>'Status','vName'=>'Active','type'=>'boolean', 'input'=>'radio','data'=>'getRole'  ],

                ],
        ],

        "Hub_Ledger"=>[
            'connection'=>'HM_Master',
            'dynamic'=>true,
            'dynamicLink'=>"Master_Hub.UniqId",
            'fields'=>
                [

                    ['name'=>'UniqId','vName'=>'ID','type'=>'string', 'input'=>'locked', 'callback'=>'genUniqId', 'validation'=>['unique']],
                    ['name'=>'ProductId','vName'=>'Hub Name','type'=>'string', 'input'=>'text',  ],
                    ['name'=>'inUnit','vName'=>'City','type'=>'string', 'input'=>'text',   ],
                    ['name'=>'outUnit','vName'=>'Address','type'=>'string', 'input'=>'textarea', ],
                    ['name'=>'bookedUnit','vName'=>'Shortcode','type'=>'string', 'input'=>'email',  'validation'=>['unique']],
                    ['name'=>'Status','vName'=>'Active','type'=>'boolean', 'input'=>'radio','data'=>'getRole'  ],

                ],


        ],

        "Hub_Product_Ledger"=>[
            'tableName'=>'HM_Hub_Ledger_Master',//_HubId_ProductId
            'connection'=>'HM_Data',
            'dynamic'=>true,
            'dynamicLink'=>"Master_Hub.UniqId",
            'fields'=>
                [
                    ['name'=>'UniqId','vName'=>'ID','type'=>'string', 'input'=>'locked', 'callback'=>'genUniqId', 'validation'=>['unique']],
                    ['name'=>'OrderId','vName'=>'Hub Name','type'=>'string', 'input'=>'text',  ],
                    ['name'=>'inUnit','vName'=>'City','type'=>'string', 'input'=>'text',   ],
                    ['name'=>'outUnit','vName'=>'Address','type'=>'string', 'input'=>'textarea', ],
                    ['name'=>'flowProcessStatus','vName'=>'City','type'=>'string', 'input'=>'text',   ],
                    ['name'=>'Status','vName'=>'Active','type'=>'boolean', 'input'=>'radio','data'=>'getRole'  ],
                ],


        ],



        "Product_InUnit_Ledger"=>[
            'tableName'=>'HM_Product_InUnit_Ledger',//_ProductID
            'connection'=>'HM_Master',
            'fields'=>
                [
                    ['name'=>'UniqId','vName'=>'ID','type'=>'string', 'input'=>'locked', 'callback'=>'genUniqId', 'validation'=>['unique']],
                    ['name'=>'HubId','vName'=>'Hub Name','type'=>'string', 'input'=>'text',  ],
                    ['name'=>'BuyRate','vName'=>'Address','type'=>'string', 'input'=>'textarea', ],
                    ['name'=>'TotalInUnit','vName'=>'City','type'=>'string', 'input'=>'text',   ],
                    ['name'=>'TotalOutUnit','vName'=>'City','type'=>'string', 'input'=>'text',   ],
                    ['name'=>'TotalBookedUnit','vName'=>'City','type'=>'string', 'input'=>'text',   ],
                    ['name'=>'Status','vName'=>'Active','type'=>'boolean', 'input'=>'radio','data'=>'getRole'  ],
                ],
        ],

        ];



}
