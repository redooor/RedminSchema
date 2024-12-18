<?php

namespace Redooor\Redminschema\Models;

use Database\Factories\Redooor\Redminschema\Models\AssetFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

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

  // Strip special characters, if empty return default
  private static function checkInput($input, $limit, $default)
  {
    $strip = preg_replace("/[^A-Za-z0-9]/", '', strtolower($input));
    if (empty($strip)) {
      return $default;
    }
    return substr($strip, 0, $limit);
  }

  // Returns unique value based on given length
  private static function uniqid($length = 13)
  {
    if (function_exists('random_bytes')) {
      $bytes = random_bytes(ceil($length / 2));
    } elseif (function_exists('openssl_random_pseudo_bytes')) {
      $bytes = openssl_random_pseudo_bytes(ceil($length / 2));
    } else {
      return Str::random($length);
    }
    return substr(bin2hex($bytes), 0, $length);
  }

  /**
   * Helper to ensure uuid is unique
   */
  public static function findUniqueId($prefix = "asset")
  {
    $found = true;

    $prefix = self::checkInput($prefix, 16, ''); // max size 16
    $prefix_count = strlen($prefix);

    while ($found) {
      $suffix = self::uniqid(40 - $prefix_count); // total size 40
      $pre_uuid = uniqid($prefix, true) . $suffix; // size 23 + 40 = 63
      $uuid = str_replace('.', '-', $pre_uuid);
      $exist = self::where('uuid', $uuid)->first();
      if (!$exist) {
        $found = false; // exit while loop
      }
    }

    return $uuid;
  }

  /**
   * Query is scoped to specific schema type.
   */
  protected static function booted(): void
  {
    static::creating(function (Asset $content) {
      $content->uuid = self::findUniqueId();
    });
  }
}
