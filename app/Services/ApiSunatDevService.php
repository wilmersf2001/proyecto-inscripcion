<?php

namespace App\Services;

use GuzzleHttp\Client;
use App\Models\Postulante;
use GuzzleHttp\Exception\RequestException;

class ApiSunatDevService
{

  public function getApplicantDataByDni(string $dni)
  {
    $token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6ImNvbnN1bHRhX2FwcHNAdW5wcmcuZWR1LnBlIn0.58I5Kpe2zCruVpBorLUH830mBK41QVm6d-9fzVcaqm0';
    $url = "https://dniruc.apisperu.com/api/v1/dni/{$dni}?token={$token}";
    try {
      $client = new Client();
      $response = $client->get($url);
      $statusCode = $response->getStatusCode();

      if ($statusCode === 200) {
        $data = $response->getBody()->getContents();
        $response = json_decode($data, true);
        if (key_exists('message', $response)) return new Postulante();
        return Postulante::fromArrayReniec($response);
      } else {
        return new Postulante();
      }
    } catch (RequestException $e) {
      return new Postulante();
    }
  }
}
