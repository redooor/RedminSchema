<?php

namespace Redooor\Redminschema\Tests\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Redooor\Redminschema\Models\Schema;
use Redooor\Redminschema\Tests\TestCase;
use Orchestra\Testbench\Concerns\WithWorkbench;

class SchemaTest extends TestCase
{
    use WithWorkbench, RefreshDatabase;

    /**
     * A basic test example.
     */
    public function test_that_creation_is_true(): void
    {
        $this->assertDatabaseCount("schemas", 0);

        $schema = Schema::factory()->create();
        $this->assertDatabaseHas('schemas', [
            'id' => $schema->id,
        ]);
    }
}
