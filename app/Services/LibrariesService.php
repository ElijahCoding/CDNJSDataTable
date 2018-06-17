<?php

namespace App\Services;

use App\Services\ServiceAbstract;

class LibrariesService extends ServiceAbstract
{
  public function get()
  {
    $response = $this->client->request('GET', 'https://api.cdnjs.com/libraries');

    return json_decode($response->getBody());

  }
}
