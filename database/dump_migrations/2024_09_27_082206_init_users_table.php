<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //
        Schema::create('Users', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('email');
            $table->string('password_hash');
            $table->string('full_name');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'))->nullable(true);
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'))->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('Users');
    }
};
