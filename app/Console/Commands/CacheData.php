<?php

namespace App\Console\Commands;

use App\Services\LibrariesService;
use Illuminate\Console\Command;
use GuzzleHttp\Client as Guzzle;
use App\Services\Cache\RedisAdapter;

class CacheData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'data:cache';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */

    protected $cache;

    protected $client;

    public function __construct(RedisAdapter $cache, Guzzle $client)
    {
        parent::__construct();
        $this->cache = $cache;
        $this->client = $client;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
      $this->cache->forgetAll();

      $data = $this->cache->remember('libraries', 20, function () {
        return json_encode((new LibrariesService($this->client))->get());
      });
    }
}
