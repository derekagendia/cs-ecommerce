<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentApiController extends Controller
{

    public static function pay(array $data)
    {
        Define('USERNAME',"3CED9BA7E7675952241701C97F015D6DEAC4FA197C6732DA5BF2BE46C536F74B");
        Define('PASSWORD',"F41A61A12B955715C2E48E7BAE91A9C28DE8CFFD7E3E881B0EBA5AF0345F0A00");
        Define('LOGIN_AGENT',"673970274");
        Define('PASSWORD_AGENT',"3RT2uuS9ku");

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://api.gutouch.com/dist/api/touchpayapi/v1/CSLIS6284/transaction?loginAgent=".LOGIN_AGENT."&passwordAgent=".PASSWORD_AGENT."",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "PUT",
            CURLOPT_POSTFIELDS => json_encode($data),
            CURLOPT_HTTPHEADER => [
                "Content-Type: application/json"
            ],
            CURLOPT_HTTPAUTH => CURLAUTH_DIGEST,
            CURLOPT_USERPWD => USERNAME . ":" . PASSWORD
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return json_decode($err,true);
        }

        return json_decode($response,true);
    }

    public static function checkStatus ()
    {


        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://api.gutouch.com/v1/CSLIS6284/check_status",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "{\n\t\"partner_id\":\"PAW1759\",\n\t\n\t\"partner_transaction_id\":\"OrderNumber-627c528d1dc07\",\n\t\n\t\"login_api\":\"673970274\",\n\t\n\t\"password_api\":\"3RT2uuS9ku\"\n\t}",
            CURLOPT_HTTPHEADER => [
                "Authorization: Basic M0NFRDlCQTdFNzY3NTk1MjI0MTcwMUM5N0YwMTVENkRFQUM0RkExOTdDNjczMkRBNUJGMkJFNDZDNTM2Rjc0QjpGNDFBNjFBMTJCOTU1NzE1QzJFNDhFN0JBRTkxQTlDMjhERThDRkZEN0UzRTg4MUIwRUJBNUFGMDM0NUYwQTAw",
                "Content-Type: application/json"
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            echo $response;
        }
    }
}
