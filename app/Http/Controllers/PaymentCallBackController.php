<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Facades\Log;

class PaymentCallBackController extends Controller
{
    private function log($message)
    {
        Log::error("cs listed callback: $message");
    }

    private function exit($message = "invalid request")
    {
        $this->log("========end========");

        exit($message);
    }

    public function callback()
    {

        $this->log("========start========");

        Log::info("cs listed callback");

        $body = @file_get_contents("php://input");

        $response = json_decode($body, true);

        if (!$response) {
            $this->log("no/invalid response: $body");
            return $this->exit();
        }
        if (!isset($response["status"])) {

            $this->log("status / event / id misssing: $body");
            return $this->exit();
        }

        $cs_listed_trans_id = $response["partner_transaction_id"];

        $status = strtoupper($response["status"]);
        if (!in_array($status, ["SUCCESSFUL", "FAILED", "NOTFOUND"])) {
            $this->log('invalid Order status [' . $status . '] received');
            return $this->exit();
        }

        $this->log("body $body");

        try {
            $data = Order::whereOrder_number($cs_listed_trans_id)->first();
        } catch (\Exception $error) {
            $this->log('Exception :' . $error->getMessage());
        }

        if (empty($data)) {
            $this->log("Order with reference [$cs_listed_trans_id] was not found");
            return $this->exit();
        }

        $code_transaction = $data->order_number;

        if ($status === "FAILED") {
            Order::cancel($data->order_number);
            $this->log('Order [' . $code_transaction . '] was cancelled');
            return $this->exit("Transaction failed ");
        }

        Order::complete($data->order_number);
        $this->log('Order successfully completed');
    }
}
