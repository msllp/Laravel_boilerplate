<?php

namespace B\MAS;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Razorpay\Api;

class C extends BaseController
{
    use  DispatchesJobs, ValidatesRequests;


    protected $data=
        [
            'logo'=>"logo-a.png"

        ];


    public function genInvFroApp(){


        return view("BM.V.genInvoice");
    }
    public function index(Request $r){

        //dd(new M(__NAMESPACE__ ) );
        $m=new \MS\Core\Helper\MSDB(__NAMESPACE__,'Master_User');
        $m->msData=$m->rowGet(['FirstName'=>"Mitul"]);
        dd($m->notify());
        dd($m->notify(new N()));
        dd(new N ());
//        //dd($r->all());
//        header("Access-Control-Allow-Origin: *");
//        $input=$r->all();
//
//        $url = "https://books.zoho.com/api/v3/meta/hsnsaccodes?search_text=".$input['hsn']; // http://localhost:8000/template/1/11
//        $html =  file_get_contents($url)  ;

        return view("BM.V.viewGST");


       // dd($html)  ;
     //   return $html;
      //  $html =  file_get_contents($url) .$style ;
        //dd($html);
        //return $html;
       //return view("BM.V.genInvoice");

        $pdf = \PDF::loadView('BM.V.genInvoice');
       // dd($pdf);
        return $pdf->download('invoice.pdf');
        $link=\MS\Core\Helper\MSPay::makePaymentLink(100,['customerEmail'=>'maxirooney@millionsllp.com',"customerNumber"=>"9662611234",'description'=>"Test From Class"]);
        return redirect($link['link']);
        $id="rzp_test_hWAPfGnN0KwMXK";
        $secret="f2CxU8JV3aWiTAjMY2X5y630";
        $razorPay=new Api\Api($id,$secret);

        $razorPayMaster=$razorPay->invoice->create(
            [
                'type' => 'link',
                'amount' =>6000,
                'description' => 'For MSLLP Test purpose Test',
                'customer' => [
                    'email' => 'mitul@millionsllp.com',
                    "contact"=> "9662611234",
                ],

            ]
        );



        dd(
         $razorPayMaster->notifyBy('sms')   );


        $r=$r->all();
//dd($r);
        if(array_key_exists('dataLink',$r) && $r['dataLink']){

            return response()->json([
                [
                    'name'=>'ProductName',
                    'msg'=>["erroe"]
                    

                ]


            ],422);

        }

        //dd(B::getTable());

        //return view("MS::core.layouts.login");
        //$m=new \MS\Core\Helper\MSDB(__NAMESPACE__,'anuj_test');


       // $code=\MS\Core\Helper\Comman::encode("mitul");

     //   dd(\MS\Core\Helper\Comman::decode($code));

        return view("BM.V.genInvoice");

        $m=new \MS\Core\Helper\MSDB("B\BM","Master_Booking",[]);
        //$m->migrate();
        return $m->displayFrom();

        //return view("MS::core.layouts.login")->with('data',$this->data);

    }

    public function productAddForm(Request $r){

        return $this->index($r);

        return view("MAS.V.productAdd")->with('data',$this->data);

    }

    public function prdocutAdd(){


        $m=new \MS\Core\Helper\MSDB("B\HM","Master_Product",[]);
        dd($m->model->migrate());
        dd($m->displayFrom()->reder());

    }

public function genarateInvoicePDF(Request $r){


//dd($_SERVER);

      // return view("BM.V.pdfInvoice");
    $pdf = \PDF::loadView('BM.V.pdfInvoice');
    return $pdf->setPaper('a4', 'landscape')->download('invoice.pdf');


}

public function findGst(Request $r){
    //header("Access-Control-Allow-Origin: *");
    $input=$r->all();

  //  dd($input);

   // dd();

    $url = "https://books.zoho.com/api/v3/meta/hsnsaccodes?search_text=".urlencode (\MS\Core\AI\Master::getLazyGiveAccurate($input['key'])); // http://localhost:8000/template/1/11
    $html =  file_get_contents($url)  ;
    $jdata=json_decode($html,true);
    return response()->json($jdata,200);

    return $html;
}

    public function findGstRate(Request $r){
        //header("Access-Control-Allow-Origin: *");
        $input=$r->all();

        $url = "https://www.paisabazaar.com/index.php"; // http://localhost:8000/template/1/11
        $html =  file_get_contents($url)  ;
        $url = "https://www.paisabazaar.com/wp-admin/admin-ajax.php?action=gst_ajax_action&text=".urlencode ($input['key']); // http://localhost:8000/template/1/11
        $html =  file_get_contents($url)  ;
        $jdata=json_decode($html,true);
        dd($jdata);
        return response()->json($jdata,200);

        return $html;
    }

    public function genarateInvoicePDFPost(Request $r){

//        $str='[{"name":"Demo","taxCode":"123\",\"unit\":\"10\",\"unitCost\":\"10\",\"unitName\":\"KG\",\"SGST\":10,\"CGST\":12,\"total\":122,\"value\":\"[{\\\"name\\\":\\\"Demo\\\",\\\"taxCode\\\":\\\"123\\\",\\\"unit\\\":\\\"10\\\",\\\"unitCost\\\":\\\"10\\\",\\\"unitName\\\":\\\"KG\\\",\\\"SGST\\\":10,\\\"CGST\\\":12,\\\"total\\\":122},{\\\"name\\\":\\\"Demo 1\\\",\\\"taxCode\\\":\\\"564\\\",\\\"unit\\\":\\\"10\\\",\\\"unitCost\\\":\\\"15253\\\",\\\"unitName\\\":\\\"KG\\\",\\\"SGST\\\":22880,\\\"CGST\\\":0,\\\"total\\\":175410},{\\\"name\\\":\\\"Demo 2\\\",\\\"taxCode\\\":\\\"65465343\\\",\\\"unit\\\":\\\"125\\\",\\\"unitCost\\\":\\\"10000\\\",\\\"unitName\\\":\\\"KG\\\",\\\"SGST\\\":62500,\\\"CGST\\\":231250,\\\"total\\\":1543750}]\",\"key\":\"msData\"}]';
//
//        dd(str_replace('\\',"",$str));

        $data=$r->input();
       // dd($data['msData']);
        //return response()->json($data['msData'],200);
        return view("BM.V.pdfInvoice")->with('msdata',$data);

        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML(view("BM.V.pdfInvoice")->with('msdata',$data)->render());
        return $pdf->stream();

        $pdf = \PDF::loadView('BM.V.pdfInvoice',['msdata'=>$data]);
       // dd($pdf);
        return $pdf->setPaper('a4', 'landscape')->download('invoice.pdf');
        //dd($r->input());
    }



}
