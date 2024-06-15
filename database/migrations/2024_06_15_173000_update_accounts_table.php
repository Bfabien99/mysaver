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
        //
        Schema::table('accounts', function (Blueprint $table) {
            $table->string('name')->unique()->change();
            $table->string('url')->nullable()->change();
            $table->string('image_url')->nullable()->change();
            $table->string('username')->nullable()->change();
            $table->string('email')->nullable()->change();
            $table->string('phone')->nullable()->change();
            $table->string('password')->nullable()->change();
            $table->longText('more')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
