<?php
/**
 * Created by PhpStorm.
 * User: ms
 * Date: 05-06-2019
 * Time: 12:54 PM
 */


return [

    "Master_Unit"=>[
        'tableName'=>'Master_Unit',
        'connection'=>'MAS_Master',
        'fields'=>
            [
                ['name'=>'UniqId','vName'=>'ID','type'=>'string', 'input'=>'locked', 'callback'=>'genUniqId', 'validation'=>['unique']],
                ['name'=>'UnitName','vName'=>'Product Name','type'=>'string', 'input'=>'text',  ],
                ['name'=>'UnitCode','vName'=>'Select display images','type'=>'string', 'input'=>'file',  ],
                ['name'=>'UnitDefaultSubCode','vName'=>'Select other images','type'=>'string', 'input'=>'file',  ],
                ['name'=>'Status','vName'=>'Active','type'=>'boolean', 'input'=>'radio','data'=>'getRole'  ],
            ],

        'action'=>[],
    ],


    "Master_Unit_Conversation"=>[
        'tableName'=>'Master_Unit_Conversation',
        'connection'=>'MAS_Master',
        'fields'=>
            [
                ['name'=>'UniqId','vName'=>'ID','type'=>'string', 'input'=>'locked', 'callback'=>'genUniqId', 'validation'=>['unique']],
                ['name'=>'UnitName','vName'=>'Product Name','type'=>'string', 'input'=>'text',  ],
                ['name'=>'UnitSubCode','vName'=>'Select display images','type'=>'string', 'input'=>'file',  ],
                ['name'=>'UnitUpSubCode','vName'=>'Select other images','type'=>'string', 'input'=>'file',  ],
                ['name'=>'UnitDownSubCode','vName'=>'Select other images','type'=>'string', 'input'=>'file',  ],
                ['name'=>'UnitUpNo','vName'=>'Select other images','type'=>'string', 'input'=>'file',  ],
                ['name'=>'UnitDownNo','vName'=>'Select other images','type'=>'string', 'input'=>'file',
                    ['name'=>'Status','vName'=>'Active','type'=>'boolean', 'input'=>'radio','data'=>'getRole'  ],
            ],

        'action'=>[],
    ],


]];
