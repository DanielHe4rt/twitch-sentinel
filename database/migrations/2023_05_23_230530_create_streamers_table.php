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
        Schema::connection('scylla')->create('streamers', function (Blueprint $table) {
            $table->string('streamer_id');
            $table->string('streamer_username');
            $table->boolean('is_online');
            $table->timestamp('created_at');
            $table->primary(['streamer_id', 'created_at', 'streamer_username']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('streamers');
    }
};
