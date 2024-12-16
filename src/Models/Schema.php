<?php

namespace Redooor\Redminschema\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Redooor\Redminschema\Database\Factories\SchemaFactory;

class Schema extends Model
{
  /** @use HasFactory<\Redooor\Redminschema\Database\Factories\SchemaFactory> */
  use HasFactory;

  protected static function newFactory()
  {
    // Tell workbench where to find the factory
    return SchemaFactory::new();
  }
}
