<?php

namespace Redooor\Redminschema\Tests;

use Orchestra\Testbench\TestCase as OrchestraTestCase;
use Illuminate\Contracts\Config\Repository;
use Illuminate\Support\Facades\DB;

class TestCase extends OrchestraTestCase
{
  /**
   * Define environment setup.
   *
   * @param  \Illuminate\Foundation\Application  $app
   * @return void
   */
  protected function defineEnvironment($app)
  {
    $app['path.base'] = __DIR__ . '/../src';

    // Setup default database to use sqlite :memory:
    tap($app['config'], function (Repository $config) {
      $config->set('database.default', 'testbench');
      $config->set('database.connections.testbench', [
        'driver'   => 'sqlite',
        'database' => ':memory:',
        'prefix'   => '',
      ]);
    });
  }

  /**
   * Sets up environment for each test.
   * Temporariliy increase memory limit, run migrations and set Mail::pretend to true.
   */
  public function setUp(): void
  {
    parent::setUp();

    ini_set('memory_limit', '400M'); // Temporarily increase memory limit to 400MB

    /**
     * By default, Laravel keeps a log in memory of all queries that have been run for
     * the current request. Disable logging for test to reduce memory.
     */
    DB::disableQueryLog();

    // Call migrations for the package
    $this->artisan('migrate', [
      '--database' => 'testbench'
    ]);
  }

  /**
   * Get package providers.
   *
   * @param  \Illuminate\Foundation\Application  $app
   * @return array<int, class-string<\Illuminate\Support\ServiceProvider>>
   */
  protected function getPackageProviders($app)
  {
    return [
      'Redooor\Redminschema\ServiceProvider',
    ];
  }

  /**
   * Override application aliases.
   *
   * @param  \Illuminate\Foundation\Application  $app
   * @return array<string, class-string<\Illuminate\Support\Facades\Facade>>
   */
  protected function getPackageAliases($app)
  {
    return [];
  }
}
