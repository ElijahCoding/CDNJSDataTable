<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use GuzzleHttp\Client as Guzzle;
use App\Services\LibrariesService;
use App\Http\Controllers\Controller;

class LibraryController extends Controller
{
    protected $client;

    public function __construct(Guzzle $client)
    {
      $this->client = $client;
    }

    public function index()
    {
      $response = $this->client->request('GET', 'https://api.cdnjs.com/libraries');

      return (new LibrariesService($this->client))->get();
    }
}
