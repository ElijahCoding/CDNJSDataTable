<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use GuzzleHttp\Client as Guzzle;
use App\Services\Cache\RedisAdapter;
use App\Http\Controllers\Controller;

abstract class DataTableController extends Controller
{
  protected $client;

  protected $cache;

  public function __construct(Guzzle $client, RedisAdapter $cache)
  {
    $this->client = $client;
    $this->cache = $cache;
  }
}
