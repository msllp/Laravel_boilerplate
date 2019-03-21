<?php
/**
 * Created by PhpStorm.
 * User: ms
 * Date: 18-03-2019
 * Time: 03:13 AM
 */

namespace B\MAS;



use MS\Core\Module\Master;

class Base extends Master
{

    public static $controller="B\MAS\Controller";
    public static $model="B\MAS\Model";

    public static $route=[

        [
            'name'=>'MAS.Index',
            'route'=>'/',
            'method'=>'index',
            'type'=>'get',
        ],

        [
            'name'=>'MAS.Index',
            'route'=>'/data',
            'method'=>'indexData',
            'type'=>'get',
        ],


    ];


    public static $allOnSameconnection=false;


    public static $tables=[

        //Master Table Start////
        "Master"=>[
            'tableName'=>'MasterMASd',
            'connection'=>'MAS_Master',
            'dynamic'=>true,
            'fields'=>
                [

                    ['name'=>'TestColumnText','vName'=>'Test Column','type'=>'string', 'input'=>'text', 'callback'=>'genUniqId', 'default'=>'1'],
                    ['name'=>'TestColumnNumber','vName'=>'Test Column','type'=>'int', 'input'=>'number', 'callback'=>'genUniqId', 'default'=>'1']

                ]
        ],

        //Master Table End////



    ];

}
