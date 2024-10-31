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
            $table->unsignedBigInteger('type_id');
            $table->foreign('type_id')
                  ->references('id')
                  ->on('type')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

                  $table->unsignedBigInteger('technology_id');
                  $table->foreign('technology_id')
                        ->references('id')
                        ->on('technology')
                        ->onUpdate('cascade')
                        ->onDelete('cascade');

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
        Schema::dropIfExists('technology_type');
    }

};
