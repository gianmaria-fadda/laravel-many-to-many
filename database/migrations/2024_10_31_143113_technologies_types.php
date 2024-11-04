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
        Schema::create('technologies_types', function (Blueprint $table) {
            $table->unsignedBigInteger('type_id');
            $table->foreign('type_id')
                  ->references('id')
                  ->on('types')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

            $table->unsignedBigInteger('technology_id');
            $table->foreign('technology_id')
                ->references('id')
                ->on('technologies')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->timestamps();

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
        Schema::dropIfExists('technologies_types');
    }

};
