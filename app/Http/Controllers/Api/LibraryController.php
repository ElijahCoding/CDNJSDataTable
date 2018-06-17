<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use GuzzleHttp\Client as Guzzle;
use App\Services\LibrariesService;
use App\Http\Controllers\Controller;
use App\Services\Cache\RedisAdapter;

class LibraryController extends Controller
{
    protected $client;
    
    protected $cache;

    public function __construct(Guzzle $client, RedisAdapter $cache)
    {
      $this->client = $client;
      $this->cache = $cache;
    }

    public function index()
    {
      $data = $this->cache->remember('libraries', 20, function () {
        return json_encode((new LibrariesService($this->client))->get());
      });

      return json_decode($data);

    }
}
