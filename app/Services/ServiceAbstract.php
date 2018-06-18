<?php

namespace App\Services;

use GuzzleHttp\Client as Guzzle;
use App\Services\Cache\RedisAdapter;

abstract class ServiceAbstract
{
  protected $client;

  protected $cache;

  public function __construct(Guzzle $client, RedisAdapter $cache)
  {
    $this->client = $client;
    $this->cache = $cache;
  }

  abstract public function get();
}
