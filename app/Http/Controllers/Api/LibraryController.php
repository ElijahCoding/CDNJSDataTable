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
      return (new LibrariesService($this->client, $this->cache))->get();
    }
}
