<?php
/**
 * Created by PhpStorm.
 * User: ms
 * Date: 18-03-2019
 * Time: 03:13 AM
 */

namespace B\BM;



use MS\Core\Module\Master;

class B extends Master
{

    public static $controller = "B\BM\C";
    public static $model = "B\BM\M";
    //  public static $dir="MS.B.MAS";
    public static $route=[

        [
            'name'=>'MAS.Index',
            'route'=>'/',
            'method'=>'index',
            'type'=>'get',
        ],

        [
            'name'=>'MAS.Index.data',
            'route'=>'/data',
            'method'=>'indexData',
            'type'=>'get',
        ],





    ];
    public static $allOnSameconnection=false;

public static $tables=[];

}
