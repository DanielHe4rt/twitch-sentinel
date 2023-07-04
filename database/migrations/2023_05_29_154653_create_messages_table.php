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
        Schema::connection('scylla')->create('messages', function (Blueprint $table) {
            $table->string('streamer_id');
            $table->string('chatter_id');
            $table->string('chatter_username');
            $table->string('chatter_badges');
            $table->text('chatter_message');
            $table->timestamp('sent_at');

            $table->primary(['streamer_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
