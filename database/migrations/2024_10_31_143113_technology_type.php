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
        Schema::create('technology_type', function (Blueprint $table) {
            $table->foreignId('type_id')
                  ->nullable()
                  ->constrained('types')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

            $table->foreignId('technology_id')
                ->nullable()
                ->constrained('technologys')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->primary([
                'type_id',
                'technology_id',
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExist('technology_type');
    }
};
