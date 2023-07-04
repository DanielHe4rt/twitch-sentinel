<?php

use DanielHe4rt\Scylloquent\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::connection('scylla')->create('messages_count', function (Blueprint $table) {
            $table->string('streamer_id');
            $table->counter('messages_count');
            $table->primary(['streamer_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages_count');
    }
};
