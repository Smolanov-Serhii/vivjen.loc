<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function payment()
    {
        $mrh_login = "RussianFitnessForum";
        $mrh_pass1 = "GQx7amR3HV";

        $inv_id = 5;

        $inv_desc = "desc";
        $out_summ = "10";

        $crc = md5("$mrh_login:$out_summ:$inv_id:$mrh_pass1");

        $url = "https://auth.robokassa.ru/Merchant/Index.aspx?MerchantLogin=$mrh_login&OutSum=$out_summ&InvId=$inv_id&Description=$inv_desc&SignatureValue=$crc";

        Header("Location:" . $url);
        exit();
    }

}
