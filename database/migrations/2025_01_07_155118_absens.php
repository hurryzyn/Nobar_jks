<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('absens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ticket_id')->constrained()->onDelete('cascade');  // Relasi ke ticket
            $table->enum('status', ['not attended', 'attended'])->default('not attended');  // Status kehadiran
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('absens');
    }
};
