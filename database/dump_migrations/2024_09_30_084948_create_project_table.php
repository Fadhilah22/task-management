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
        Schema::create('Projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->enum('status', ['not started', 'pending','in_progress', 'completed', 'not finished'])->default('pending');
            $table->unsignedInteger('priority')->default(0);
            $table->date('start_date')->default(DB::raw('CURRENT_DATE'))->nullable();
            $table->date('end_date')->nullable();
            $table->timestamp('create_at')->default(DB::raw('CURRENT_TIMESTAMP'))->nullable();
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'))->nullable();
            $table->foreignId('created_by')->references('id')->on('Users')->onDelete('set null');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Projects');
    }
};
