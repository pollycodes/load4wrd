<?php

namespace PollyCodes\Load4wrd;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;

class Loading extends Controller
{

  public static $host_url = "http://api.pollyload.com";

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

  public function Check_Product_Code($code) {
    $data = array(
      "code" => $code
    );
    $response = $this->curl($data, "check-product-code");
    return $response;
  }

  public function Send($target, $code, $uniq_ref) {
    $data = array(
      "target" => $target,
      "code" => $code,
      "uniq_ref" => $uniq_ref
    );
    $response = $this->curl($data, "load");
    return $response;
  }

  public function Verify($reference) {
    $data = array(
      "reference" => $reference
    );
    $response = $this->curl($data, "verify");
    return $response;
  }

  public function curl($data, $command) {

    $uri = $this::$host_url; //"https://load4wrd.kpa.ph";

    $services = Config::get("services")["load4wrd"];
    $username = $services["username"];
    $password = $services["password"];
    $authorization = base64_encode($username . ":" . $password);

    switch ($command) {
      case 'load':
        $url = $uri . "/api/v1/load";
        break;
      
      case 'verify':
        $url = $uri . "/api/v1/load-verify";
        break;

      case 'product-codes':
        $url = $uri . "/api/v1/product-codes";
        break;

      case 'check-product-code':
        $url = $uri . "/api/v1/check-product-code";
        break;

      default:
        $url = $uri . "/api/v1/balance";
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
