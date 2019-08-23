<?php

namespace B\DCM;

//use B\MAS\R\AddMSCoreModule;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;

class C extends BaseController
{
    use  DispatchesJobs, ValidatesRequests;


    protected $data =
        [
            'logo' => "logo-a.png"

        ];


    public function home()
    {

        return view("MS::core.layouts.panel");
        //$db=\MS\Core\Helper\MSDB::makeDB('DCM_User_Data');
        //$db=\MS\Core\Helper\MSDB::makeDB('DCM_Master_Data');

        $array=[
            'Master_Image','Master_Container','Master_Port',
        ];


        $db= \MS\Core\Helper\MSDB::massMigrate(__NAMESPACE__,$array);
        dd($db);


        return view("BM.V.genInvoice");
    }


    public function makeImage(){
        return view("DCM.V.Blade.makeImageForm");
    }
}
