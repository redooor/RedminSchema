<?php

namespace Redooor\Redminschema\Models;

use Database\Factories\Redooor\Redminschema\Models\AssetFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
  /** @use HasFactory<\Database\Factories\Redooor\Redminschema\Models\AssetFactory> */
  use HasFactory;

  /**
   * Specify table name so that it can be extended
   * Apply the table to all models extending from Asset
   */
  protected $table = "assets";

  protected static function newFactory()
  {
    return AssetFactory::new();
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
