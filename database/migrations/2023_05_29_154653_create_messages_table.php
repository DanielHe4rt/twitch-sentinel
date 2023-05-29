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
        Schema::create('messages', function (Blueprint $table) {
            $table->string('streamer_id');
            $table->string('chatter_id');
            $table->string('chatter_username');
            $table->string('chatter_badges');
            $table->text('chatter_message');
            $table->timestamp('sent_at');
            $table->timestamp('created_at');

            $table->primary(['streamer_id', 'chatter_id', 'sent_at']);
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
