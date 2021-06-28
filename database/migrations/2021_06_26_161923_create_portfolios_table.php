<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePortfoliosTable extends Migration
{
    public function up(): void
    {
        Schema::create('portfolios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->jsonb('title');
            $table->jsonb('description');
            $table->string('image');
            $table->unsignedInteger('position');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('portfolios');
    }
}