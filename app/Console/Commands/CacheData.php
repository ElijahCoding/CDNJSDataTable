<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
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

    public function __construct(RedisAdapter $cache)
    {
        parent::__construct();
        $this->cache = $cache;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
      $data = $this->cache->remember('libraries', 20, function () {
        return json_encode((new LibrariesService($this->client))->get());
      });
    }
}
