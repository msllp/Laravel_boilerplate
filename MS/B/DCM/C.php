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

        return view("BM.V.genInvoice");
    }
}