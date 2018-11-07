<?php

namespace trailBuddy\Console\Commands;

use Illuminate\Console\Command;

class runMigrations extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'migrate:order';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'runs Migrations in a specified order';

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
        $this->call('migrate', ['--path' => 'database/migrations/first']);
        $this->call('migrate', ['--path' => 'database/migrations/second']);
        $this->call('migrate', ['--path' => 'database/migrations']);
        $this->call('migrate:status');
        //
    }
}
