<?php
/**
 * Created by PhpStorm.
 * User: ms
 * Date: 18-03-2019
 * Time: 03:13 AM
 */

namespace B\MAS;



use MS\Core\Module\Master;

class B extends Master
{

    public static $controller="B\MAS\C";
    public static $model="B\MAS\M";
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



        [
            'name'=>'PM.Add.Product',
            'route'=>'/addProduct',
            'method'=>'productAddForm',
            'type'=>'get',
        ],

        [
            'name'=>'BM.Generate.Invoice.PDF.Post',
            'route'=>'/fromAppGenaratePdf',
            'method'=>'genarateInvoicePDFPost',
            'type'=>'post',
        ],


        [
            'name'=>'BM.Generate.Invoice.PDF',
            'route'=>'/fromAppGenaratePdf',
            'method'=>'genarateInvoicePDF',
            'type'=>'get',
        ],


        [
            'name'=>'BM.Generate.Invoice.PDF',
            'route'=>'/getHsnCode',
            'method'=>'findGst',
            'type'=>'get',
        ],


        [
            'name'=>'BM.Generate.Invoice.for.App',
            'route'=>'/gen/invoice/app',
            'method'=>'genInvFroApp',
            'type'=>'get',
        ],

        [
            'name'=>'BM.Generate.Invoice.for.App',
            'route'=>'/get/gstrate/from/code',
            'method'=>'findGstRate',
            'type'=>'get',
        ],








    ];


    public static $allOnSameconnection=false;


    public static $tables=[




    ];

}
