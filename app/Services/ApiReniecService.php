<?php

namespace App\Services;

use GuzzleHttp\Client;

class ApiReniecService {
  public $token;
  public $applicant;

  public function __construct(string $token)
  {
    $this->token = $token;
    $this->applicant = new Client(['base_uri' => 'https://api.apis.net.pe', 'verify' => false]);
  }

  public function getApplicantDataByDni(string $dni){
    $parameters = [
      'http_errors' => false,
      'connect_timeout' => 5,
      'headers' => [
          'Authorization' => 'Bearer '.$this->token,
          'Referer' => 'https://apis.net.pe/api-consulta-ruc',
          'User-Agent' => 'laravel/guzzle',
          'Accept' => 'application/json',
      ],
      'query' => ['numero' => $dni]
    ];

    $res = $this->applicant->request('GET', '/v2/reniec/dni', $parameters);
    $response = json_decode($res->getBody()->getContents(), true);
    return $response['nombres'];
  }
}