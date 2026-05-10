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
        if (! Schema::hasTable('servers')) {
            Schema::create('servers', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('game');
                $table->string('ip');
                $table->string('status')->default('active');
                $table->integer('slots');
                $table->string('price')->nullable();
                $table->text('description')->nullable();
                $table->string('reserved_by')->nullable();
                $table->timestamp('reserved_until')->nullable();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servers');
    }
};
