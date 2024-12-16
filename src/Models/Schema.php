<?php

namespace Redooor\Redminschema\Models;

use Database\Factories\Redooor\Redminschema\Models\SchemaFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schema extends Model
{
  /** @use HasFactory<\Database\Factories\Redooor\Redminschema\Models\SchemaFactory> */
  use HasFactory;

  protected static function newFactory()
  {
    return SchemaFactory::new();
  }

  /**
   * Get the attributes that should be cast.
   *
   * @return array<string, string>
   */
  protected function casts(): array
  {
    return [
      'document' => 'array',
    ];
  }
}
