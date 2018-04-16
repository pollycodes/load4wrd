<?php

namespace PollyCodes\Load4wrd;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;

class Loading extends Controller
{
  public function Balance() {
    $response = $this->curl(null, "balance");
    return $response;
  }

  public function Product_Codes($network = null) {
    $data = null;
    if($network != null) {
      $data = array(
        "network" => $network
      );
    }
    $response = $this->curl($data, "product-codes");
    return $response;
  }

  public function Send($target, $code) {
    $data = array(
      "target" => $target,
      "code" => $code
    );
    $response = $this->curl($data, "load");
    return $response;
  }

  public function curl($data, $command) {
    $services = Config::get("services")["load4wrd"];
    $username = $services["username"];
    $password = $services["password"];
    $authorization = base64_encode($username . ":" . $password);

    switch ($command) {
      case 'load':
        $url = "https://load4wrd.kpa.ph/api/v1/load";
        break;

      case 'product-codes':
        $url = "https://load4wrd.kpa.ph/api/v1/product-codes";
        break;

      default:
        $url = "https://load4wrd.kpa.ph/api/v1/balance";
        break;
    }

    // to json
    $to_json = json_encode($data);

    // Added JSON Header
    $headers = array(
      "Authorization: Basic ". $authorization,
      "Content-Type: application/json"
    );

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $to_json);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $result = json_decode(curl_exec($ch), true);
    curl_close($ch);

    return $result;
  }

}
