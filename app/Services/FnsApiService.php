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
      'inn' => $inn,
      'requestDate' => $request_date,
    ];

    try {
      $response = $client->post($url, ['json' => $form_params]);
      $response_data = json_decode($response->getBody()->getContents());
      $inn_status = $response_data->status ?? false;
      $identificationNumber->update(['inn_status' => $inn_status, 'service_response' => $response_data]);
    } catch (TransferException $e) {
      $identificationNumber->update(['error' => Psr7\Message::toString($e->getResponse())]);
    }
  }

}
