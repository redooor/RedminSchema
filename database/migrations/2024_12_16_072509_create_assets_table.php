<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->engine('InnoDB');
            $table->charset('utf8mb4');
            $table->collation('utf8mb4_unicode_ci');
            //
            $table->id();
            $table->string('schema', 255); // E.g. schema.type.order
            $table->string('uuid', 255)->unique(); // E.g. 5fbcb4837d8cc5.32021334
            $table->string('owner', 255)->nullable(); // E.g. Parent ID
            $table->string("name");
            $table->string("description")->nullable();
            $table->json("document");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assets');
    }
};
