<?php

namespace App\Services;

use App\Services\ServiceAbstract;
use App\Services\Transformers\LibraryTransformer;

class LibrariesService extends ServiceAbstract
{
  public function get()
  {
    $libraries = $this->cache->remember('libraries', 20, function () {
      $response = $this->client->request('GET', 'https://api.cdnjs.com/libraries');

      return json_encode(json_decode($response->getBody())->results);
    });

    return json_decode($libraries);
  }
}
