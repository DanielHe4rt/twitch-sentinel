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
        Schema::create('streamers', function (Blueprint $table) {
            $table->string('provider_id');
            $table->string('provider_name');
            $table->timestamp('created_at');
            // create partition key as first item and
            // clustering keys after the first item
            $table->primary(['provider_id', 'created_at']);
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
