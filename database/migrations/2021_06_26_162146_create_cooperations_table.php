<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCooperationsTable extends Migration
{
    public function up(): void
    {
        Schema::create('cooperations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->jsonb('list');
            $table->string('image');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cooperations');
    }
}