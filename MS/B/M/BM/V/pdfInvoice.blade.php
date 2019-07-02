<!DOCTYPE html>
<html>

<head>
</head>
<style type="text/css" >
    .table {
        display: table;
    }
    .tr {
        display: table-row;
    }
    .highlight {
        background-color: greenyellow;
        display: table-cell;
    }
</style>
<body>

<?php
/**
 * Created by PhpStorm.
 * User: ms
 * Date: 20-06-2019
 * Time: 04:19 PM
 */

//  dd($msdata);
?>


<link rel="stylesheet" type="text/css" href="{{asset('b/css/print.css?nocahe='. Carbon::now()->timestamp )}}">









<style type="text/css">

    @media print {
        .page {page-break-after: always;}
    }
</style>



<?php
//dd($msdata);
$company=
    [
        'NameOfBussiness'=>"Million Solutons LLP",

        'AddressStreet'=>"Street Nme",
        'AddressRoad'=>"Road nMae",
        'AddressCity'=>"City",
        'Pincode'=>"123456",
        'GstNo'=>"GST No",
        'PanNo'=>"Pan No",
        'BankName'=>"BOB",
        'AccountNo'=>"12324",
        'IfscCode'=>"Test",

    ]
;
//dd(\B\MAS\Model::getCompany());
//dd(array_chunk($data['Product'],5));




$Gst=[];


$data['Bill']['BillDate'] = Carbon::now();
$dt = Carbon::parse($data['Bill']['BillDate']);

$data['Bill']['BuyerAddress']="line1 1, Line 2, Line3";
$data['Bill']['BuyerName']="MS DEv ";
$data['Bill']['BuyerContactNo']="123456";
$data['Bill']['BuyerGST']="123456";
//dd($msdata);
$test=false;
if($test){

    //$msdata=json_decode($msdata);
    foreach ($msdata as $key=>$value){
        $msdata[$key]=    json_decode($value,true,5);
    }

}
//dd($msdata);
$data['Bill']['BillAmount']=$msdata['msDataTotal']['productTotal'];
$data['Bill']['BillTax']="100";
$data['Bill']['SGST']=$msdata['msDataTotal']['SGST'];
$data['Bill']['CGST']=$msdata['msDataTotal']['CGST'];






$data['Product']=[
    [],


];
$data['Bill']['UniqId']="21";
$addressArray=explode(',', $data['Bill']['BuyerAddress']);
//dd($addressArray);
//$data['Bill']['UniqId']=2;
$data['Bill']['BillDate']=$dt->format('d / m / Y');

?>


<div class="book">

    @foreach(array_chunk($data['Product'],13) as $mValue)

        <div class="page">
            <div class="subpage">

                <table class="table table-bordered">

                    <tr>
                        <td class="col-sm-6 " rowspan="3">

                            <strong>{{$company['NameOfBussiness']}}</strong>
                            <br>
                            {{$company['AddressStreet']}}
                            <br>
                            {{$company['AddressRoad']}}
                            <br>
                            {{$company['AddressCity']}} - {{$company['Pincode']}}
                            <br>GSTIN/UIN:{{$company['GstNo']}}


                        </td>

                        <td>Invoice No: {{$data['Bill']['UniqId']}}</td>
                        <td>Dated: {{$data['Bill']['BillDate']}}</td>

                    </tr>

                    <tr>

                        <td>Delivery Note: {{$data['Bill']['UniqId']}}</td>
                        <td>Mode/Terms of Payment: </td>

                    </tr>


                    <tr>

                        <td>Supplier's Ref.: {{$data['Bill']['UniqId']}}</td>
                        <td>Other Reference(s)</td>


                    </tr>


                    <tr>

                        <td rowspan="3"> Buyer<br><strong>{{$data['Bill']['BuyerName']}}</strong>
                            @foreach($addressArray as $line)

                                <br>{{ $line }}
                                @if(!$loop->last)
                                    ,
                                @endif

                            @endforeach
                            <br>Contact No: {{$data['Bill']['BuyerContactNo']}}
                            <br>GSTIN/UIN:{{$data['Bill']['BuyerGST']}}

                        </td>
                        <td colspan="2" rowspan="3"></td>


                    </tr>




                </table>


                <table class="table table-bordered table-condensed table-responsive">
                    <tr>
                        <th class="">No. </th>
                        <th>Description of Good </th>
                        <th>HSN/SAC </th>
                        <th colspan="2" class="text-center">Quantity </th>
                        <th>Rate </th>
                        <th>Per </th>
                        <th  colspan="2" class="">
                            <div class="text-center" style="border-bottom: 1px solid #dddddd;padding-bottom: 2px;">TAX</div>
                            <div >
                                <div class="text-left col-lg-6" style="padding-left: 0px; border-right: 1px solid #dddddd">SGST</div><div style="padding-right: 0px" class="text-right col-lg-6">CGST</div>
                            </div>

                        </th>
                        <th class="text-right">Amount</th>

                    </tr>

                    <?php

                    //$gstCode=new \B\MAS\Model(4);
                    $gstCode=[ "Demo"=> '10'];
                    $totalW=0;
                    //echo "<pre>";
                    //var_dump($mValue);
                    // dd($msdata);
                    foreach ($msdata['msData'] as $key=>$value){

                        $msValue[$key]=
                            [
                                'productName'=>$value['name'],
                                'productQty'=>$value['unit'],
                                'productUnit'=>$value['unit'],
                                'productUnitCost'=>$value['unitCost'],
                                'productUnitName'=>$value['unitName'],
                                'productSGST'=>$value['SGST'],
                                'productCGST'=>$value['CGST'],
                                'productSGSTRate'=>$value['SGSTrate'],
                                'productCGSTRate'=>$value['CGSTrate'],
                                'productTotal'=>$value['total'],
                                'productTaxCode'=>$value['taxCode'],

                            ]
                        ;
                    }

                    //  dd($msValue);
                    $outputData=[];
                    ?>


                    @foreach($msValue as $value)
                        <?php
                        if(array_key_exists('UnitCounts',$outputData) && array_key_exists(strtolower($value['productUnitName']),$outputData['UnitCounts'])){
                            $outputData['UnitCounts'][strtolower($value['productUnitName'])]=$outputData['UnitCounts'][strtolower($value['productUnitName'])]+$value['productUnit'];
                        }else{
                            $outputData['UnitCounts'][strtolower($value['productUnitName'])]=$value['productUnit'];
                        }

                        // dd($value);
                        if(array_key_exists('GSTCounts',$outputData) && array_key_exists($value['productTaxCode'],$outputData['GSTCounts'])){

                            $outputData['GSTCounts'][$value['productTaxCode']]=
                                ['SGST'=>$outputData['GSTCounts'][$value['productTaxCode']]['SGST'] +$value['productSGST'],'CGST'=>$outputData['GSTCounts'][$value['productTaxCode']]['CGST'] +$value['productCGST'],
                                    'withOutTaxProductTotal'=> $outputData['GSTCounts'][$value['productTaxCode']]['withOutTaxProductTotal']+ (float)$value['productTotal']

                                ];
                            $outputData['GSTCounts'][$value['productTaxCode']]['SGSTRate']=$value['productSGSTRate'];
                            $outputData['GSTCounts'][$value['productTaxCode']]['CGSTRate']=$value['productCGSTRate'];

                        }else{
                            $outputData['GSTCounts'][$value['productTaxCode']]=
                                ['SGST'=>$value['productSGST'],'CGST'=>$value['productCGST'],'withOutTaxProductTotal'=> (float)$value['productTotal'] -$value['productCGST'] -$value['productSGST']];
                            $outputData['GSTCounts'][$value['productTaxCode']]['SGSTRate']=$value['productSGSTRate'];
                            $outputData['GSTCounts'][$value['productTaxCode']]['CGSTRate']=$value['productCGSTRate'];
                        }



                        ?>

                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td> {{$value['productName']}}  </td>
                            <td>{{$value['productTaxCode']}}</td>
                            <td class="text-right"><strong > {{$value['productUnit']}}</strong> </td>
                            <td><strong>{{$value['productUnitName']}}</strong> </td>
                            <td class="text-right">{{$value['productUnitCost']}} ₹</td>
                            <td>{{$value['productUnitName']}}</td>
                            <td class="text-right">{{$value['productSGST']}} ₹</td>
                            <td class="text-right">{{$value['productCGST']}} ₹</td>
                            <td class="text-right"><strong>{{$value['productTotal']}} ₹</strong> </td>
                        </tr>


                    @endforeach



                    @if($loop->iteration == $loop->count)
                        <tr>

                            <td colspan="1" class="text-right"><strong>Total</strong></td>
                            <td colspan="8" class="text-left"><strong>
                                    @foreach($outputData['UnitCounts'] as $unitName=>$unitCount)

                                        @if($loop->last)
                                            {{ $unitCount }} {{ $unitName  }}.
                                        @else
                                            {{ $unitCount }} {{ $unitName  }},
                                        @endif
                                    @endforeach

                                </strong></td>

                            <td colspan="1" class="text-right"> <strong>{{  $data['Bill']['BillAmount'] }} ₹</strong> </td>

                        </tr>

                        <tr>
                            <td colspan="3" class="text-right"> CGST</td>
                            <td colspan="7" class="text-right"> <strong>{{ $data['Bill']['SGST']  }} ₹ </strong></td>

                        </tr>

                        <tr>
                            <td colspan="3" class="text-right"> SGST</td>
                            <td colspan="7" class="text-right"> <strong>{{ $data['Bill']['CGST'] }} ₹ </strong></td>

                        </tr>
                        <tr>
                            <td colspan="3" class="text-right">Total</td>
                            <td colspan="7" class="text-right"> <strong>{{ $data['Bill']['BillAmount'] + $data['Bill']['CGST']+ $data['Bill']['SGST'] }} ₹</strong> </td>

                        </tr>


                        <tr>

                            <td colspan="10">


                                <?php


                                //  $word = \MS\Core\Helper\Comman::toINR(round($data['Bill']['BillAmount'] + $data['Bill']['BillTax']),2);
                                $word=round($data['Bill']['BillAmount'] + $data['Bill']['BillTax']);
                                ?>
                                <span class="text-left"> Total Amount Chargeable<small> (in words)</small>  </span><br>
                                <strong class="text-capitalize">
                                    {{ $word }} Only</strong>


                            </td>
                        </tr>

                    <!--    <tr>

                    <td colspan="8" class="text-right"> {{ round($data['Bill']['BillAmount'],2) }} </td>

                </tr>
 -->
                    @endif

                </table>


                @if($loop->iteration == $loop->count)

                    <?php

                    // dd($Gst);

                    $totalGstValue=0;
                    $totalGstS=0;
                    $totalGstC=0;


                    ?>



                    <table class="table table-bordered table-condensed table-responsive">


                        <tr>


                            <th rowspan="2" class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-center">HSN/SAC</th>
                            <th rowspan="2">Taxable<br>Value</th>

                            <th rowspan="1" colspan="2">Central Tax</th>
                            <th rowspan="1" colspan="2">State Tax</th>
                            <th rowspan="2" class="text-right">Total<br><small> Tax Amount</small></th>
                        </tr>

                        <tr>

                            <th rowspan="1" class="text-right"> <small> Rate </small></th>
                            <th rowspan="1" class="text-right"><small>Amount</small></th>


                            <th rowspan="1" class="text-right"><small>Rate</small></th>
                            <th rowspan="1" class="text-right"><small>Amount</small></th>

                        </tr>






                        @foreach( $outputData['GSTCounts'] as $key=>$value )

                            <tr>
                                <?php

                                $totalGstValue=(float)$msdata['msDataTotal']['SGST']+(float)$msdata['msDataTotal']['CGST'];
                                // dd($outputData);

                                // dd( round (  $value['SGST']/($value['withOutTaxProductTotal'] +$value['SGST']  ) *100  ,2,PHP_ROUND_HALF_DOWN));

                                $value['SGSTRATE']=  round($value['SGST']/($value['withOutTaxProductTotal'] +$value['SGST']  ) *100 ,0,PHP_ROUND_HALF_UP ) ;
                                $value['CGSTRATE']= round($value['CGST']/($value['withOutTaxProductTotal'] +$value['CGST'] ) *100 ,0,PHP_ROUND_HALF_UP);
                                // dd($value);
                                // $totalGstC=(float)$totalGstC+($value['withOutTaxProductTotal'] * $value['RATE'])/100;

                                //$totalGstS=(float)$totalGstS+($value['TaxbleAmount'] * $value['RATE'])/100;


                                //  dd($msdata);

                                ?>
                                <td>{{ $key }}</td>

                                <td class="text-right">{{ round((float)$value['withOutTaxProductTotal'],2) }}  ₹</td>
                                <td class="text-right">{{(float)$value['CGSTRate']}} %</td>
                                <td class="text-right">{{$value['CGST']}} ₹</td>
                                <td class="text-right">{{(float)$value['SGSTRate']}} %</td>
                                <td class="text-right">{{$value['SGST']}} ₹</td>
                                <td class="text-right"><strong> {{ $value['CGST']+ $value['SGST']  }} ₹</strong></td>


                            </tr>

                        @endforeach

                        <tr>
                            <td class="text-right"><strong> Total</strong></td>

                            <td class="text-right"><strong>{{ round((float)$msdata['msDataTotal']['productTotal'],2) }} ₹</strong></td>
                            <td></td>
                            <td class="text-right"><strong>{{ round((float)$msdata['msDataTotal']['CGST'],2) }} ₹</strong></td>
                            <td></td>
                            <td class="text-right"><strong>{{ round((float)$msdata['msDataTotal']['SGST'],2) }} ₹</strong></td>
                            <td class="text-right"><strong>{{ (float)$msdata['msDataTotal']['SGST'] +(float)$msdata['msDataTotal']['CGST'] }} ₹</strong></td>

                        </tr>

                        <tr>
                            <td colspan="7">
                                <?php





                                //$word = \MS\Core\Helper\Comman::toINR(round((float)$totalGstS +  (float)$totalGstC),2);
                                $word="100";
                                ?>
                                <span class="text-left"> Total Tax Amount<small> (in words)</small>  </span><br>
                                <strong class="text-capitalize">
                                    {{ $word }} Only</strong>
                            </td>
                        </tr>




                    </table>
                @endif


                <div  style="display : table-row; vertical-align : bottom;">


                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <table  class="table  table-condensed table-responsive ">


                            <!--
                                           <tr> <td>Company's VAT TIN : </td> <td>24250700681</td></tr> -->
                            <tr>    <td>Company's GSTIN/UIN: </td> <td>{{$company['GstNo']}}</td></tr>
                            <tr>    <td>Company's PAN : </td> <td>{{$company['PanNo']}}</td></tr>

                            <tr> <td colspan="2">

                                    Declaration
                                </td> </tr>

                            <tr> <td colspan="2">

                                    We declare that this invoice shows the actual price of the
                                    goods described and that all particulars are true and correct.
                                </td> </tr>



                        </table>

                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <table  class="table  table-responsive ">

                            <tr><th colspan="2">Company's Bank Details</th></tr>

                            <tr>    <td>Bank Name : </td> <td>{{ $company['BankName']}}</td></tr>
                            <tr>    <td>A/c No.: </td> <td>{{$company['AccountNo']}}</td></tr>
                            <tr>    <td>Branch & IFS Code : </td> <td>{{$company['IfscCode']}}</td></tr>





                        </table>

                    </div>


                    <table  class="table  table-bordered table-condensed table-responsive">

                        <tr >

                            <th colspan="1" rowspan="1" style="padding-bottom: 80px;">Customer's Seal and Signature</th>
                            <th colspan="3" rowspan="1" class="text-right">for {{$company['NameOfBussiness']}} <br><br><br> </th>
                        </tr>
                        <tr>

                            <td colspan="1"></td>
                            <td  class="text-left">Prepared by</td>
                            <td  class="text-center">Verified by </td>
                            <td  class="text-right" >Authorised Signatory</td>

                        </tr>

                        <tr >

                            <td colspan="4" class="text-center"> <br></td>

                        </tr>


                        <tr style="padding: 100px;">

                            <td colspan="3" class="text-center">This is a Computer Generated Invoice Powered by MS-ERP</td>
                            <td colspan="1">Page {{$loop->iteration}} of {{$loop->count}}</td>

                        </tr>

                    </table>







                </div>

            </div>

        </div>
    @endforeach

</div>


</body>
</html>
