<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\LibrariesService;
use App\Http\Controllers\Controller;

class LibraryController extends DataTableController
{
    public function index()
    {
      return (new LibrariesService($this->client, $this->cache))->get();
    }
}
