<?php

namespace Database\Factories\Redooor\Redminschema\Models;

use Illuminate\Database\Eloquent\Factories\Factory;
use Redooor\Redminschema\Models\Schema;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Redooor\Redminschema\Models\Schema>
 */
class SchemaFactory extends Factory
{
  /**
   * The name of the factory's corresponding model.
   *
   * @var class-string<\Illuminate\Database\Eloquent\Model>
   */
  protected $model = Schema::class;

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
      ]
    ];
  }
}
