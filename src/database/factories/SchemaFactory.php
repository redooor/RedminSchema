<?php

namespace Redooor\Redminschema\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Redooor\Redminschema\Models\Schema>
 */
class SchemaFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array
  {
    return [
      "name" => fake()->name(),
      "description" => fake()->words(),
      "document" => [
        "firstname" => "string",
        "lastname" => "string"
      ]
    ];
  }
}
