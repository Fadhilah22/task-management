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
        Schema::create('tasks', function (Blueprint $table) {
            //  id | title | description | status | priority | due_date | project_id | created_by | assigned_to | created_at | updated_at
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->enum('status', ['Not started', 'pending', 'in progress', 'finished', 'unfinished'])->default('pending');
            $table->unsignedInteger('priority')->default(0);
            $table->date('due_date')->nullable(true);
            $table->foreignId('project_id')->references('id')->on('projects')->constrained()->onDelete('cascade');
            $table->foreignId('created_by')->references('id')->on('users')->constrained()->onDelete('cascade');
            $table->foreignId('assigned_to')->references('id')->on('users')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('tasks');
    }
};
