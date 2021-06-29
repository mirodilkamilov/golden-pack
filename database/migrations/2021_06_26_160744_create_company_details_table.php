<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyDetailsTable extends Migration
{
    public function up(): void
    {
        Schema::create('company_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->jsonb('title')->nullable();
            $table->jsonb('description')->nullable();
            $table->string('image')->nullable();
            $table->jsonb('about_title')->nullable();
            $table->jsonb('about_description')->nullable();
            $table->string('about_image')->nullable();
            $table->string('address')->nullable();
            $table->jsonb('phone')->nullable();
            $table->jsonb('email')->nullable();
            $table->text('google_map')->nullable();
            $table->jsonb('social_media')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('company_details');
    }
}