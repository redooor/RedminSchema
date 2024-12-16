<?php

namespace Redooor\Redminschema\Tests\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Redooor\Redminschema\Models\Schema;
use Redooor\Redminschema\Tests\TestCase;
use Orchestra\Testbench\Concerns\WithWorkbench;
use Redooor\Redminschema\Models\Asset;

class AssetTest extends TestCase
{
  use WithWorkbench, RefreshDatabase;

  /**
   * A basic test example.
   */
  public function test_that_creation_is_true(): void
  {
    $this->assertDatabaseCount("assets", 0);

    $schema = Schema::factory()->create();
    $asset = Asset::factory()->create([
      "schema_id" => $schema->id
    ]);
    $this->assertDatabaseHas('assets', [
      'id' => $asset->id,
    ]);
  }
}
