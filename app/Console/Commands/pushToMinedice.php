<?php

namespace trailBuddy\Console\Commands;

use Illuminate\Console\Command;

class pushToMinedice extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'minedice:push';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'mirrors local with minedice using lftp';

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
        $this->info('Use the following commands to push to minedice:');
        $this->comment('lftp -u Team01@minedice.com,Team*01* ftp://minedice.com -e "set ftp:ssl-allow no; mirror -RL --only-newer; quit"');
        //
    }
}
