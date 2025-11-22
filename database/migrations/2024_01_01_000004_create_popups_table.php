<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('popups', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('image_url')->nullable();
            $table->string('button_text')->default('Learn More');
            $table->string('button_link')->nullable();
            $table->enum('display_rule', ['every_visit', 'once_per_session', 'once_per_day', 'custom'])->default('once_per_session');
            $table->integer('delay_seconds')->default(3);
            $table->integer('show_every_x_visits')->default(1);
            $table->json('target_pages')->nullable();
            $table->boolean('is_active')->default(true);
            $table->unsignedBigInteger('impressions')->default(0);
            $table->unsignedBigInteger('clicks')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('popups');
    }
};
