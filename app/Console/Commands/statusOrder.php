<?php

namespace trailBuddy\Console\Commands;

use Illuminate\Console\Command;

class statusOrder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'migrate:statusOrder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'runs the status of all migrations in specified order';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->call('migrate:status', ['--path' => 'database/migrations/first']);
        $this->call('migrate:status', ['--path' => 'database/migrations/second']);
        $this->call('migrate:status', ['--path' => 'database/migrations']);
        //
    }
}
