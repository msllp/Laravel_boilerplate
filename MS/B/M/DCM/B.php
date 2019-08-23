<?php
/**
 * Created by PhpStorm.
 * User: ms
 * Date: 18-03-2019
 * Time: 03:13 AM
 */

namespace B\DCM;



use MS\Core\Module\Master;

class B extends Master
{

    public static $controller="B\DCM\C";
    public static $model="B\DCM\M";
    //  public static $dir="MS.B.MAS";

    public static $route=[

        [
            'name'=>'DCM.home',
            'route'=>'/home',
            'method'=>'home',
            'type'=>'get',
        ],

        [
        'name'=>'DCM.action.make.image',
        'route'=>'/action/make/image',
        'method'=>'makeImage',
        'type'=>'get',
        ]

    ];

    public static $allOnSameconnection=false;


    public static $tables=[




    ];


}
