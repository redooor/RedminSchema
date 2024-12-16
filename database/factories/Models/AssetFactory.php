<?php

namespace Database\Factories\Redooor\Redminschema\Models;

use Illuminate\Database\Eloquent\Factories\Factory;
use Redooor\Redminschema\Models\Asset;
use Redooor\Redminschema\Models\Schema;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Redooor\Redminschema\Models\Asset>
 */
class AssetFactory extends Factory
{
  /**
   * The name of the factory's corresponding model.
   *
   * @var class-string<\Illuminate\Database\Eloquent\Model>
   */
  protected $model = Asset::class;

  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array
  {
    return [
      "name" => fake()->name(),
      "description" => fake()->words(3, true),
      "document" => [
        "firstname" => "string",
        "lastname" => "string"
      ],
      "schema_id" => Schema::factory()
    ];
  }
}
