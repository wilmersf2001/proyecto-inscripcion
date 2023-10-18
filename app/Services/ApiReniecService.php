<?php

namespace App\Services;

use App\Models\Postulante;
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

    $res = $this->applicant->request('GET', '/v2/reniec/dni', $parameters)->getBody()->getContents();
    $response = json_decode($res, true);
    
    if (key_exists('message', $response)) return $response['message'];

    return Postulante::fromArrayReniec($response);
  }
}