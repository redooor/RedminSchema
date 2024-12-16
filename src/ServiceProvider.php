<?php

namespace Redooor\Redminschema;

use Illuminate\Foundation\Console\AboutCommand;
use Illuminate\Support\ServiceProvider as LaravelServiceProvider;

class ServiceProvider extends LaravelServiceProvider
{
  /**
   * Register any application services.
   */
  public function register(): void
  {
    //
  }

  /**
   * Bootstrap any application services.
   */
  public function boot(): void
  {
    AboutCommand::add('RedminSchema', fn() => ['Version' => '1.0.0']);

    // Load migrations
    $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
  }
}
