<?php

namespace Emmandev\Larastore\Commands;

use Illuminate\Console\Command;

class InstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'larastore:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install larastore and its dependencies';

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
        // $this->call('vendor:publish', ['--provider' => Emmandev\Larastore\LarastoreServiceProvider::class, '--force' => 1]);
        // $this->call('migrate:refresh');
        // $this->call('db:seed', ['--class' => \LarastoreSeeder::class]);
    }
}
