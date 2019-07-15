<?php

namespace Tjventurini\VoyagerShop\Console\Commands;

use Illuminate\Console\Command;

class VoyagerShopInstall extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'voyager-shop:install {-- force : Wether the whole project should be refreshed.}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install the Voyager Shop.';

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
        // check if we are in producton
        if (config('app.env') == 'production') {
            // if so, print error message
            $this->error('You are in production mode!');
            // terminate command with error state (>0)
            return 1;
        }

        // install voyager
        $this->installVoyager();

        // provision the packages
        $this->provisionPackages();

        // run migrations
        $this->runMigrations();

        // run seeders
        $this->runSeeders();

        // install passport
        $this->call('passport:install');

        // clear cache
        $this->call('cache:clear');
    }

    /**
     * Install the voyager admin panel.
     *
     * @return void
     */
    private function installVoyager(): void
    {
        $this->call('voyager:install');
    }

    /**
     * Run command but check for force flag and append if set.
     *
     * @param  string $command
     *
     * @return void
     */
    public function customCall(string $command, array $options = []): void
    {
        // get force value
        $force = $this->option('force');

        // append force flag if force flag is set
        if ($force) {
            $options['--force'] = true;
        }

        // run command
        $this->call($command, $options);
    }

    /**
     * Provision the packages.
     *
     * @return void
     */
    private function provisionPackages(): void
    {
        // tags
        $this->customCall('vendor:publish', ['--provider' => "Tjventurini\VoyagerTags\VoyagerTagsServiceProvider", '--tag' => 'config']);
        $this->customCall('vendor:publish', ['--provider' => "Tjventurini\VoyagerTags\VoyagerTagsServiceProvider", '--tag' => 'views']);
        $this->customCall('vendor:publish', ['--provider' => "Tjventurini\VoyagerTags\VoyagerTagsServiceProvider", '--tag' => 'lang']);
        $this->customCall('vendor:publish', ['--provider' => "Tjventurini\VoyagerTags\VoyagerTagsServiceProvider", '--tag' => 'graphql']);

        // projects
        $this->customCall('vendor:publish', ['--provider' => "Tjventurini\VoyagerProjects\VoyagerProjectsServiceProvider", '--tag' => 'config']);
        $this->customCall('vendor:publish', ['--provider' => "Tjventurini\VoyagerProjects\VoyagerProjectsServiceProvider", '--tag' => 'views']);
        $this->customCall('vendor:publish', ['--provider' => "Tjventurini\VoyagerProjects\VoyagerProjectsServiceProvider", '--tag' => 'lang']);
        $this->customCall('vendor:publish', ['--provider' => "Tjventurini\VoyagerProjects\VoyagerProjectsServiceProvider", '--tag' => 'graphql']);

        // shop
        $this->customCall('vendor:publish', ['--provider' => "Tjventurini\VoyagerShop\VoyagerShopServiceProvider", '--tag' => 'config']);
        $this->customCall('vendor:publish', ['--provider' => "Tjventurini\VoyagerShop\VoyagerShopServiceProvider", '--tag' => 'views']);
        $this->customCall('vendor:publish', ['--provider' => "Tjventurini\VoyagerShop\VoyagerShopServiceProvider", '--tag' => 'lang']);
        $this->customCall('vendor:publish', ['--provider' => "Tjventurini\VoyagerShop\VoyagerShopServiceProvider", '--tag' => 'graphql']);
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    private function runMigrations(): void
    {
        // get force value
        $force = $this->option('force');

        // if force flag is set we want to refresh the migrations
        if ($force) {
            $this->call('migrate:refresh');
            return;
        }

        // otherwise we run normal migrations
        $this->call('migrate');
    }

    /**
     * Run the seeders.
     *
     * @return void
     */
    private function runSeeders(): void
    {
        // voyager
        $this->call('db:seed', ['--class' => "VoyagerDatabaseSeeder"]);

        // tags
        $this->call('db:seed', ['--class' => "Tjventurini\VoyagerTags\Seeds\VoyagerTagsDatabaseSeeder"]);

        // projects
        $this->call('db:seed', ['--class' => "Tjventurini\VoyagerProjects\Seeds\VoyagerProjectsDatabaseSeeder"]);

        // shop
        $this->call('db:seed', ['--class' => "Tjventurini\VoyagerShop\Seeds\VoyagerShopDatabaseSeeder"]);
    }
}
