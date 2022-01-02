<?php

namespace App\Services;

use App\IdentificationNumber;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\TransferException;

class FnsApiService
{

  public function check_inn($inn, $identificationNumber)
  {
    $url = 'https://statusnpd.nalog.ru:443/api/v1/tracker/taxpayer_status';
    $request_date = now()->format('Y-m-d');
    $client = new Client([
      'timeout' => 120,
    ]);
    $form_params = [
      // 'inn' => $inn,
      // 'json' => $request_date,
      'inn' => 0,
      'json' => '',
    ];

    try {
      $response = $client->post($url, ['form_params' => $form_params]);
      $inn_status = json_decode($response->getBody()->getContents())['status'] ?? false;
      $identificationNumber->update(['inn_status' => $inn_status, 'service_response' => $response->getBody()->getContents()]);
    } catch (TransferException $e) {
      $identificationNumber->update(['error' => Psr7\Message::toString($e->getResponse())]);
    }
  }

}
